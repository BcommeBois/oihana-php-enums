# Oihana PHP - Enums

![Oihana Php Core](https://raw.githubusercontent.com/BcommeBois/oihana-php-enums/main/assets/images/oihana-php-enums-logo-inline-512x160.png)

A collection of strongly-typed constant enumerations for PHP.

[![Latest Version](https://img.shields.io/packagist/v/oihana/php-enums.svg?style=flat-square)](https://packagist.org/packages/oihana/php-enums)  
[![Total Downloads](https://img.shields.io/packagist/dt/oihana/php-enums.svg?style=flat-square)](https://packagist.org/packages/oihana/php-enums)  
[![License](https://img.shields.io/packagist/l/oihana/php-enums.svg?style=flat-square)](LICENSE)

Oihana PHP Enums is a lightweight PHP library providing a set of well-structured enumerations implemented as constant classes.
Each enumeration groups related symbolic values to replace hardcoded strings or numbers, improving readability, consistency, and typo safety across your codebase.

This package is designed to be framework-agnostic, fully compatible with PHP 8.4+, and works seamlessly with the ConstantsTrait for reflection and dynamic constant access.

## 📚 Documentation

Full documentation: `https://bcommebois.github.io/oihana-php-enums`

## 📦 Installation

Requires [PHP 8.4+](https://php.net/releases/). Install via [Composer](https://getcomposer.org/):

```shell
composer require oihana/php-enums
```

## ✨ What you can do

- 📦 73 enumerations across general, HTTP, mail, JWT/JOSE and OAuth 2.0/OIDC domains — see the [catalog](#-enumeration-catalog).
- 🔍 Reflection-ready with ConstantsTrait for listing or validating values.
- 🛡️ Reduces “magic strings” and improves semantic clarity.
- 🧩 Easily reusable in any PHP application or framework.
- ⚡ No external dependencies except Oihana’s reflection utilities.

## 🚀 Quick Start

```php
use oihana\enums\Boolean;
use oihana\enums\Char;
use oihana\enums\IniOptions;

// Boolean values as strings
$enabled = Boolean::TRUE; // 'true'

// Character constants
echo 'A' . Char::DOT . 'B'; // Outputs: A.B

// Ini options
ini_set(IniOptions::DISPLAY_ERRORS, '1');
```


## 📖 Enumeration catalog

Over **1,600 constants** spread across **73 enumerations** in 5 namespaces. Every class uses
`ConstantsTrait`, so they all share a common reflection API — list, validate and reverse-lookup
values without instantiating anything:

```php
HttpMethod::enums();                 // ['GET', 'POST', 'PUT', ...]   all values
HttpMethod::includes('GET');         // true                          value exists?
HttpMethod::getConstant('GET');      // 'GET'                         value -> constant name
```

A few enums marked ⚙️ also ship domain-specific helpers — see [Convenience helpers](#-convenience-helpers).

### General — `oihana\enums`

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

### HTTP — `oihana\enums\http`

| Enumeration | Values | # | Description |
|---|---|--:|---|
| `AuthScheme` ⚙️ | `string` | 10 | HTTP authentication schemes (`Basic`, `Bearer`, …). |
| `GuzzleOption` | `string` | 29 | Guzzle HTTP client request options. |
| `HttpHeader` ⚙️ | `string` | 131 | Standard HTTP header names (request & response). |
| `HttpMethod` ⚙️ | `string` | 33 | HTTP request methods (`GET`, `POST`, …). |
| `HttpParamStrategy` | `string` | 3 | Strategy for retrieving parameters from a request. |
| `HttpStatusCode` ⚙️ | `int` | 78 | Standard HTTP status codes. |
| `OAuthParameters` | `string` | 7 | OAuth 1.0a parameter keys. |
| `OAuthSignatureMethod` | `string` | 4 | OAuth 1.0a signature methods. |
| `RequestAttribute` | `string` | 15 | Conventional PSR-7 request attribute names. |
| `UriScheme` ⚙️ | `string` | 5 | URI schemes (`http`, `https`, `ws`, …). |
| `UrlComponent` | `string` | 8 | Component keys returned by `parse_url()`. |
| `MediaType` ⚙️ | `string` | 36 | Common IANA media types (`application/json`, `text/html`, …). |
| `Charset` | `string` | 22 | Charset names for `Content-Type` (`utf-8`, `iso-8859-1`, …). |
| `CacheControlDirective` | `string` | 16 | `Cache-Control` directives (`no-store`, `max-age`, …). |
| `ContentEncoding` | `string` | 6 | Content codings (`gzip`, `br`, `zstd`, …). |
| `CookieSameSite` | `string` | 3 | `SameSite` cookie values (`Strict`, `Lax`, `None`). |
| `HttpProtocolVersion` | `string` | 4 | Protocol version strings (`HTTP/1.1`, `HTTP/2`, …). |
| `ContentDisposition` | `string` | 3 | `Content-Disposition` types (`inline`, `attachment`, `form-data`). |

> `HttpHeader`'s 131 constants are split into composable per-category traits under `oihana\enums\http\headers` (`CorsHeaderTrait`, `SecurityHeaderTrait`, `FetchMetadataHeaderTrait`, …). `use` a single trait when you only need one category.

### Mail — `oihana\enums\mail`

| Enumeration | Values | # | Description |
|---|---|--:|---|
| `MailHeader` ⚙️ | `string` | 57 | Email header field names (RFC 5322 & friends), split into per-category traits. |
| `ContentTransferEncoding` ⚙️ | `string` | 5 | MIME `Content-Transfer-Encoding` values (`base64`, `quoted-printable`, …). |
| `MailPriority` ⚙️ | `string` | 3 | Canonical priority levels with `X-Priority` / `Importance` / `Priority` conversions. |
| `SmtpPort` | `int` | 4 | Well-known SMTP ports (`25`, `465`, `587`, `2525`) by role. |
| `SmtpScheme` ⚙️ | `string` | 2 | SMTP DSN schemes (`smtp`, `smtps`). |
| `SmtpSecurity` ⚙️ | `string` | 6 | SMTP `secure` values (`ssl`/`smtps`, `tls`/`starttls`, `none`/`plain`) mapped to scheme & port. |
| `SmtpAuthMechanism` ⚙️ | `string` | 11 | SMTP SASL auth mechanisms (`PLAIN`, `LOGIN`, `CRAM-MD5`, `XOAUTH2`, …). |
| `SmtpReplyCode` ⚙️ | `int` | 32 | SMTP reply codes (RFC 5321) with type / transient / permanent helpers. |
| `EnhancedStatusCode` ⚙️ | `string` | 3 | Enhanced status code classes (`2`/`4`/`5`) with `X.Y.Z` parsing helpers. |
| `AutoSubmitted` ⚙️ | `string` | 4 | `Auto-Submitted` values (`no`, `auto-generated`, …) with `isAutomated()`. |
| `Sensitivity` | `string` | 3 | `Sensitivity` values (`Personal`, `Private`, `Company-Confidential`). |

> `MailHeader`'s constants are split into composable per-category traits under `oihana\enums\mail\headers` (`OriginatorHeaderTrait`, `MimeHeaderTrait`, `ListHeaderTrait`, `AuthenticationHeaderTrait`, …). `use` a single trait when you only need one category. Its helpers act on an in-memory header map (`array<string,string>`), not the runtime response sink.

### JWT / JOSE — `oihana\enums\jwt`

| Enumeration | Values | # | Description |
|---|---|--:|---|
| `JwtAlgorithm` | `string` | 38 | JOSE algorithm identifiers (`alg` / `enc`). |
| `JwtClaim` | `string` | 53 | Standard JWT claim names. |
| `JwtHeader` | `string` | 17 | Standard JOSE header parameter names. |
| `JwtType` | `string` | 7 | Standard `typ` (JWT type) header values. |
| `JwkKeyType` | `string` | 4 | JWK key types — `kty` values (`EC`, `RSA`, `oct`, `OKP`). |
| `JwkCurve` | `string` | 8 | JWK curves — `crv` values (`P-256`, `Ed25519`, …). |
| `JwkParameter` | `string` | 23 | JWK / JWK Set member names (`kty`, `n`, `e`, `crv`, …). |
| `JwkUse` | `string` | 2 | JWK public-key use — `use` values (`sig`, `enc`). |
| `JwkKeyOperation` | `string` | 8 | JWK key operations — `key_ops` values (`sign`, `verify`, …). |

### OAuth 2.0 / OpenID Connect — `oihana\enums\oauth2`

| Enumeration | Values | # | Description |
|---|---|--:|---|
| `OAuth2ClientAssertionType` | `string` | 2 | `client_assertion_type` values (RFC 7521). |
| `OAuth2CodeChallengeMethod` | `string` | 2 | PKCE code challenge methods (RFC 7636). |
| `OAuth2Display` | `string` | 4 | OIDC `display` parameter values. |
| `OAuth2Error` | `string` | 25 | OAuth 2.0 / OIDC error codes. |
| `OAuth2GrantType` | `string` | 11 | Grant type identifiers. |
| `OAuth2Parameter` | `string` | 46 | Request parameter names. |
| `OAuth2Prompt` | `string` | 5 | OIDC `prompt` parameter values. |
| `OAuth2ResponseType` | `string` | 8 | `response_type` values. |
| `OAuth2TokenEndpointAuthMethod` | `string` | 7 | Client authentication methods at the token endpoint. |
| `OAuth2TokenField` | `string` | 19 | Token endpoint response fields. |
| `OAuth2TokenType` | `string` | 10 | Access token types / Token Exchange URIs. |
| `OAuth2ResponseMode` | `string` | 8 | `response_mode` values (`query`, `form_post`, JARM, …). |
| `OAuth2SubjectType` | `string` | 2 | OIDC subject identifier types (`public`, `pairwise`). |
| `OAuth2TokenTypeHint` | `string` | 3 | `token_type_hint` for introspection / revocation. |
| `OidcAmr` | `string` | 21 | Authentication Method Reference (`amr`) values. |
| `OidcDiscoveryField` | `string` | 54 | OIDC discovery document fields (`.well-known/openid-configuration`). |
| `OidcScope` | `string` | 6 | OIDC scope values. |
| `OidcClaimType` | `string` | 3 | OIDC claim types (`normal`, `aggregated`, `distributed`). |
| `OidcAddressField` | `string` | 6 | Sub-fields of the OIDC `address` claim. |
| `OAuth2ClientMetadata` | `string` | 45 | Dynamic Client Registration metadata (RFC 7591/7592, OIDC). |

### ⚙️ Convenience helpers

Beyond the shared `ConstantsTrait` API, these enums expose domain-specific static helpers:

| Enumeration | Helpers |
|---|---|
| `HashAlgorithm` | `isAvailable()`, `ensureAvailable()`, `supported()` |
| `JsonParam` | `getDefaultValues()`, `isValidFlags()` |
| `Order` | `normalize()` |
| `Param` | `groupByPrefix()` |
| `PostalCodePattern` | `getPattern()`, `isValid()`, `assert()` |
| `AuthScheme` | `prefix()` |
| `HttpHeader` | `all()`, `has()`, `remove()`, `send()` |
| `HttpMethod` | `isValid()` |
| `HttpStatusCode` | `getDescription()`, `getType()`, `fromException()` |
| `MediaType` | `withCharset()` |
| `UriScheme` | `defaultPort()` |
| `SmtpScheme` | `defaultPort()` |
| `SmtpSecurity` | `scheme()`, `defaultPort()`, `isImplicitTls()` |
| `MailHeader` | `all()`, `has()`, `get()`, `remove()`, `set()`, `normalize()`, `canRepeat()` |
| `ContentTransferEncoding` | `isIdentity()` |
| `MailPriority` | `normalize()`, `toXPriority()`, `fromXPriority()`, `toImportance()`, `toPriority()` |
| `SmtpAuthMechanism` | `requiresTls()` |
| `SmtpReplyCode` | `getDescription()`, `getType()`, `isPositive()`, `isTransient()`, `isPermanent()` |
| `EnhancedStatusCode` | `classOf()`, `subjectOf()`, `detailOf()`, `isSuccess()`, `isTransient()`, `isPermanent()`, `isValid()` |
| `AutoSubmitted` | `isAutomated()` |


## ✅ Running Unit Tests

To run all tests:
```shell
$ composer test
```

To run a specific test file:
```shell
$ composer test tests/oihana/enums/BooleanTest.php
```

## 🧾 License

This project is licensed under the [Mozilla Public License 2.0 (MPL-2.0)](https://www.mozilla.org/en-US/MPL/2.0/).

## 👤 About the author

- Author : Marc ALCARAZ (aka eKameleon)
- Mail : [marc@ooop.fr](mailto:marc@ooop.fr)
- Website : http://www.ooop.fr


## 🔗 Related packages

- `oihana/php-core` – core helpers and utilities used by this library: `https://github.com/BcommeBois/oihana-php-core`
- `oihana/php-reflect` – reflection and hydration utilities: `https://github.com/BcommeBois/oihana-php-reflect`
