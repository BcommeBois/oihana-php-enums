# Énumérations mail & SMTP — `oihana\enums\mail`

Le vocabulaire de l'email et de SMTP : noms de champs d'en-tête (composés à partir de traits par catégorie), priorités, encodages de transfert MIME, et la couche SMTP (ports, schémas, sécurité, mécanismes d'auth, codes de réponse, codes de statut étendus). ⚙️ marque les classes avec [helpers](helpers.md).

| Énumération | Valeurs | # | Description |
|---|---|--:|---|
| `MailHeader` ⚙️ | `string` | 57 | Noms de champs d'en-tête email (RFC 5322 & co.), répartis en traits par catégorie. |
| `ContentTransferEncoding` ⚙️ | `string` | 5 | Valeurs MIME `Content-Transfer-Encoding` (`base64`, `quoted-printable`, …). |
| `MailPriority` ⚙️ | `string` | 3 | Niveaux de priorité canoniques avec conversions `X-Priority` / `Importance` / `Priority`. |
| `SmtpPort` | `int` | 4 | Ports SMTP bien connus (`25`, `465`, `587`, `2525`) par rôle. |
| `SmtpScheme` ⚙️ | `string` | 2 | Schémas DSN SMTP (`smtp`, `smtps`). |
| `SmtpSecurity` ⚙️ | `string` | 6 | Valeurs `secure` SMTP (`ssl`/`smtps`, `tls`/`starttls`, `none`/`plain`) associées au schéma & au port. |
| `SmtpAuthMechanism` ⚙️ | `string` | 11 | Mécanismes d'auth SASL SMTP (`PLAIN`, `LOGIN`, `CRAM-MD5`, `XOAUTH2`, …). |
| `SmtpReplyCode` ⚙️ | `int` | 32 | Codes de réponse SMTP (RFC 5321) avec helpers type / transitoire / permanent. |
| `EnhancedStatusCode` ⚙️ | `string` | 3 | Classes de codes de statut étendus (`2`/`4`/`5`) avec helpers de parsing `X.Y.Z`. |
| `AutoSubmitted` ⚙️ | `string` | 4 | Valeurs `Auto-Submitted` (`no`, `auto-generated`, …) avec `isAutomated()`. |
| `Sensitivity` | `string` | 3 | Valeurs `Sensitivity` (`Personal`, `Private`, `Company-Confidential`). |

## Exemples

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

## `MailHeader` et ses traits par catégorie

Les constantes de `MailHeader` sont réparties en traits composables par catégorie sous `oihana\enums\mail\headers` — `OriginatorHeaderTrait`, `MimeHeaderTrait`, `ListHeaderTrait`, `AuthenticationHeaderTrait`, `TraceHeaderTrait`, et d'autres. `use` un seul trait quand vous n'avez besoin que d'une catégorie.

```php
use oihana\enums\mail\MailHeader;

$headers = [];
$headers = MailHeader::set( $headers, 'subject', 'Hello' );  // insensible à la casse
MailHeader::get( $headers, 'Subject' );                      // 'Hello'
MailHeader::has( $headers, 'SUBJECT' );                      // true
MailHeader::normalize( 'message-id' );                       // 'Message-ID'
MailHeader::all( $headers );                                 // table en casse canonique
```

> Contrairement à `HttpHeader`, les helpers de `MailHeader` opèrent sur une **table d'en-têtes en mémoire** (`array<string,string>`) que vous passez — pas sur le puits de réponse au runtime de PHP.

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — les méthodes partagées.
- [Helpers de confort](helpers.md) — `MailHeader`, `MailPriority`, `SmtpSecurity`, `SmtpReplyCode`, `EnhancedStatusCode`, et plus.
- [Énumérations HTTP](http.md) — le pendant côté HTTP des en-têtes.
- [Sommaire FR](README.md).
