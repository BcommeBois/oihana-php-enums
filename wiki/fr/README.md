# oihana/php-enums — Énumérations de constantes fortement typées pour PHP

![Langue](https://img.shields.io/badge/langue-Français-blue)

`oihana/php-enums` est une bibliothèque PHP 8.4+ regroupant **plus de 1 600 constantes** réparties sur **73 classes d'énumération**, organisées en cinq espaces de noms (`oihana\enums`, `…\http`, `…\mail`, `…\jwt`, `…\oauth2`). Chaque classe est une **classe de constantes** (et non un `enum` natif PHP) utilisant [`ConstantsTrait`](constants-trait.md) : elles partagent donc toutes une même API de réflexion — lister, valider et retrouver des valeurs sans rien instancier — et remplacent les *chaînes magiques* partout.

![Oihana PHP Enums](https://raw.githubusercontent.com/BcommeBois/oihana-php-enums/main/assets/images/oihana-php-enums-logo-inline-512x160.png)

## À qui s'adresse cette documentation

Aux développeurs PHP qui veulent :

- arrêter de disséminer des **chaînes/nombres magiques** (`'GET'`, `'application/json'`, `200`, `'sha256'`, `'Content-Type'`) et référencer des **constantes typées** à la place ;
- **lister, valider et retrouver** des valeurs symboliques via une API unique basée sur la réflexion (`enums()`, `includes()`, `getConstant()`, `validate()`) ;
- composer des **traits par catégorie** (en-têtes HTTP, en-têtes mail) pour ne tirer que les constantes nécessaires ;
- s'appuyer sur des **helpers métier** quand une énumération en propose — `HttpStatusCode::getDescription()`, `SmtpSecurity::scheme()`, `MailPriority::toXPriority()`, `PostalCodePattern::isValid()`, etc.

## Démarrage rapide

```php
use oihana\enums\Boolean;
use oihana\enums\Char;
use oihana\enums\http\HttpMethod;
use oihana\enums\http\HttpStatusCode;

$enabled = Boolean::TRUE;                       // 'true'
echo 'A' . Char::DOT . 'B';                     // 'A.B'

HttpMethod::includes( 'GET' );                  // true
HttpMethod::enums();                            // ['CONNECT', 'DELETE', 'GET', ...]
HttpStatusCode::getDescription( 404 );          // 'Not found'
```

L'API partagée vient de `ConstantsTrait` ; les helpers par classe sont listés dans [Helpers de confort](helpers.md). Table des matières complète ci-dessous.

## Table des matières

### Démarrage — [`getting-started/`](getting-started/)

- [Introduction](getting-started/introduction.md) — ce que fait la bibliothèque, la philosophie *oihana*, et pourquoi des classes de constantes plutôt qu'un `enum` natif.
- [Installation](getting-started/installation.md) — prérequis PHP 8.4+ et commande `composer require`.
- [Dépendances](getting-started/dependencies.md) — `oihana/php-core` et `oihana/php-reflect` (qui fournit `ConstantsTrait`) et leur rôle.
- [Glossaire](getting-started/glossary.md) — *classe de constantes*, `ConstantsTrait`, *chaîne magique*, *helper*, *composition de traits*, et autres termes récurrents.

### L'API partagée

- [L'API `ConstantsTrait`](constants-trait.md) — les méthodes de réflexion communes à toutes les énumérations : `enums()`, `getAll()`, `getConstant()`, `getConstantKeys()`, `getConstantValues()`, `includes()`, `get()`, `validate()`, `resetCaches()`.

### Le catalogue

- [Énumérations générales](general.md) — `oihana\enums` : `Boolean`, `Char`, `CharacterSet`, `ArithmeticOperator`, `FilterOption`, `HashAlgorithm`, `IniOptions`, `JsonParam`, `Order`, `Output`, `Pagination`, `Param`, `PostalCodePattern`, `ServerParam`, `Status`.
- [Énumérations HTTP](http.md) — `oihana\enums\http` : méthodes, codes de statut, en-têtes (+ traits par catégorie), types de média, schémas d'URI, cache/cookie/encodage, OAuth 1.0a.
- [Énumérations mail & SMTP](mail.md) — `oihana\enums\mail` : en-têtes mail (+ traits), priorités, encodages de transfert, ports/schémas/sécurité/auth/codes de réponse SMTP, codes de statut étendus.
- [Énumérations JWT / JOSE](jwt.md) — `oihana\enums\jwt` : `JwtAlgorithm`, `JwtClaim`, `JwtHeader`, `JwtType`, et la famille JWK.
- [Énumérations OAuth 2.0 / OIDC](oauth2.md) — `oihana\enums\oauth2` : types de grant/réponse, paramètres, erreurs, champs de token, découverte/scopes/AMR OIDC, métadonnées client.

### Transverse

- [Helpers de confort](helpers.md) — les énumérations ⚙️ qui exposent des helpers statiques métier au-delà de `ConstantsTrait`.
- [Tests & couverture](testing.md) — lancer la suite PHPUnit, mesurer la couverture, et la politique `@codeCoverageIgnore`.
- [Astuces et pièges](tips.md) — classes de constantes vs `enum` natif, valeurs composites (tableaux), règles PHP 8.4 sur les constantes de traits, et autres pièges.

## Code source

Le code de la bibliothèque vit sous [`src/oihana/enums/`](../../src/oihana/enums/) :

- [`src/oihana/enums/`](../../src/oihana/enums/) — énumérations générales et sous-espaces `http`, `mail`, `jwt`, `oauth2`.

## Voir aussi

- [Packagist `oihana/php-enums`](https://packagist.org/packages/oihana/php-enums) — la page du paquet.
- [Référence API (phpDocumentor)](https://bcommebois.github.io/oihana-php-enums) — référence générée au niveau des classes.
- [Astuces et pièges](tips.md) — conventions et erreurs courantes.
