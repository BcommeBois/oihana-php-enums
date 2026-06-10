# Installation

## Requirements

- **PHP 8.4 or later** — the library uses typed class constants (`const string`, `const int`) and other 8.4 features.
- **[Composer](https://getcomposer.org/)**.

No PHP extension beyond a standard build is required: the enums are pure constants. A few helpers call standard functions that are always available (`hash_algos()`, `header()`, `parse_url()`…).

## Install

```bash
composer require oihana/php-enums
```

This pulls in the two runtime dependencies automatically — see [Dependencies](dependencies.md):

- `oihana/php-core`
- `oihana/php-reflect` (provides `ConstantsTrait`)

## Verify

```php
require 'vendor/autoload.php';

use oihana\enums\Boolean;

echo Boolean::TRUE;            // 'true'
var_dump( Boolean::enums() );  // ['false', 'true']
```

If both lines work, you are ready — head to [the `ConstantsTrait` API](../constants-trait.md) or the [catalogue](../README.md#the-catalogue).

## See also

- [Dependencies](dependencies.md) — what gets installed and why.
- [Introduction](introduction.md) — what the library does and its philosophy.
- [English TOC](../README.md).
