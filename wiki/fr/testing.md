# Tests & couverture

## Lancer la suite

```bash
composer test            # lance la suite unitaire (PHPUnit, mode strict)
```

Lancer un seul cas de test :

```bash
./vendor/bin/phpunit --filter HttpStatusCodeTest
```

La suite tourne en **mode strict** (`phpunit.xml`) : avertissements, tests risqués (sans assertion), tests ignorés et sorties pendant les tests font **échouer** la run. Un test qui ne vérifie rien ne protège rien.

## Mesurer la couverture

Nécessite **Xdebug** ou **PCOV** :

```bash
composer coverage        # text + Clover + HTML sous build/coverage/
composer coverage:md     # résumé Markdown lisible (build/coverage/COVERAGE.md)
```

`composer coverage:md` lance la suite, puis génère `build/coverage/COVERAGE.md` (% global, table par répertoire triée du pire au meilleur, fichiers les moins couverts, et liste des 0 %). Il tient aussi un petit journal de tendance local (`build/coverage/history.json`) pour que chaque run affiche le delta depuis la précédente. La sortie de couverture vit sous `build/` et est **gitignorée** — c'est un instantané qui périme au commit suivant, donc on la régénère à la demande plutôt que de la committer.

La suite couvre **100 % des lignes** (323/323) et **100 % des méthodes** (52/52), sur **320 tests**.

## Philosophie de test

- La couverture mesure quelles lignes ont **tourné**, pas quels comportements sont **vérifiés** — 100 % de couverture ne signifie pas zéro bug.
- Lorsqu'on découvre un comportement surprenant dans du code existant, on le **gèle d'abord dans un test**. On ne change pas le comportement d'une API publique sans en discuter : d'autres bibliothèques peuvent en dépendre.
- **Tester tout l'atteignable.** Préférer rendre une garde atteignable (par exemple en injectant une couture) plutôt que de l'annoter. N'annoter une ligne `@codeCoverageIgnore` que lorsqu'elle est réellement impossible à atteindre depuis la surface publique.

## L'unique garde annotée

Une seule garde défensive de toute la bibliothèque porte `@codeCoverageIgnore` : la branche *headers-already-sent* de `HttpHeader::send()`. Elle est **inatteignable sous PHPUnit**, dont le tampon de sortie maintient `headers_sent()` à false pendant toute la durée d'un test — et l'appel `header()` de PHP juste en dessous émettrait déjà le même avertissement. Toute autre garde est exercée par un vrai test (par exemple, `HashAlgorithm::ensureAvailable()` accepte une liste d'algorithmes injectable précisément pour que son `throw` de disponibilité au runtime puisse être testé).

## Voir aussi

- [Introduction](getting-started/introduction.md) — les objectifs de conception de la bibliothèque.
- [Astuces et pièges](tips.md) — pièges méritant un test de non-régression.
- [Sommaire FR](README.md).
