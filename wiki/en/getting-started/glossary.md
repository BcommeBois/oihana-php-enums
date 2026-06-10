# Glossary

Recurring terms used throughout this documentation.

### Constant class

A regular PHP `class` that holds only `public const` declarations and `use`s `ConstantsTrait`. It is **not** a native PHP `enum`. It is the building block of this whole library — see [Introduction § Why constant classes](introduction.md#why-constant-classes-rather-than-native-enum).

### `ConstantsTrait`

The trait (from `oihana/php-reflect`) every enumeration composes. It exposes the shared, static, reflection-based API: `enums()`, `getAll()`, `getConstant()`, `includes()`, `validate()`, and friends. Full reference: [The `ConstantsTrait` API](../constants-trait.md).

### Magic string / magic number

A bare literal (`'GET'`, `'Content-Type'`, `200`, `'sha256'`) used directly in code instead of a named constant. This library exists to **replace** them with typed constants — removing typos and making renames refactor-friendly.

### Value vs name (constant)

For `const string GET = 'GET'`, the **name** is `GET` (the identifier) and the **value** is `'GET'` (the data). `getConstantKeys()` returns names; `enums()`/`getConstantValues()` return values; `getConstant()` maps a **value back to its name**.

### Composite (array) value

A constant whose value is an **array** rather than a scalar — e.g. one symbolic name mapping to several concrete values. Native PHP enums cannot do this; constant classes can. `enums()` **flattens** such values into the returned list.

### Helper (⚙️)

A **domain-specific static method** that some enums add on top of the shared `ConstantsTrait` API — for example `HttpStatusCode::getDescription()`, `SmtpSecurity::scheme()`, `MailPriority::toXPriority()`. The full list is in [Convenience helpers](../helpers.md).

### Trait composition

Splitting a large enum's constants across several `trait`s, then composing them in one class with a single `use` statement. `HttpHeader` and `MailHeader` do this so callers can `use` only the per-category trait they need (e.g. `CorsHeaderTrait`, `OriginatorHeaderTrait`).

### `ConstantException`

The exception (from `oihana/php-reflect`) thrown by `validate()` when a value is not a valid constant, and by some enum helpers (e.g. `HashAlgorithm::ensureAvailable()`).

### Strict vs non-strict

Whether membership checks also compare **types** (`200` vs `'200'`). `includes()` defaults to **non-strict**; `validate()` defaults to **strict**. See [The `ConstantsTrait` API](../constants-trait.md#includes).

## See also

- [Introduction](introduction.md) — the concepts in context.
- [The `ConstantsTrait` API](../constants-trait.md) — the method-by-method reference.
- [English TOC](../README.md).
