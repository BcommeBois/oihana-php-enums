# Énumérations OAuth 2.0 / OpenID Connect — `oihana\enums\oauth2`

Le vocabulaire OAuth 2.0 et OpenID Connect (RFC 6749 et ses extensions, OIDC Core/Discovery/Registration) : types de grant et de réponse, paramètres de requête, codes d'erreur, champs du point de terminaison de token, et les familles découverte/claims/scopes OIDC. De purs catalogues de constantes partageant l'API [`ConstantsTrait`](constants-trait.md).

| Énumération | Valeurs | # | Description |
|---|---|--:|---|
| `OAuth2ClientAssertionType` | `string` | 2 | Valeurs `client_assertion_type` (RFC 7521). |
| `OAuth2CodeChallengeMethod` | `string` | 2 | Méthodes de code challenge PKCE (RFC 7636). |
| `OAuth2Display` | `string` | 4 | Valeurs du paramètre `display` OIDC. |
| `OAuth2Error` | `string` | 25 | Codes d'erreur OAuth 2.0 / OIDC. |
| `OAuth2GrantType` | `string` | 11 | Identifiants de type de grant. |
| `OAuth2Parameter` | `string` | 46 | Noms de paramètres de requête. |
| `OAuth2Prompt` | `string` | 5 | Valeurs du paramètre `prompt` OIDC. |
| `OAuth2ResponseType` | `string` | 8 | Valeurs `response_type`. |
| `OAuth2ResponseMode` | `string` | 8 | Valeurs `response_mode` (`query`, `form_post`, JARM, …). |
| `OAuth2SubjectType` | `string` | 2 | Types d'identifiant de sujet OIDC (`public`, `pairwise`). |
| `OAuth2TokenEndpointAuthMethod` | `string` | 7 | Méthodes d'authentification client au point de terminaison de token. |
| `OAuth2TokenField` | `string` | 19 | Champs de réponse du point de terminaison de token. |
| `OAuth2TokenType` | `string` | 10 | Types de token d'accès / URIs de Token Exchange. |
| `OAuth2TokenTypeHint` | `string` | 3 | `token_type_hint` pour l'introspection / la révocation. |
| `OAuth2ClientMetadata` | `string` | 45 | Métadonnées d'enregistrement dynamique de client (RFC 7591/7592, OIDC). |
| `OidcAddressField` | `string` | 6 | Sous-champs du claim `address` OIDC. |
| `OidcAmr` | `string` | 21 | Valeurs Authentication Method Reference (`amr`). |
| `OidcClaimType` | `string` | 3 | Types de claim OIDC (`normal`, `aggregated`, `distributed`). |
| `OidcDiscoveryField` | `string` | 54 | Champs du document de découverte OIDC (`.well-known/openid-configuration`). |
| `OidcScope` | `string` | 6 | Valeurs de scope OIDC. |

## Exemples

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
OAuth2Error::validate( 'invalid_grant' );           // ok (lève si inconnu)
```

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — `enums()`, `includes()`, `validate()`, …
- [Énumérations JWT / JOSE](jwt.md) — le vocabulaire du format de token.
- [Sommaire FR](README.md).
