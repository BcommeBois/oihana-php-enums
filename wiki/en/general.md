# General enums — `oihana\enums`

The root namespace gathers general-purpose enumerations not tied to a single protocol. All of them share the [`ConstantsTrait`](constants-trait.md) API; the ones marked ⚙️ add [helpers](helpers.md).

| Enumeration | Values | # | Description |
|---|---|--:|---|
| `ArithmeticOperator` | `string` | 6 | Arithmetic operator symbols (`+`, `-`, `*`, `/`, `%`, `**`). |
| `Boolean` | `string` | 2 | String forms of booleans: `"true"` / `"false"`. |
| `Char` | `string` | 131 | Single-character strings — punctuation, whitespace, brackets, symbols… |
| `CharacterSet` | `int` | 96 | Official IANA character-set (charset) codes. |
| `FilterOption` | `string` | 5 | Option keys for PHP's `filter_*` functions. |
| `HashAlgorithm` ⚙️ | `string` | 60 | Hash algorithm ids for PHP's `hash()` / `hash_hmac()`. |
| `IniOptions` | `string` | 322 | PHP runtime configuration directives (`ini_get()` / `ini_set()`). |
| `JsonParam` ⚙️ | `string` | 4 | Parameter names used in JSON encode/decode operations. |
| `Order` ⚙️ | `string` | 4 | Sort directions (`asc` / `desc`). |
| `Output` | `string` | 22 | Output / response format constants. |
| `Pagination` | `string` | 5 | Pagination keys (offset, limit, …). |
| `Param` ⚙️ | `string` | 192 | Generic parameter keys shared across applications. |
| `PostalCodePattern` ⚙️ | `string` | 158 | Postal-code regular expressions by country. |
| `ServerParam` | `string` | 43 | Standard PHP `$_SERVER` keys. |
| `Status` | `string` | 8 | Resource status values. |

## Examples

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

Algorithm identifiers for the `hash()` family, plus runtime-availability helpers:

```php
use oihana\enums\HashAlgorithm;

hash( HashAlgorithm::SHA256, 'oihana' );

HashAlgorithm::isAvailable( HashAlgorithm::SHA256 ); // true on a standard build
HashAlgorithm::supported();                          // intersection of the enum and hash_algos()
HashAlgorithm::ensureAvailable( HashAlgorithm::SHA256 ); // throws ConstantException if missing
```

### `Param` and `PostalCodePattern` ⚙️

`Param` (192 keys) covers generic parameter names and ships `groupByPrefix()`; `PostalCodePattern` (158 country patterns) validates postal codes:

```php
use oihana\enums\Param;
use oihana\enums\PostalCodePattern;

Param::groupByPrefix( 'FILTER' );          // ['FILTER' => 'filter', 'FILTER_KEYS' => 'filterKeys', ...]

PostalCodePattern::isValid( '75008', 'FR' ); // true
PostalCodePattern::getPattern( 'FR' );        // the regex for France
```

## See also

- [The `ConstantsTrait` API](constants-trait.md) — the shared methods.
- [Convenience helpers](helpers.md) — the ⚙️ helpers in full.
- [English TOC](README.md).
