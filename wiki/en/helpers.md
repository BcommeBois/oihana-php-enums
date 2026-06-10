# Convenience helpers ⚙️

Beyond the shared [`ConstantsTrait`](constants-trait.md) API, some enums expose **domain-specific static helpers**. They are marked ⚙️ throughout the catalogue. This page lists them all in one place.

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

## Worked examples

```php
use oihana\enums\HashAlgorithm;
use oihana\enums\http\HttpStatusCode;
use oihana\enums\http\MediaType;
use oihana\enums\mail\SmtpSecurity;
use oihana\enums\mail\MailPriority;

// Runtime-aware hashing
HashAlgorithm::supported();                            // algos present on this PHP build
HashAlgorithm::ensureAvailable( HashAlgorithm::SHA256 ); // throws ConstantException if disabled

// HTTP status reasoning
HttpStatusCode::getDescription( 404 );                 // 'Not found'
HttpStatusCode::getType( 503 );                        // Output::ERROR
HttpStatusCode::fromException( new RuntimeException('x', 502) ); // 502

// Content negotiation
MediaType::withCharset( MediaType::APPLICATION_JSON, 'utf-8' ); // 'application/json; charset=utf-8'

// SMTP transport reasoning
SmtpSecurity::scheme( SmtpSecurity::SSL );             // SmtpScheme::SMTPS
SmtpSecurity::isImplicitTls( SmtpSecurity::SSL );      // true

// Mail priority conversions
MailPriority::toXPriority( MailPriority::HIGH );       // '1 (Highest)'
MailPriority::fromXPriority( '1' );                    // MailPriority::HIGH
```

> **Helpers throw, too.** Some — like `HashAlgorithm::ensureAvailable()` and `PostalCodePattern::assert()` — throw `oihana\reflect\exceptions\ConstantException` on invalid input, mirroring `validate()`.

## See also

- [The `ConstantsTrait` API](constants-trait.md) — the methods every enum shares.
- [General](general.md) · [HTTP](http.md) · [Mail](mail.md) — where each helper lives in context.
- [English TOC](README.md).
