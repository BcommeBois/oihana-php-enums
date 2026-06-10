# Installation

## Prérequis

- **PHP 8.4 ou supérieur** — la bibliothèque utilise les constantes de classe typées (`const string`, `const int`) et d'autres fonctionnalités 8.4.
- **[Composer](https://getcomposer.org/)**.

Aucune extension PHP au-delà d'un build standard n'est requise : les énumérations sont de pures constantes. Quelques helpers appellent des fonctions standard toujours disponibles (`hash_algos()`, `header()`, `parse_url()`…).

## Installer

```bash
composer require oihana/php-enums
```

Cette commande tire automatiquement les deux dépendances d'exécution — voir [Dépendances](dependencies.md) :

- `oihana/php-core`
- `oihana/php-reflect` (fournit `ConstantsTrait`)

## Vérifier

```php
require 'vendor/autoload.php';

use oihana\enums\Boolean;

echo Boolean::TRUE;            // 'true'
var_dump( Boolean::enums() );  // ['false', 'true']
```

Si ces deux lignes fonctionnent, tout est prêt — direction [l'API `ConstantsTrait`](../constants-trait.md) ou le [catalogue](../README.md#le-catalogue).

## Voir aussi

- [Dépendances](dependencies.md) — ce qui est installé et pourquoi.
- [Introduction](introduction.md) — ce que fait la bibliothèque et sa philosophie.
- [Sommaire FR](../README.md).
