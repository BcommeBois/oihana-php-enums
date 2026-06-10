# Dependencies

`oihana/php-enums` is deliberately light. It declares **two** runtime dependencies, both from the same ecosystem.

| Package | Role |
|---|---|
| [`oihana/php-core`](https://github.com/BcommeBois/oihana-php-core) | Core helper functions used internally (e.g. `oihana\core\arrays\toArray`, which `ConstantsTrait` uses to normalise composite/array constant values). |
| [`oihana/php-reflect`](https://github.com/BcommeBois/oihana-php-reflect) | Provides **`ConstantsTrait`** — the shared reflection API every enum composes — and **`ConstantException`**, thrown by `validate()` (and by some enum helpers). |

```json
"require": {
    "php": ">=8.4",
    "oihana/php-core": "dev-main",
    "oihana/php-reflect": "dev-main"
}
```

## `oihana/php-reflect` — the heart of the API

Because every enumeration `use`s `ConstantsTrait` from this package, the methods documented in [The `ConstantsTrait` API](../constants-trait.md) (`enums()`, `getAll()`, `getConstant()`, `includes()`, `validate()`, …) are all defined there, not in this library. `ConstantException` — the exception you catch around `validate()` — also lives there:

```php
use oihana\reflect\exceptions\ConstantException;
```

## `oihana/php-core` — internal helpers

Used under the hood; you rarely reference it directly when consuming the enums. It supplies small array/string/callable helpers that keep the trait implementation concise.

## Dev-only dependencies

These are **not** installed with `composer require oihana/php-enums --no-dev`; they only matter when working *on* the library:

- `phpunit/phpunit` — the test suite (see [Tests & coverage](../testing.md)).
- `nunomaduro/collision`, `mikey179/vfsstream` — test ergonomics.
- `phpdocumentor/shim` — generates the API reference (`composer doc`).

> Xdebug or PCOV is only needed to *measure* coverage, not to install or run the library — which is why `ext-xdebug` is **not** a hard requirement.

## See also

- [Installation](installation.md) — the `composer require` command.
- [The `ConstantsTrait` API](../constants-trait.md) — what `php-reflect` brings.
- [English TOC](../README.md).
