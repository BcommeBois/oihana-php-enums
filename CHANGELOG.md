# The "Oihana PHP Enums" library - Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

### Added

#### Core enums
- `oihana\enums\FilterOption`
- `oihana\enums\HashAlgorithm` (with unit tests)
- `oihana\enums\Output` (incl. `REASON` constant)
- `oihana\enums\Pagination`
- `oihana\enums\PostalCodePattern` (renamed from `PostalCode`, with country-specific patterns)
- `oihana\enums\ServerParam`
- `oihana\enums\Status`

#### HTTP enums (`oihana\enums\http`)
- `AuthScheme` — RFC 7235 authentication schemes (Basic, Bearer, Digest, OAuth, …)
- `GuzzleOption` — Guzzle HTTP client request option keys
- `HttpHeader` (with helper methods)
- `HttpMethod` (with `isValid()` case-sensitive flag)
- `HttpParamStrategy`
- `HttpStatusCode` (incl. `fromException()` to extract a 4xx/5xx code from a `Throwable`, falling back to `INTERNAL_SERVER_ERROR`)
- `OAuthParameters` — OAuth 1.0a protocol parameters (RFC 5849)
- `OAuthSignatureMethod`

#### JWT enums (`oihana\enums\jwt`)
- `JwtClaim` — RFC 7519 registered claims + OIDC standard claims

#### OAuth 2.0 enums (`oihana\enums\oauth2`)
- `OAuth2Parameter` — request parameter names (RFC 6749 / 7523 / 7636, OIDC)
- `OAuth2TokenField` — token endpoint response fields (RFC 6749 §5, RFC 7662)

#### Misc
- `oihana\enums\Char` — expanded with more symbols and improved tests
- `oihana\enums\JsonParam` — added `JSON_NONE` constant

### Removed
- `oihana\enums\Alter` (moved to the `oihana\models\enums` package)

----

## [1.0.0] - 2025-08-13

### Added
 - oihana\enums\Alter
 - oihana\enums\ArithmeticOperator
 - oihana\enums\Boolean
 - oihana\enums\Char
 - oihana\enums\CharacterSet
 - oihana\enums\IniOptions
 - oihana\enums\JsonParam
 - oihana\enums\Order
 - oihana\enums\Param
