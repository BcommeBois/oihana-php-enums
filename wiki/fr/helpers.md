# Helpers de confort ⚙️

Au-delà de l'API partagée [`ConstantsTrait`](constants-trait.md), certaines énumérations exposent des **helpers statiques métier**. Ils sont marqués ⚙️ dans tout le catalogue. Cette page les liste tous au même endroit.

| Énumération | Helpers |
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

## Exemples détaillés

```php
use oihana\enums\HashAlgorithm;
use oihana\enums\http\HttpStatusCode;
use oihana\enums\http\MediaType;
use oihana\enums\mail\SmtpSecurity;
use oihana\enums\mail\MailPriority;

// Hachage conscient du runtime
HashAlgorithm::supported();                            // algos présents sur ce build PHP
HashAlgorithm::ensureAvailable( HashAlgorithm::SHA256 ); // lève ConstantException si désactivé

// Raisonnement sur les statuts HTTP
HttpStatusCode::getDescription( 404 );                 // 'Not found'
HttpStatusCode::getType( 503 );                        // Output::ERROR
HttpStatusCode::fromException( new RuntimeException('x', 502) ); // 502

// Négociation de contenu
MediaType::withCharset( MediaType::APPLICATION_JSON, 'utf-8' ); // 'application/json; charset=utf-8'

// Raisonnement sur le transport SMTP
SmtpSecurity::scheme( SmtpSecurity::SSL );             // SmtpScheme::SMTPS
SmtpSecurity::isImplicitTls( SmtpSecurity::SSL );      // true

// Conversions de priorité mail
MailPriority::toXPriority( MailPriority::HIGH );       // '1 (Highest)'
MailPriority::fromXPriority( '1' );                    // MailPriority::HIGH
```

> **Les helpers lèvent aussi.** Certains — comme `HashAlgorithm::ensureAvailable()` et `PostalCodePattern::assert()` — lèvent `oihana\reflect\exceptions\ConstantException` sur une entrée invalide, à l'image de `validate()`.

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — les méthodes communes à toutes les énumérations.
- [Général](general.md) · [HTTP](http.md) · [Mail](mail.md) — où chaque helper vit en contexte.
- [Sommaire FR](README.md).
