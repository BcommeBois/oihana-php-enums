# oihana/php-enums — Strongly-typed constant enumerations for PHP

![Language](https://img.shields.io/badge/language-English-blue)

`oihana/php-enums` is a PHP 8.4+ library bundling **over 1,600 constants** across **73 enumeration classes**, organised in five namespaces (`oihana\enums`, `…\http`, `…\mail`, `…\jwt`, `…\oauth2`). Every class is a **constant class** (not a native PHP `enum`) using [`ConstantsTrait`](constants-trait.md), so they all share one reflection API — list, validate and reverse-look-up values without instantiating anything, and replace *magic strings* everywhere.

![Oihana PHP Enums](https://raw.githubusercontent.com/BcommeBois/oihana-php-enums/main/assets/images/oihana-php-enums-logo-inline-512x160.png)

## Who this documentation is for

PHP developers who want to:

- stop sprinkling **magic strings/numbers** (`'GET'`, `'application/json'`, `200`, `'sha256'`, `'Content-Type'`) across a codebase and reference **typed constants** instead;
- **list, validate and reverse-look-up** symbolic values through a single, reflection-based API (`enums()`, `includes()`, `getConstant()`, `validate()`);
- compose **per-category traits** (HTTP headers, mail headers) to pull in only the constants they need;
- reach for **domain helpers** when an enum ships them — `HttpStatusCode::getDescription()`, `SmtpSecurity::scheme()`, `MailPriority::toXPriority()`, `PostalCodePattern::isValid()`, and more.

## Quick start

```php
use oihana\enums\Boolean;
use oihana\enums\Char;
use oihana\enums\http\HttpMethod;
use oihana\enums\http\HttpStatusCode;

$enabled = Boolean::TRUE;                       // 'true'
echo 'A' . Char::DOT . 'B';                     // 'A.B'

HttpMethod::includes( 'GET' );                  // true
HttpMethod::enums();                            // ['CONNECT', 'DELETE', 'GET', ...]
HttpStatusCode::getDescription( 404 );          // 'Not found'
```

The shared API comes from `ConstantsTrait`; the per-class helpers are listed in [Convenience helpers](helpers.md). For the full table of contents, see below.

## Table of contents

### Getting started — [`getting-started/`](getting-started/)

- [Introduction](getting-started/introduction.md) — what the library does, the *oihana* philosophy, and why constant classes rather than native `enum`.
- [Installation](getting-started/installation.md) — PHP 8.4+ requirement and the `composer require` command.
- [Dependencies](getting-started/dependencies.md) — `oihana/php-core` and `oihana/php-reflect` (which provides `ConstantsTrait`) and their role.
- [Glossary](getting-started/glossary.md) — *constant class*, `ConstantsTrait`, *magic string*, *helper*, *trait composition*, and other recurring terms.

### The shared API

- [The `ConstantsTrait` API](constants-trait.md) — the reflection methods every enum shares: `enums()`, `getAll()`, `getConstant()`, `getConstantKeys()`, `getConstantValues()`, `includes()`, `get()`, `validate()`, `resetCaches()`.

### The catalogue

- [General enums](general.md) — `oihana\enums`: `Boolean`, `Char`, `CharacterSet`, `ArithmeticOperator`, `FilterOption`, `HashAlgorithm`, `IniOptions`, `JsonParam`, `Order`, `Output`, `Pagination`, `Param`, `PostalCodePattern`, `ServerParam`, `Status`.
- [HTTP enums](http.md) — `oihana\enums\http`: methods, status codes, headers (+ per-category traits), media types, URI schemes, cache/cookie/encoding, OAuth 1.0a.
- [Mail & SMTP enums](mail.md) — `oihana\enums\mail`: mail headers (+ traits), priorities, transfer encodings, SMTP ports/schemes/security/auth/reply codes, enhanced status codes.
- [JWT / JOSE enums](jwt.md) — `oihana\enums\jwt`: `JwtAlgorithm`, `JwtClaim`, `JwtHeader`, `JwtType`, and the JWK family.
- [OAuth 2.0 / OIDC enums](oauth2.md) — `oihana\enums\oauth2`: grant/response types, parameters, errors, token fields, OIDC discovery/scopes/AMR, client metadata.

### Cross-cutting

- [Convenience helpers](helpers.md) — the ⚙️ enums that expose domain-specific static helpers beyond `ConstantsTrait`.
- [Tests & coverage](testing.md) — run the PHPUnit suite, measure coverage, and the `@codeCoverageIgnore` policy.
- [Tips and pitfalls](tips.md) — constant classes vs native `enum`, composite (array) values, PHP 8.4 trait-constant rules, and other gotchas.

## Source code

The library code lives under [`src/oihana/enums/`](../../src/oihana/enums/):

- [`src/oihana/enums/`](../../src/oihana/enums/) — general enums and the `http`, `mail`, `jwt`, `oauth2` sub-namespaces.

## See also

- [Packagist `oihana/php-enums`](https://packagist.org/packages/oihana/php-enums) — the package page.
- [API reference (phpDocumentor)](https://bcommebois.github.io/oihana-php-enums) — class-level generated reference.
- [Tips and pitfalls](tips.md) — conventions and common mistakes.
