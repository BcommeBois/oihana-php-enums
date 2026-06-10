# Dépendances

`oihana/php-enums` est volontairement léger. Il déclare **deux** dépendances d'exécution, issues du même écosystème.

| Paquet | Rôle |
|---|---|
| [`oihana/php-core`](https://github.com/BcommeBois/oihana-php-core) | Fonctions helper de base utilisées en interne (ex. `oihana\core\arrays\toArray`, que `ConstantsTrait` utilise pour normaliser les valeurs de constantes composites/tableaux). |
| [`oihana/php-reflect`](https://github.com/BcommeBois/oihana-php-reflect) | Fournit **`ConstantsTrait`** — l'API de réflexion partagée que compose chaque énumération — et **`ConstantException`**, levée par `validate()` (et par certains helpers d'énumération). |

```json
"require": {
    "php": ">=8.4",
    "oihana/php-core": "dev-main",
    "oihana/php-reflect": "dev-main"
}
```

## `oihana/php-reflect` — le cœur de l'API

Comme chaque énumération `use` `ConstantsTrait` de ce paquet, les méthodes décrites dans [L'API `ConstantsTrait`](../constants-trait.md) (`enums()`, `getAll()`, `getConstant()`, `includes()`, `validate()`, …) y sont toutes définies, et non dans cette bibliothèque. `ConstantException` — l'exception qu'on attrape autour de `validate()` — y vit également :

```php
use oihana\reflect\exceptions\ConstantException;
```

## `oihana/php-core` — helpers internes

Utilisé en coulisses ; on le référence rarement directement lorsqu'on consomme les énumérations. Il fournit de petits helpers tableaux/chaînes/callables qui gardent l'implémentation du trait concise.

## Dépendances de développement uniquement

Elles ne sont **pas** installées avec `composer require oihana/php-enums --no-dev` ; elles ne comptent que lorsqu'on travaille *sur* la bibliothèque :

- `phpunit/phpunit` — la suite de tests (voir [Tests & couverture](../testing.md)).
- `nunomaduro/collision`, `mikey179/vfsstream` — confort de test.
- `phpdocumentor/shim` — génère la référence API (`composer doc`).

> Xdebug ou PCOV n'est nécessaire que pour *mesurer* la couverture, pas pour installer ni exécuter la bibliothèque — c'est pourquoi `ext-xdebug` n'est **pas** une dépendance dure.

## Voir aussi

- [Installation](installation.md) — la commande `composer require`.
- [L'API `ConstantsTrait`](../constants-trait.md) — ce qu'apporte `php-reflect`.
- [Sommaire FR](../README.md).
