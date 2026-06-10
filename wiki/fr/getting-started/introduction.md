# Introduction

## Ce que fait `oihana/php-enums`

`oihana/php-enums` est une **bibliothèque PHP 8.4+** qui regroupe dans un seul paquet les constantes symboliques qu'une application redéclare sans cesse : méthodes, codes de statut et en-têtes HTTP, types MIME/média, vocabulaire mail et SMTP, identifiants JWT/JOSE, paramètres OAuth 2.0 / OpenID Connect, plus un jeu d'énumérations générales (booléens-en-chaînes, caractères isolés, directives `ini`, clés `$_SERVER`, algorithmes de hachage…).

Elle livre **plus de 1 600 constantes** réparties sur **73 classes** en cinq espaces de noms. Aucune n'est un `enum` natif PHP : chacune est une **classe de constantes** qui `use` [`ConstantsTrait`](../constants-trait.md), ce qui donne à toutes la même API de réflexion — lister les valeurs, tester l'appartenance, retrouver un nom, valider une entrée — sans rien instancier.

## La philosophie *oihana*

Trois principes traversent la bibliothèque — et plus largement l'écosystème `oihana/*` :

1. **Zéro *chaîne magique*.** Un nom d'en-tête s'écrit `HttpHeader::CONTENT_TYPE`, pas `'Content-Type'` ; la description d'un code de statut s'obtient par `HttpStatusCode::getDescription(404)`, pas via un `switch` écrit à la main. Les renommages deviennent *refactor-friendly*, l'autocomplétion de l'IDE fonctionne, et une faute de frappe est détectée à l'appel plutôt qu'à l'exécution.

2. **Une seule API partagée, basée sur la réflexion.** Comme chaque classe compose le même `ConstantsTrait`, on apprend `enums()`, `includes()`, `getConstant()` et `validate()` une fois, et elles fonctionnent à l'identique sur `Boolean`, `HttpMethod`, `JwtClaim` ou `OAuth2Error`. Aucune courbe d'apprentissage par classe.

3. **Agnostique de framework et léger en dépendances.** Le paquet ne dépend que de `oihana/php-core` et `oihana/php-reflect` (ce dernier fournit `ConstantsTrait`). Il s'intègre dans n'importe quel projet PHP 8.4+ — avec ou sans framework.

## Pourquoi des classes de constantes plutôt qu'un `enum` natif

PHP 8.1 a introduit l'`enum` natif : pourquoi des classes de constantes ? Trois raisons qui comptent pour ce catalogue :

- **Héritage et composition.** Un `enum` natif ne peut ni étendre une autre énumération ni être réparti sur des `trait`s. Une classe de constantes le peut : `HttpHeader` compose ~20 traits par catégorie (`CorsHeaderTrait`, `SecurityHeaderTrait`, …), ce qui permet de `use` un seul trait quand on n'a besoin que d'une catégorie.
- **Valeurs composites.** Une constante peut contenir un tableau — utile quand un nom symbolique correspond à plusieurs valeurs concrètes. Un `enum` natif typé est restreint à un seul scalaire par cas.
- **Interopérabilité directe.** Les constantes sont de simples valeurs `string`/`int`, directement utilisables là où PHP attend un scalaire (`hash(HashAlgorithm::SHA256, …)`, `ini_set(IniOptions::DISPLAY_ERRORS, '1')`), sans déballage `->value`.

Le compromis : on ne bénéficie pas du typage natif des `enum` (`function f(HttpMethod $m)`). En échange on gagne la réflexion, la composition et une interop scalaire sans friction — exactement ce dont a besoin un grand catalogue de constantes.

## Pourquoi cette bibliothèque

Tout projet finit par retaper le même vocabulaire : `'GET'`, `'Authorization'`, `'application/json'`, `200`, `'sha256'`, `'no-store'`, `'urn:ietf:params:oauth:grant-type:device_code'`. Dispersées dans les fichiers, ces chaînes dérivent, accumulent les fautes de frappe et résistent au refactoring. Les centraliser sous forme de constantes typées — derrière une API cohérente — supprime toute cette catégorie de bugs et rend l'intention du code explicite.

## Voir aussi

- [Installation](installation.md) — prérequis et `composer require`.
- [Dépendances](dependencies.md) — `oihana/php-core`, `oihana/php-reflect`.
- [L'API `ConstantsTrait`](../constants-trait.md) — les méthodes de réflexion partagées.
- [Sommaire FR](../README.md).
