# Oihana PHP - Enums

A collection of strongly-typed constant enumerations for PHP.

Oihana PHP Enums is a lightweight PHP library providing a set of well-structured enumerations implemented as constant classes.
Each enumeration groups related symbolic values to replace hardcoded strings or numbers, improving readability, consistency, and typo safety across your codebase.

This package is designed to be framework-agnostic, fully compatible with PHP 8.4+, and works seamlessly with the ConstantsTrait for reflection and dynamic constant access.

## Features

	•	📦 Multiple enumerations for different domains (e.g. Boolean, Char, IniOptions, and more).
	•	🔍 Reflection-ready with ConstantsTrait for listing or validating values.
	•	🛡️ Reduces “magic strings” and improves semantic clarity.
	•	🧩 Easily reusable in any PHP application or framework.
	•	⚡ No external dependencies except Oihana’s reflection utilities.

## Usage

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

## Installation

```php
composer require oihana/oihana-php-enums
```

