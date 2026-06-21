# Énumérations HTTP — `oihana\enums\http`

Tout ce qui touche à HTTP : méthodes de requête, codes de statut, le vocabulaire complet des en-têtes (composé à partir de traits par catégorie), types de média, schémas d'URI, négociation de contenu, cookies, et OAuth 1.0a. ⚙️ marque les classes avec [helpers](helpers.md).

| Énumération | Valeurs | # | Description |
|---|---|--:|---|
| `AuthScheme` ⚙️ | `string` | 10 | Schémas d'authentification HTTP (`Basic`, `Bearer`, …). |
| `GuzzleOption` | `string` | 29 | Options de requête du client HTTP Guzzle. |
| `HttpHeader` ⚙️ | `string` | 131 | Noms d'en-têtes HTTP standard (requête & réponse). |
| `HttpMethod` ⚙️ | `string` | 36 | Méthodes de requête HTTP (`GET`, `POST`, …). |
| `HttpParamStrategy` | `string` | 3 | Stratégie de récupération des paramètres d'une requête. |
| `HttpStatusCode` ⚙️ | `int` | 78 | Codes de statut HTTP standard. |
| `OAuthParameters` | `string` | 7 | Clés de paramètres OAuth 1.0a. |
| `OAuthSignatureMethod` | `string` | 4 | Méthodes de signature OAuth 1.0a. |
| `RequestAttribute` | `string` | 15 | Noms conventionnels d'attributs de requête PSR-7. |
| `UriScheme` ⚙️ | `string` | 5 | Schémas d'URI (`http`, `https`, `ws`, …). |
| `UrlComponent` | `string` | 8 | Clés de composants renvoyées par `parse_url()`. |
| `MediaType` ⚙️ | `string` | 36 | Types de média IANA courants (`application/json`, `text/html`, …). |
| `Charset` | `string` | 22 | Noms de charset pour `Content-Type` (`utf-8`, `iso-8859-1`, …). |
| `CacheControlDirective` | `string` | 16 | Directives `Cache-Control` (`no-store`, `max-age`, …). |
| `ContentEncoding` | `string` | 6 | Codages de contenu (`gzip`, `br`, `zstd`, …). |
| `CookieSameSite` | `string` | 3 | Valeurs de cookie `SameSite` (`Strict`, `Lax`, `None`). |
| `HttpProtocolVersion` | `string` | 4 | Chaînes de version de protocole (`HTTP/1.1`, `HTTP/2`, …). |
| `ContentDisposition` | `string` | 3 | Types `Content-Disposition` (`inline`, `attachment`, `form-data`). |

## Exemples

```php
use oihana\enums\http\HttpMethod;
use oihana\enums\http\HttpStatusCode;
use oihana\enums\http\MediaType;
use oihana\enums\http\UriScheme;

HttpMethod::isValid( 'GET' );             // true
HttpStatusCode::getDescription( 404 );    // 'Not found'
HttpStatusCode::getType( 503 );           // Output::ERROR
MediaType::withCharset( MediaType::TEXT_HTML, 'utf-8' ); // 'text/html; charset=utf-8'
UriScheme::defaultPort( UriScheme::HTTPS );              // 443
```

## `HttpHeader` et ses traits par catégorie

Les **131** constantes de `HttpHeader` sont réparties en traits composables par catégorie sous `oihana\enums\http\headers` — `CorsHeaderTrait`, `SecurityHeaderTrait`, `FetchMetadataHeaderTrait`, `CachingHeaderTrait`, `ContentHeaderTrait`, et d'autres. `HttpHeader` les compose tous ; `use` un seul trait quand vous n'avez besoin que d'une catégorie.

```php
use oihana\enums\http\HttpHeader;

HttpHeader::CONTENT_TYPE;                  // 'Content-Type'
HttpHeader::send( HttpHeader::CONTENT_TYPE, 'application/json' );
HttpHeader::has( HttpHeader::CONTENT_TYPE );
HttpHeader::all();                         // headers_list()
HttpHeader::remove( HttpHeader::CONTENT_TYPE );
```

> Les helpers de `HttpHeader` (`all()`, `has()`, `remove()`, `send()`) agissent sur le **puits de réponse au runtime** (`header()`/`headers_list()` de PHP), à la différence des helpers de `MailHeader` qui agissent sur une table en mémoire.

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — les méthodes partagées.
- [Helpers de confort](helpers.md) — `HttpStatusCode`, `HttpMethod`, `MediaType`, `UriScheme`, `AuthScheme`, `HttpHeader`.
- [Énumérations mail & SMTP](mail.md) — le pendant côté mail des en-têtes.
- [Sommaire FR](README.md).
