# Introduction

## What `oihana/php-enums` does

`oihana/php-enums` is a **PHP 8.4+ library** that consolidates into a single package the symbolic constants a typical application re-declares over and over: HTTP methods, status codes and headers, MIME/media types, mail and SMTP vocabulary, JWT/JOSE identifiers, OAuth 2.0 / OpenID Connect parameters, plus a set of general-purpose enums (booleans-as-strings, single characters, `ini` directives, `$_SERVER` keys, hash algorithms…).

It ships **over 1,600 constants** spread across **73 classes** in five namespaces. None of them is a native PHP `enum`: each is a **constant class** that `use`s [`ConstantsTrait`](../constants-trait.md), giving every class the same reflection API — list values, test membership, reverse-look-up a name, validate input — without instantiating anything.

## The *oihana* philosophy

Three principles run through the library — and more broadly through the `oihana/*` ecosystem:

1. **Zero *magic strings*.** A header name is `HttpHeader::CONTENT_TYPE`, not `'Content-Type'`; a status code description is `HttpStatusCode::getDescription(404)`, not a hand-written `switch`. Renames become *refactor-friendly*, IDE autocomplete works, and a typo is caught at the call site instead of at runtime.

2. **One shared, reflection-based API.** Because every class composes the same `ConstantsTrait`, you learn `enums()`, `includes()`, `getConstant()` and `validate()` once and they work identically on `Boolean`, `HttpMethod`, `JwtClaim` or `OAuth2Error`. No per-class learning curve.

3. **Framework-agnostic and dependency-light.** The package depends only on `oihana/php-core` and `oihana/php-reflect` (the latter provides `ConstantsTrait`). It drops into any PHP 8.4+ project — with or without a framework.

## Why constant classes rather than native `enum`

PHP 8.1 introduced native `enum`, so why constant classes? Three reasons that matter for this catalogue:

- **Inheritance and composition.** Native enums cannot extend another enum or be split across `trait`s. Constant classes can: `HttpHeader` composes ~20 per-category traits (`CorsHeaderTrait`, `SecurityHeaderTrait`, …), so you can `use` a single trait when you only need one category.
- **Composite values.** A constant can hold an array — useful when one symbolic name maps to several concrete values. A backed native enum is restricted to a single scalar per case.
- **Plain interop.** The constants are ordinary `string`/`int` values, directly usable wherever PHP expects a scalar (`hash(HashAlgorithm::SHA256, …)`, `ini_set(IniOptions::DISPLAY_ERRORS, '1')`) with no `->value` unwrapping.

The trade-off is that you don't get native `enum` type-hinting (`function f(HttpMethod $m)`). In exchange you get reflection, composition and frictionless scalar interop — which is what a large constant catalogue needs.

## Why this library

Every project ends up re-typing the same vocabulary: `'GET'`, `'Authorization'`, `'application/json'`, `200`, `'sha256'`, `'no-store'`, `'urn:ietf:params:oauth:grant-type:device_code'`. Spread across files, these strings drift, collect typos, and resist refactoring. Centralising them as typed constants — behind one consistent API — removes that whole class of bugs and makes the intent of the code explicit.

## See also

- [Installation](installation.md) — requirements and `composer require`.
- [Dependencies](dependencies.md) — `oihana/php-core`, `oihana/php-reflect`.
- [The `ConstantsTrait` API](../constants-trait.md) — the shared reflection methods.
- [English TOC](../README.md).
