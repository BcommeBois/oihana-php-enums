# Astuces et pièges

Une courte liste de conventions et de pièges propres à cette bibliothèque.

## Les classes de constantes ne sont pas des `enum` natifs

On référence une valeur par `HttpMethod::GET` (une simple chaîne `'GET'`), et **non** `HttpMethod::GET->value`. Il n'y a pas de `->value`, pas de `cases()`, pas de `from()`. Les équivalents par réflexion vivent sur `ConstantsTrait` : `enums()`, `getConstantValues()`, `getConstant()`, `includes()`, `validate()`. Voir [Pourquoi des classes de constantes](getting-started/introduction.md#pourquoi-des-classes-de-constantes-plutôt-quun-enum-natif).

## `includes()` est non-strict, `validate()` est strict — par défaut

```php
HttpStatusCode::includes( '200' );  // true  — non-strict ('200' == 200)
HttpStatusCode::validate( '200' );  // lève — strict par défaut ('200' !== 200)
```

Passez le drapeau `$strict` explicitement quand la distinction compte (surtout pour les énumérations à valeurs entières `HttpStatusCode`, `SmtpReplyCode`, `SmtpPort`, `CharacterSet`).

## `getConstant()` peut renvoyer un tableau

Quand plusieurs constantes partagent la même valeur, la recherche inverse renvoie **tous** leurs noms sous forme de tableau, pas une chaîne :

```php
// const int OK = 200; const int ALSO_OK = 200;
Codes::getConstant( 200 ); // ['OK', 'ALSO_OK']
```

Gérez les deux formes (`string|string[]|null`) si des collisions sont possibles dans votre énumération.

## `enums()` aplatit les valeurs composites (tableaux)

Pour les énumérations dont les constantes peuvent contenir des tableaux, `enums()` renvoie une liste **plate** des valeurs internes (dédupliquée, triée) — et non les tableaux eux-mêmes. Utilisez `getConstantValues()` si vous avez besoin des valeurs déclarées brutes, tableaux compris.

## Triez numériquement les énumérations à valeurs entières

`enums()` trie comme des chaînes par défaut. Pour les énumérations numériques, passez `SORT_NUMERIC` :

```php
HttpStatusCode::enums( SORT_NUMERIC ); // [100, 101, ..., 600] — pas lexicographique
```

## PHP 8.4 : ne jamais atteindre une constante via un nom de *trait*

`HttpHeader` et `MailHeader` composent des traits par catégorie. Accéder à une constante **via le trait** (`CorsHeaderTrait::ACCESS_CONTROL_ALLOW_ORIGIN`) est une erreur fatale en PHP 8.4 (*Cannot access trait constant directly*). Passez toujours par la **classe composante** : `HttpHeader::ACCESS_CONTROL_ALLOW_ORIGIN`.

## Les helpers `HttpHeader` et `MailHeader` ciblent des puits différents

`HttpHeader::send()/has()/all()/remove()` agissent sur la **réponse au runtime** de PHP (`header()`, `headers_list()`). `MailHeader::set()/get()/has()/all()/remove()` agissent sur une **table en mémoire** (`array<string,string>`) que vous passez. N'attendez pas de `MailHeader` qu'il touche les en-têtes de réponse, ni de `HttpHeader` qu'il modifie un tableau.

## `resetCaches()` est pour les tests

`getAll()` et `getConstant()` mettent en cache par réflexion à la première utilisation. Le code applicatif n'a jamais besoin de réinitialiser ce cache ; les tests qui vérifient le comportement du cache (ou définissent des constantes dynamiquement) peuvent appeler `SomeEnum::resetCaches()`.

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — signatures exactes et valeurs par défaut.
- [Tests & couverture](testing.md) — geler un comportement surprenant dans un test de non-régression.
- [Sommaire FR](README.md).
