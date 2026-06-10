# HTTP enums — `oihana\enums\http`

Everything HTTP: request methods, status codes, the full header vocabulary (composed from per-category traits), media types, URI schemes, content negotiation, cookies, and OAuth 1.0a. ⚙️ marks classes with [helpers](helpers.md).

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

## Examples

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

## `HttpHeader` and its per-category traits

`HttpHeader`'s **131** constants are split into composable per-category traits under `oihana\enums\http\headers` — `CorsHeaderTrait`, `SecurityHeaderTrait`, `FetchMetadataHeaderTrait`, `CachingHeaderTrait`, `ContentHeaderTrait`, and more. `HttpHeader` composes them all; `use` a single trait when you only need one category.

```php
use oihana\enums\http\HttpHeader;

HttpHeader::CONTENT_TYPE;                  // 'Content-Type'
HttpHeader::send( HttpHeader::CONTENT_TYPE, 'application/json' );
HttpHeader::has( HttpHeader::CONTENT_TYPE );
HttpHeader::all();                         // headers_list()
HttpHeader::remove( HttpHeader::CONTENT_TYPE );
```

> `HttpHeader`'s helpers (`all()`, `has()`, `remove()`, `send()`) act on the **runtime response sink** (PHP's `header()`/`headers_list()`), unlike `MailHeader`'s helpers which act on an in-memory map.

## See also

- [The `ConstantsTrait` API](constants-trait.md) — the shared methods.
- [Convenience helpers](helpers.md) — `HttpStatusCode`, `HttpMethod`, `MediaType`, `UriScheme`, `AuthScheme`, `HttpHeader`.
- [Mail & SMTP enums](mail.md) — the mail-side header story.
- [English TOC](README.md).
