# OAuth 2.0 / OpenID Connect enums — `oihana\enums\oauth2`

The OAuth 2.0 and OpenID Connect vocabulary (RFC 6749 and its extensions, OIDC Core/Discovery/Registration): grant and response types, request parameters, error codes, token-endpoint fields, and the OIDC discovery/claims/scopes families. Plain constant catalogues sharing the [`ConstantsTrait`](constants-trait.md) API.

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
| `OAuth2ResponseMode` | `string` | 8 | `response_mode` values (`query`, `form_post`, JARM, …). |
| `OAuth2SubjectType` | `string` | 2 | OIDC subject identifier types (`public`, `pairwise`). |
| `OAuth2TokenEndpointAuthMethod` | `string` | 7 | Client authentication methods at the token endpoint. |
| `OAuth2TokenField` | `string` | 19 | Token endpoint response fields. |
| `OAuth2TokenType` | `string` | 10 | Access token types / Token Exchange URIs. |
| `OAuth2TokenTypeHint` | `string` | 3 | `token_type_hint` for introspection / revocation. |
| `OAuth2ClientMetadata` | `string` | 45 | Dynamic Client Registration metadata (RFC 7591/7592, OIDC). |
| `OidcAddressField` | `string` | 6 | Sub-fields of the OIDC `address` claim. |
| `OidcAmr` | `string` | 21 | Authentication Method Reference (`amr`) values. |
| `OidcClaimType` | `string` | 3 | OIDC claim types (`normal`, `aggregated`, `distributed`). |
| `OidcDiscoveryField` | `string` | 54 | OIDC discovery document fields (`.well-known/openid-configuration`). |
| `OidcScope` | `string` | 6 | OIDC scope values. |

## Examples

```php
use oihana\enums\oauth2\OAuth2GrantType;
use oihana\enums\oauth2\OAuth2Parameter;
use oihana\enums\oauth2\OAuth2Error;
use oihana\enums\oauth2\OidcScope;

$request = [
    OAuth2Parameter::GRANT_TYPE => OAuth2GrantType::AUTHORIZATION_CODE,
    OAuth2Parameter::SCOPE      => OidcScope::OPENID . ' ' . OidcScope::EMAIL,
];

OAuth2GrantType::includes( 'client_credentials' ); // true
OAuth2Error::validate( 'invalid_grant' );           // ok (throws on unknown)
```

## See also

- [The `ConstantsTrait` API](constants-trait.md) — `enums()`, `includes()`, `validate()`, …
- [JWT / JOSE enums](jwt.md) — the token-format vocabulary.
- [English TOC](README.md).
