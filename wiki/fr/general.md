# Énumérations générales — `oihana\enums`

L'espace de noms racine rassemble les énumérations généralistes, non liées à un protocole particulier. Toutes partagent l'API [`ConstantsTrait`](constants-trait.md) ; celles marquées ⚙️ ajoutent des [helpers](helpers.md).

| Énumération | Valeurs | # | Description |
|---|---|--:|---|
| `ArithmeticOperator` | `string` | 6 | Symboles d'opérateurs arithmétiques (`+`, `-`, `*`, `/`, `%`, `**`). |
| `Boolean` | `string` | 2 | Formes chaîne des booléens : `"true"` / `"false"`. |
| `Char` | `string` | 131 | Caractères isolés — ponctuation, espaces, parenthèses, symboles… |
| `CharacterSet` | `int` | 96 | Codes officiels IANA de jeux de caractères (charset). |
| `FilterOption` | `string` | 5 | Clés d'options des fonctions `filter_*` de PHP. |
| `HashAlgorithm` ⚙️ | `string` | 60 | Identifiants d'algorithmes de hachage pour `hash()` / `hash_hmac()`. |
| `IniOptions` | `string` | 322 | Directives de configuration PHP (`ini_get()` / `ini_set()`). |
| `JsonParam` ⚙️ | `string` | 4 | Noms de paramètres pour l'encodage/décodage JSON. |
| `Order` ⚙️ | `string` | 4 | Directions de tri (`asc` / `desc`). |
| `Output` | `string` | 22 | Constantes de format de sortie / réponse. |
| `Pagination` | `string` | 5 | Clés de pagination (offset, limit, …). |
| `Param` ⚙️ | `string` | 192 | Clés de paramètres génériques partagées entre applications. |
| `PostalCodePattern` ⚙️ | `string` | 158 | Expressions régulières de codes postaux par pays. |
| `ServerParam` | `string` | 43 | Clés standard de `$_SERVER` en PHP. |
| `Status` | `string` | 8 | Valeurs de statut de ressource. |

## Exemples

```php
use oihana\enums\Boolean;
use oihana\enums\Char;
use oihana\enums\IniOptions;
use oihana\enums\Order;

$enabled = Boolean::TRUE;                  // 'true'
echo 'A' . Char::DOT . 'B';                // 'A.B'
ini_set( IniOptions::DISPLAY_ERRORS, '1' );

Order::normalize( 'ASC' );                 // 'asc'  (helper)
```

### `HashAlgorithm` ⚙️

Identifiants d'algorithmes pour la famille `hash()`, plus des helpers de disponibilité au runtime :

```php
use oihana\enums\HashAlgorithm;

hash( HashAlgorithm::SHA256, 'oihana' );

HashAlgorithm::isAvailable( HashAlgorithm::SHA256 ); // true sur un build standard
HashAlgorithm::supported();                          // intersection de l'enum et de hash_algos()
HashAlgorithm::ensureAvailable( HashAlgorithm::SHA256 ); // lève ConstantException si absent
```

### `Param` et `PostalCodePattern` ⚙️

`Param` (192 clés) couvre les noms de paramètres génériques et fournit `groupByPrefix()` ; `PostalCodePattern` (158 motifs par pays) valide les codes postaux :

```php
use oihana\enums\Param;
use oihana\enums\PostalCodePattern;

Param::groupByPrefix( 'FILTER' );          // ['FILTER' => 'filter', 'FILTER_KEYS' => 'filterKeys', ...]

PostalCodePattern::isValid( '75008', 'FR' ); // true
PostalCodePattern::getPattern( 'FR' );        // l'expression régulière pour la France
```

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — les méthodes partagées.
- [Helpers de confort](helpers.md) — les helpers ⚙️ en détail.
- [Sommaire FR](README.md).
