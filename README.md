# Oihana PHP - Enums

![Oihana Php Core](https://raw.githubusercontent.com/BcommeBois/oihana-php-enums/main/assets/images/oihana-php-enums-logo-inline-512x160.png)

A collection of strongly-typed constant enumerations for PHP.

[![Latest Version](https://img.shields.io/packagist/v/oihana/php-enums.svg?style=flat-square)](https://packagist.org/packages/oihana/php-enums)  
[![Total Downloads](https://img.shields.io/packagist/dt/oihana/php-enums.svg?style=flat-square)](https://packagist.org/packages/oihana/php-enums)  
[![License](https://img.shields.io/packagist/l/oihana/php-enums.svg?style=flat-square)](LICENSE)

Oihana PHP Enums is a lightweight PHP library providing a set of well-structured enumerations implemented as constant classes.
Each enumeration groups related symbolic values to replace hardcoded strings or numbers, improving readability, consistency, and typo safety across your codebase.

This package is designed to be framework-agnostic, fully compatible with PHP 8.4+, and works seamlessly with the ConstantsTrait for reflection and dynamic constant access.

## 📚 Documentation

Full documentation: `https://bcommebois.github.io/oihana-php-enums`

## 📦 Installation

Requires [PHP 8.4+](https://php.net/releases/). Install via [Composer](https://getcomposer.org/):

```shell
composer require oihana/php-enums
```

## ✨ What you can do

- 📦 Multiple enumerations for different domains (e.g. Boolean, Char, IniOptions, and more).
- 🔍 Reflection-ready with ConstantsTrait for listing or validating values.
- 🛡️ Reduces “magic strings” and improves semantic clarity.
- 🧩 Easily reusable in any PHP application or framework.
- ⚡ No external dependencies except Oihana’s reflection utilities.

## 🚀 Quick Start

```php
use oihana\enums\Boolean;
use oihana\enums\Char;
use oihana\enums\IniOptions;

// Boolean values as strings
$enabled = Boolean::TRUE; // 'true'

// Character constants
echo 'A' . Char::DOT . 'B'; // Outputs: A.B

// Ini options
ini_set(IniOptions::DISPLAY_ERRORS, '1');
```


## ✅ Running Unit Tests

To run all tests:
```shell
$ composer test
```

To run a specific test file:
```shell
$ composer test tests/oihana/enums/BooleanTest.php
```

## 🧾 License

This project is licensed under the [Mozilla Public License 2.0 (MPL-2.0)](https://www.mozilla.org/en-US/MPL/2.0/).

## 👤 About the author

- Author : Marc ALCARAZ (aka eKameleon)
- Mail : [marc@ooop.fr](mailto:marc@ooop.fr)
- Website : http://www.ooop.fr


## 🔗 Related packages

- `oihana/php-core` – core helpers and utilities used by this library: `https://github.com/BcommeBois/oihana-php-core`
- `oihana/php-reflect` – reflection and hydration utilities: `https://github.com/BcommeBois/oihana-php-reflect`
