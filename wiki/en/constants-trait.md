# The `ConstantsTrait` API

Every enumeration in `oihana/php-enums` `use`s **`oihana\reflect\traits\ConstantsTrait`** (shipped by [`oihana/php-reflect`](getting-started/dependencies.md)). That single trait gives all 73 classes the **same static, reflection-based API** — so what you learn here works identically on `Boolean`, `HttpMethod`, `JwtClaim`, `OAuth2Error` and the rest.

```php
use oihana\reflect\traits\ConstantsTrait;

final class Color
{
    use ConstantsTrait;

    public const string RED   = 'red';
    public const string GREEN = 'green';
    public const string BLUE  = 'blue';
}
```

All methods are **static**, results are **cached** (via reflection on first use), and nothing needs to be instantiated.

## Method overview

| Method | Returns | Purpose |
|---|---|---|
| [`enums()`](#enums) | `array` | Flattened, de-duplicated, sorted list of **values**. |
| [`getAll()`](#getall) | `array<string,mixed>` | The raw **name → value** map. |
| [`getConstantKeys()`](#getconstantkeys) | `string[]` | Constant **names** only. |
| [`getConstantValues()`](#getconstantvalues) | `array` | Constant **values** only. |
| [`getConstant()`](#getconstant) | `string\|string[]\|null` | Reverse look-up: **value → name(s)**. |
| [`get()`](#get) | `mixed` | The value if valid, otherwise a default. |
| [`includes()`](#includes) | `bool` | Does this value exist? |
| [`validate()`](#validate) | `void` | Assert a value exists, or throw. |
| [`resetCaches()`](#resetcaches) | `void` | Clear the internal reflection caches. |

---

## `enums()`

```php
public static function enums( int $flags = SORT_STRING ): array
```

Returns every **value** as a flat, **unique**, **sorted** array. Array-valued constants are flattened into individual values, and duplicates are removed. The optional `$flags` argument is passed to `sort()` (`SORT_STRING` by default; use `SORT_NUMERIC` for `int`-backed enums such as `HttpStatusCode`).

```php
use oihana\enums\http\HttpMethod;
use oihana\enums\http\HttpStatusCode;

HttpMethod::enums();                  // ['CONNECT', 'DELETE', 'GET', 'HEAD', ...]
HttpStatusCode::enums( SORT_NUMERIC ); // [100, 101, 102, ..., 600]
```

## `getAll()`

```php
public static function getAll(): array
```

Returns the raw **constant name → value** map, exactly as declared (no flattening, no sorting). This is the building block the other methods rely on; it is computed once via `ReflectionClass` and cached.

```php
use oihana\enums\Boolean;

Boolean::getAll(); // ['TRUE' => 'true', 'FALSE' => 'false']
```

## `getConstantKeys()`

```php
public static function getConstantKeys(): array
```

Returns the constant **names** (the keys of `getAll()`).

```php
use oihana\enums\Boolean;

Boolean::getConstantKeys(); // ['TRUE', 'FALSE']
```

## `getConstantValues()`

```php
public static function getConstantValues(): array
```

Returns the constant **values** in declaration order (the values of `getAll()`, **without** the flattening/sorting/de-duplication of `enums()`).

```php
use oihana\enums\Boolean;

Boolean::getConstantValues(); // ['true', 'false']
```

## `getConstant()`

```php
public static function getConstant(
    string            $value,
    array|string|null $separator       = null,
    bool              $caseInsensitive = false
): string|array|null
```

**Reverse look-up**: given a value, return the constant **name**. It returns:

- a **string** when exactly one constant matches,
- an **array of names** when several constants share the value,
- `null` when nothing matches.

`$separator` lets you match a sub-value inside a string constant that packs several values (e.g. `'draft,open,closed'`); `$caseInsensitive` enables case-folded matching.

```php
use oihana\enums\http\HttpStatusCode;

HttpStatusCode::getConstant( 404 ); // 'NOT_FOUND'
HttpStatusCode::getConstant( 200 ); // 'OK'
HttpStatusCode::getConstant( 999 ); // null
```

## `get()`

```php
public static function get( mixed $value, mixed $default = null ): mixed
```

Returns `$value` when it is a valid enum value, otherwise `$default`. Handy to sanitise external input down to a known value with a fallback.

```php
use oihana\enums\Order;

Order::get( 'asc' );           // 'asc'
Order::get( 'sideways', 'asc' ); // 'asc'  (fallback)
```

## `includes()`

```php
public static function includes( mixed $value, bool $strict = false, ?string $separator = null ): bool
```

Returns `true` when `$value` exists among the constants. `$strict` adds a type check (`200` vs `'200'`); `$separator` splits packed string constants before comparing.

```php
use oihana\enums\http\HttpMethod;

HttpMethod::includes( 'GET' );    // true
HttpMethod::includes( 'BREW' );   // false
```

> Note the default differs from `validate()`: `includes()` is **non-strict by default** (`$strict = false`).

## `validate()`

```php
public static function validate( mixed $value, bool $strict = true, ?string $separator = null ): void
```

Asserts that `$value` exists; throws `oihana\reflect\exceptions\ConstantException` otherwise. Unlike `includes()`, it is **strict by default** (`$strict = true`). Use it to fail fast on invalid input at a boundary.

```php
use oihana\enums\http\HttpMethod;
use oihana\reflect\exceptions\ConstantException;

HttpMethod::validate( 'GET' );  // ok, returns void

try
{
    HttpMethod::validate( 'BREW' );
}
catch ( ConstantException $e )
{
    // 'Invalid constant : "BREW"'
}
```

## `resetCaches()`

```php
public static function resetCaches(): void
```

Clears the internal caches (`getAll()`'s map and `getConstant()`'s reverse index). You rarely need this in application code; it exists mainly for **tests** that define constants dynamically or assert cache rebuilds.

```php
SomeEnum::resetCaches();
```

## See also

- [Introduction](getting-started/introduction.md) — why constant classes rather than native `enum`.
- [Dependencies](getting-started/dependencies.md) — `oihana/php-reflect`, which provides this trait.
- [Convenience helpers](helpers.md) — per-class helpers layered on top of this shared API.
- [English TOC](README.md).
