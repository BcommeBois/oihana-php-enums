# Oihana PHP - Enums

![Oihana PHP Enums](https://raw.githubusercontent.com/BcommeBois/oihana-php-enums/main/assets/images/oihana-php-enums-logo-inline-512x160.png)

A collection of strongly-typed constant enumerations for PHP.

[![Latest Version](https://img.shields.io/packagist/v/oihana/php-enums.svg?style=flat-square)](https://packagist.org/packages/oihana/php-enums)  [![Total Downloads](https://img.shields.io/packagist/dt/oihana/php-enums.svg?style=flat-square)](https://packagist.org/packages/oihana/php-enums) [![License](https://img.shields.io/packagist/l/oihana/php-enums.svg?style=flat-square)](LICENSE)

`oihana/php-enums` bundles **over 1,600 constants** across **73 enumeration classes** in five domains — general, HTTP, mail/SMTP, JWT/JOSE and OAuth 2.0/OIDC. Every class is a **constant class** (not a native PHP `enum`) using `ConstantsTrait`, so they all share one reflection API — list, validate and reverse-look-up values without instantiating anything, and replace *magic strings* everywhere.

Framework-agnostic, PHP 8.4+, dependency-light.

## 📚 Documentation

User guides (FR + EN) — getting started, the shared `ConstantsTrait` API, the full catalogue per namespace, convenience helpers, testing and tips:

| | |
|---|---|
| 🇬🇧 **[English documentation](wiki/en/README.md)** | 🇫🇷 **[Documentation française](wiki/fr/README.md)** |
| Getting started, `ConstantsTrait`, general/HTTP/mail/JWT/OAuth2, helpers, tips. | Démarrage, `ConstantsTrait`, général/HTTP/mail/JWT/OAuth2, helpers, astuces. |

Auto-generated API reference (phpDocumentor):  
👉 https://bcommebois.github.io/oihana-php-enums

## 🚀 Features

- 📦 **73 enumerations / 1,600+ constants** across general, HTTP, mail/SMTP, JWT/JOSE and OAuth 2.0/OIDC domains.
- 🔍 **One shared reflection API** via `ConstantsTrait` — `enums()`, `includes()`, `getConstant()`, `validate()` — identical on every class.
- 🧩 **Composable per-category traits** for `HttpHeader` and `MailHeader` — `use` only what you need.
- ⚙️ **Domain helpers** where they help — `HttpStatusCode::getDescription()`, `SmtpSecurity::scheme()`, `MailPriority::toXPriority()`, `PostalCodePattern::isValid()`, and more.
- 🛡️ **No *magic strings*** — typo-safe, refactor-friendly, IDE-autocompleted.

💡 No external dependencies beyond Oihana's core and reflection utilities.

## 📦 Installation

> **Requires [PHP 8.4+](https://php.net/releases/)**

Install via [Composer](https://getcomposer.org):
```bash
composer require oihana/php-enums
```

## 🚀 Quick start

```php
use oihana\enums\Boolean;
use oihana\enums\Char;
use oihana\enums\http\HttpMethod;
use oihana\enums\http\HttpStatusCode;

$enabled = Boolean::TRUE;                  // 'true'
echo 'A' . Char::DOT . 'B';                // 'A.B'

HttpMethod::includes( 'GET' );             // true
HttpMethod::enums();                       // ['CONNECT', 'DELETE', 'GET', ...]
HttpStatusCode::getDescription( 404 );     // 'Not found'
```

The full catalogue lives in the wiki — [English](wiki/en/README.md#the-catalogue) · [Français](wiki/fr/README.md#le-catalogue).

## ✅ Tests & coverage

Run the full unit-test suite (PHPUnit, strict mode):
```bash
composer test
```

Run a single test case:
```bash
./vendor/bin/phpunit --filter HttpStatusCodeTest
```

Measure coverage (requires Xdebug or PCOV):
```bash
composer coverage        # text + Clover + HTML under build/coverage/
composer coverage:md     # readable Markdown summary (build/coverage/COVERAGE.md)
```

The suite covers **100% of lines** (323/323). For the testing philosophy and the
`@codeCoverageIgnore` policy, see **[wiki/en/testing.md](wiki/en/testing.md)** ·
**[wiki/fr/testing.md](wiki/fr/testing.md)**.

## 🧾 License

This project is licensed under the [Mozilla Public License 2.0 (MPL-2.0)](https://www.mozilla.org/en-US/MPL/2.0/).

## 👤 About the author

- Author : Marc ALCARAZ (aka eKameleon)
- Mail : [marc@ooop.fr](mailto:marc@ooop.fr)
- Website : http://www.ooop.fr

## 🛠️ Generate the documentation

We use [phpDocumentor](https://phpdoc.org/) to generate the API reference into the `./docs` folder:

```bash
composer doc
```

`docs/` is gitignored and published to GitHub Pages by CI — it is not committed.

## 🔗 Related packages

- `oihana/php-core` – core helpers and utilities used by this library: `https://github.com/BcommeBois/oihana-php-core`
- `oihana/php-reflect` – reflection and hydration utilities (provides `ConstantsTrait`): `https://github.com/BcommeBois/oihana-php-reflect`
