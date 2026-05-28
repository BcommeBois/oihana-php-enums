# The "Oihana PHP Enums" library - Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

### Added

#### Core enums (`oihana\enums`)

- `FilterOption`
- `HashAlgorithm` (with unit tests)
- `Output` — incl. `REASON` constant
- `Pagination`
- `PostalCodePattern` — renamed from `PostalCode`, with country-specific patterns
- `ServerParam`
- `Status`

#### HTTP enums (`oihana\enums\http`)

- `AuthScheme` — RFC 7235 authentication schemes (`Basic`, `Bearer`, `Digest`, `OAuth`, …)
- `GuzzleOption` — Guzzle HTTP client request option keys
- `HttpHeader` — with helper methods. Observability / tracing section extended with `X_RESPONSE_TIME` (`X-Response-Time`, de-facto Express/Koa) and `SERVER_TIMING` (`Server-Timing`, W3C standard).
- `HttpMethod` — with `isValid()` case-sensitive flag
- `HttpParamStrategy`
- `HttpStatusCode` — incl. `fromException()` to extract a 4xx/5xx code from a `Throwable`, falling back to `INTERNAL_SERVER_ERROR`
- `OAuthParameters` — OAuth 1.0a protocol parameters (RFC 5849)
- `OAuthSignatureMethod`
- `RequestAttribute` (with unit tests) — conventional PSR-7 request attribute names attached by middlewares and read by downstream consumers:
  - Identity / authentication: `ACCESS_TOKEN`, `AUTH_SCHEME`, `TOKEN_TYPE`, `USER_CLAIMS`, `USER_ID`, `USER_ROLES`, `USER_SCOPES`
  - Traceability: `CORRELATION_ID`, `REQUEST_ID`, `TRACE_ID`
  - Multi-tenancy: `ORGANIZATION_ID`, `TENANT_ID`
  - Routing (PSR-15): `ROUTE`, `ROUTE_PARAMS`
  - I18n: `LOCALE`
  - camelCase values aligned with the de-facto PSR-15 ecosystem convention

#### JWT / JOSE enums (`oihana\enums\jwt`)

- `JwtAlgorithm` (with unit tests) — JOSE algorithm identifiers (RFC 7518, RFC 8037, RFC 8812):
  - JWS signature/MAC: `none` (deprecated), `HS256/384/512`, `RS256/384/512`, `ES256/384/512`, `PS256/384/512`, `EdDSA`, `ES256K`
  - JWE key management: `RSA1_5` (deprecated), `RSA-OAEP`, `RSA-OAEP-256`, `A128/192/256KW`, `dir`, `ECDH-ES`, `ECDH-ES+A128/192/256KW`, `A128/192/256GCMKW`, `PBES2-HS*+A*KW`
  - JWE content encryption: `A128CBC-HS256`, `A192CBC-HS384`, `A256CBC-HS512`, `A128/192/256GCM`
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
- `JwtHeader` (with unit tests) — JOSE header parameter names (RFC 7515 §4.1, RFC 7516 §4.1, RFC 7797, RFC 8555): `alg`, `kid`, `typ`, `cty`, `crit`, `enc`, `zip`, `b64`, `url`, `nonce`, `ppt`, and the full X.509 set (`x5u`, `x5c`, `x5t`, `x5t#S256`)
- `JwtType` (with unit tests) — `typ` header values: `JWT`, `at+jwt` (RFC 9068), `dpop+jwt` (RFC 9449), `logout+jwt`, `secevent+jwt` (RFC 8417), `token-introspection+jwt` (RFC 9701), `it+jwt`

#### OAuth 2.0 / OIDC enums (`oihana\enums\oauth2`)

- `OAuth2ClientAssertionType` (with unit tests) — `client_assertion_type` URNs for `jwt-bearer` (RFC 7523) and `saml2-bearer` (RFC 7522)
- `OAuth2CodeChallengeMethod` (with unit tests) — PKCE methods (RFC 7636): `plain`, `S256`
- `OAuth2Display` (with unit tests) — `display` values: `page`, `popup`, `touch`, `wap`
- `OAuth2Error` (with unit tests) — standard error codes from the authorization endpoint (RFC 6749 §4.1.2.1), token endpoint (RFC 6749 §5.2), OIDC Core §3.1.2.6, Device Flow (RFC 8628), Resource Indicators (RFC 8707), and DPoP (RFC 9449)
- `OAuth2GrantType` (with unit tests) — `grant_type` values for the token endpoint:
  - RFC 6749 core grants: `authorization_code`, `client_credentials`, `refresh_token`, `password` (deprecated by OAuth 2.1 / RFC 9700), `implicit` (deprecated by OAuth 2.1 / RFC 9700)
  - IETF extension grants: JWT Bearer (RFC 7523), SAML 2.0 Bearer (RFC 7522), Device Code (RFC 8628), Token Exchange (RFC 8693), UMA 2.0 ticket
  - OpenID Connect CIBA grant (`urn:openid:params:grant-type:ciba`)
  - Full phpdoc per constant with spec references and `@deprecated` tags where applicable
