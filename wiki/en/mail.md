# Mail & SMTP enums — `oihana\enums\mail`

The email and SMTP vocabulary: header field names (composed from per-category traits), priorities, MIME transfer encodings, and the SMTP layer (ports, schemes, security, auth mechanisms, reply codes, enhanced status codes). ⚙️ marks classes with [helpers](helpers.md).

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

## Examples

```php
use oihana\enums\mail\MailPriority;
use oihana\enums\mail\SmtpSecurity;
use oihana\enums\mail\SmtpReplyCode;

MailPriority::toXPriority( MailPriority::HIGH );   // '1 (Highest)'
SmtpSecurity::scheme( SmtpSecurity::TLS );         // SmtpScheme::SMTP
SmtpSecurity::defaultPort( SmtpSecurity::SSL );    // 465
SmtpReplyCode::getDescription( 250 );              // 'Requested mail action okay, completed'
SmtpReplyCode::isPermanent( 550 );                 // true
```

## `MailHeader` and its per-category traits

`MailHeader`'s constants are split into composable per-category traits under `oihana\enums\mail\headers` — `OriginatorHeaderTrait`, `MimeHeaderTrait`, `ListHeaderTrait`, `AuthenticationHeaderTrait`, `TraceHeaderTrait`, and more. `use` a single trait when you only need one category.

```php
use oihana\enums\mail\MailHeader;

$headers = [];
$headers = MailHeader::set( $headers, 'subject', 'Hello' );  // case-insensitive
MailHeader::get( $headers, 'Subject' );                      // 'Hello'
MailHeader::has( $headers, 'SUBJECT' );                      // true
MailHeader::normalize( 'message-id' );                       // 'Message-ID'
MailHeader::all( $headers );                                 // canonical-cased map
```

> Unlike `HttpHeader`, `MailHeader`'s helpers operate on an **in-memory header map** (`array<string,string>`) you pass in — not on PHP's runtime response sink.

## See also

- [The `ConstantsTrait` API](constants-trait.md) — the shared methods.
- [Convenience helpers](helpers.md) — `MailHeader`, `MailPriority`, `SmtpSecurity`, `SmtpReplyCode`, `EnhancedStatusCode`, and more.
- [HTTP enums](http.md) — the HTTP-side header story.
- [English TOC](README.md).
