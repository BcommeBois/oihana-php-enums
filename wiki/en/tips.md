# Tips and pitfalls

A short list of conventions and gotchas specific to this library.

## Constant classes are not native `enum`s

You reference a value as `HttpMethod::GET` (a plain `'GET'` string), **not** `HttpMethod::GET->value`. There is no `->value`, no `cases()`, no `from()`. The reflection equivalents live on `ConstantsTrait`: `enums()`, `getConstantValues()`, `getConstant()`, `includes()`, `validate()`. See [Why constant classes](getting-started/introduction.md#why-constant-classes-rather-than-native-enum).

## `includes()` is non-strict, `validate()` is strict — by default

```php
HttpStatusCode::includes( '200' );  // true  — non-strict ('200' == 200)
HttpStatusCode::validate( '200' );  // throws — strict by default ('200' !== 200)
```

Pass the `$strict` flag explicitly when the distinction matters (especially for the `int`-backed enums `HttpStatusCode`, `SmtpReplyCode`, `SmtpPort`, `CharacterSet`).

## `getConstant()` can return an array

When several constants share the same value, the reverse look-up returns **all** their names as an array, not a string:

```php
// const int OK = 200; const int ALSO_OK = 200;
Codes::getConstant( 200 ); // ['OK', 'ALSO_OK']
```

Handle both shapes (`string|string[]|null`) if collisions are possible in your enum.

## `enums()` flattens composite (array) values

For enums whose constants may hold arrays, `enums()` returns a **flat** list of the inner values (de-duplicated, sorted) — not the arrays themselves. Use `getConstantValues()` if you need the raw declared values, arrays included.

## Sort `int`-backed enums numerically

`enums()` sorts as strings by default. For numeric enums, pass `SORT_NUMERIC`:

```php
HttpStatusCode::enums( SORT_NUMERIC ); // [100, 101, ..., 600] — not lexicographic
```

## PHP 8.4: never reach a constant through a *trait* name

`HttpHeader` and `MailHeader` compose per-category traits. Accessing a constant **through the trait** (`CorsHeaderTrait::ACCESS_CONTROL_ALLOW_ORIGIN`) is a fatal error in PHP 8.4 (*Cannot access trait constant directly*). Always go through the **composing class**: `HttpHeader::ACCESS_CONTROL_ALLOW_ORIGIN`.

## `HttpHeader` vs `MailHeader` helpers target different sinks

`HttpHeader::send()/has()/all()/remove()` act on PHP's **runtime response** (`header()`, `headers_list()`). `MailHeader::set()/get()/has()/all()/remove()` act on an **in-memory map** (`array<string,string>`) you pass in. Don't expect `MailHeader` to touch the response headers, or `HttpHeader` to mutate an array.

## `resetCaches()` is for tests

`getAll()` and `getConstant()` cache via reflection on first use. Application code never needs to reset that; tests that assert cache behaviour (or define constants dynamically) can call `SomeEnum::resetCaches()`.

## See also

- [The `ConstantsTrait` API](constants-trait.md) — exact signatures and defaults.
- [Tests & coverage](testing.md) — freeze surprising behaviour in a regression test.
- [English TOC](README.md).