- `OAuth2Parameter` (with unit tests) — comprehensive OAuth 2.0 / OIDC request parameter registry, grouped by specification and sorted alphabetically:
  - Authorization request (RFC 6749 §4.1.1): `client_id`, `redirect_uri`, `response_type`, `scope`, `state`
  - PKCE (RFC 7636): `code_challenge`, `code_challenge_method`, `code_verifier`
  - Token request (RFC 6749 §4): `client_secret`, `code`, `grant_type`, `password`, `refresh_token`, `username`
  - JWT / SAML Bearer (RFC 7523, RFC 7522): `assertion`, `client_assertion`, `client_assertion_type`
  - Introspection / revocation (RFC 7662, RFC 7009): `token`, `token_type_hint`
  - OpenID Connect Core 1.0: `acr_values`, `claims`, `claims_locales`, `display`, `id_token_hint`, `login_hint`, `max_age`, `nonce`, `prompt`, `registration`, `request`, `request_uri`, `response_mode`, `ui_locales`
  - OIDC RP-Initiated Logout 1.0: `logout_hint`, `post_logout_redirect_uri`
  - Device Authorization Grant (RFC 8628): `device_code`, `user_code`
  - Token Exchange (RFC 8693): `actor_token`, `actor_token_type`, `audience`, `requested_token_type`, `subject_token`, `subject_token_type`
  - Resource Indicators (RFC 8707): `resource`
  - DPoP (RFC 9449): `dpop_jkt`
  - Rich Authorization Requests (RFC 9396): `authorization_details`
- `OAuth2Prompt` (with unit tests) — `prompt` values: `none`, `login`, `consent`, `select_account`, `create`
- `OAuth2ResponseType` (with unit tests) — `response_type` values: `code`, `token`, `id_token`, `none`, plus OIDC Hybrid Flow combinations (`code id_token`, `code token`, `id_token token`, `code id_token token`)
- `OAuth2TokenEndpointAuthMethod` (with unit tests) — client authentication methods: `client_secret_basic`, `client_secret_post`, `client_secret_jwt`, `private_key_jwt`, `none`, `tls_client_auth`, `self_signed_tls_client_auth`
- `OAuth2TokenField` — token endpoint response fields (RFC 6749 §5, RFC 7662)
- `OAuth2TokenType` (with unit tests) — HTTP token types (`Bearer`, `DPoP`, `MAC`, `N_A`) and Token Exchange URIs (RFC 8693 §3): `access_token`, `refresh_token`, `id_token`, `saml1`, `saml2`, `jwt`
- `OidcAmr` (with unit tests) — Authentication Method Reference values (RFC 8176)
- `OidcDiscoveryField` (with unit tests) — fields of the `/.well-known/openid-configuration` discovery document (OIDC Discovery 1.0, RFC 8414, RFC 8628, RFC 9126, RFC 9449, OIDC RP-Initiated / Front-Channel / Back-Channel Logout)
- `OidcScope` (with unit tests) — standard OIDC scopes: `openid`, `profile`, `email`, `address`, `phone`, `offline_access`

### Changed

- `oihana\enums\Char` — expanded with more symbols and improved tests
- `oihana\enums\JsonParam` — added `JSON_NONE` constant

### Removed

- `oihana\enums\Alter` — moved to the `oihana\models\enums` package

----

## [1.0.0] - 2025-08-13

### Added

- `oihana\enums\Alter`
- `oihana\enums\ArithmeticOperator`
- `oihana\enums\Boolean`
- `oihana\enums\Char`
- `oihana\enums\CharacterSet`
- `oihana\enums\IniOptions`
- `oihana\enums\JsonParam`
- `oihana\enums\Order`
- `oihana\enums\Param`
