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
- `JwtClaim` — comprehensive JWT claim registry:
  - RFC 7519 registered claims (`iss`, `sub`, `aud`, `exp`, `nbf`, `iat`, `jti`) with long-form aliases (`ISSUER`, `SUBJECT`, `AUDIENCE`, `EXPIRES_AT`, `NOT_BEFORE`, `ISSUED_AT`, `JWT_ID`)
  - Common OAuth 2.0 / OIDC claims (`azp`, `nonce`, `auth_time`, `acr`, `amr`, `scope`, `scp`, `client_id`)
  - OIDC Session Management (`sid` + `SESSION_ID` alias — Front-Channel / Back-Channel Logout)
  - OIDC ID Token validation hashes (`at_hash`, `c_hash`)
  - OIDC standard profile claims (Core §5.1): `name`, `given_name`, `family_name`, `middle_name`, `nickname`, `preferred_username`, `profile`, `picture`, `website`, `email`, `email_verified`, `gender`, `birthdate`, `zoneinfo`, `locale`, `phone_number`, `phone_number_verified`, `address`, `updated_at`
  - RFC 8693 Token Exchange (`act`, `may_act`)
  - RFC 7800 Proof-of-Possession (`cnf`)
  - Widely used provider-specific claims (`groups`, `roles`, `entitlements`, `tid`, `oid`)
  - Full phpdoc per constant with spec references

#### OAuth 2.0 enums (`oihana\enums\oauth2`)
- `OAuth2Parameter` — request parameter names (RFC 6749 / 7523 / 7636, OIDC)
- `OAuth2TokenField` — token endpoint response fields (RFC 6749 §5, RFC 7662)
- `OAuth2GrantType` (with unit tests) — `grant_type` values for the token endpoint:
  - RFC 6749 core grants: `authorization_code`, `client_credentials`, `refresh_token`, `password` (deprecated by OAuth 2.1 / RFC 9700), `implicit` (deprecated by OAuth 2.1 / RFC 9700)
  - IETF extension grants: JWT Bearer (RFC 7523), SAML 2.0 Bearer (RFC 7522), Device Code (RFC 8628), Token Exchange (RFC 8693), UMA 2.0 ticket
  - OpenID Connect CIBA grant (`urn:openid:params:grant-type:ciba`)
  - Full phpdoc per constant with spec references and `@deprecated` tags where applicable

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
