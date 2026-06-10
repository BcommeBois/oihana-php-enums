# L'API `ConstantsTrait`

Chaque énumération de `oihana/php-enums` `use` **`oihana\reflect\traits\ConstantsTrait`** (livré par [`oihana/php-reflect`](getting-started/dependencies.md)). Ce trait unique donne aux 73 classes la **même API statique basée sur la réflexion** — ce que vous apprenez ici fonctionne à l'identique sur `Boolean`, `HttpMethod`, `JwtClaim`, `OAuth2Error` et les autres.

```php
use oihana\reflect\traits\ConstantsTrait;

final class Color
{
    use ConstantsTrait;

    public const string RED   = 'red';
    public const string GREEN = 'green';
    public const string BLUE  = 'blue';
}
```

Toutes les méthodes sont **statiques**, les résultats sont **mis en cache** (par réflexion à la première utilisation), et rien n'a besoin d'être instancié.

## Vue d'ensemble des méthodes

| Méthode | Renvoie | Rôle |
|---|---|---|
| [`enums()`](#enums) | `array` | Liste des **valeurs**, aplatie, dédupliquée, triée. |
| [`getAll()`](#getall) | `array<string,mixed>` | La table brute **nom → valeur**. |
| [`getConstantKeys()`](#getconstantkeys) | `string[]` | Les **noms** de constantes uniquement. |
| [`getConstantValues()`](#getconstantvalues) | `array` | Les **valeurs** de constantes uniquement. |
| [`getConstant()`](#getconstant) | `string\|string[]\|null` | Recherche inverse : **valeur → nom(s)**. |
| [`get()`](#get) | `mixed` | La valeur si elle est valide, sinon une valeur par défaut. |
| [`includes()`](#includes) | `bool` | Cette valeur existe-t-elle ? |
| [`validate()`](#validate) | `void` | Affirme qu'une valeur existe, sinon lève. |
| [`resetCaches()`](#resetcaches) | `void` | Vide les caches de réflexion internes. |

---

## `enums()`

```php
public static function enums( int $flags = SORT_STRING ): array
```

Renvoie toutes les **valeurs** sous forme de tableau plat, **unique** et **trié**. Les constantes de type tableau sont aplaties en valeurs individuelles, et les doublons sont retirés. L'argument optionnel `$flags` est passé à `sort()` (`SORT_STRING` par défaut ; utilisez `SORT_NUMERIC` pour les énumérations à valeurs entières comme `HttpStatusCode`).

```php
use oihana\enums\http\HttpMethod;
use oihana\enums\http\HttpStatusCode;

HttpMethod::enums();                  // ['CONNECT', 'DELETE', 'GET', 'HEAD', ...]
HttpStatusCode::enums( SORT_NUMERIC ); // [100, 101, 102, ..., 600]
```

## `getAll()`

```php
public static function getAll(): array
```

Renvoie la table brute **nom de constante → valeur**, exactement comme déclarée (sans aplatissement ni tri). C'est la brique sur laquelle reposent les autres méthodes ; elle est calculée une fois via `ReflectionClass` puis mise en cache.

```php
use oihana\enums\Boolean;

Boolean::getAll(); // ['TRUE' => 'true', 'FALSE' => 'false']
```

## `getConstantKeys()`

```php
public static function getConstantKeys(): array
```

Renvoie les **noms** de constantes (les clés de `getAll()`).

```php
use oihana\enums\Boolean;

Boolean::getConstantKeys(); // ['TRUE', 'FALSE']
```

## `getConstantValues()`

```php
public static function getConstantValues(): array
```

Renvoie les **valeurs** de constantes dans l'ordre de déclaration (les valeurs de `getAll()`, **sans** l'aplatissement/tri/déduplication de `enums()`).

```php
use oihana\enums\Boolean;

Boolean::getConstantValues(); // ['true', 'false']
```

## `getConstant()`

```php
public static function getConstant(
    string            $value,
    array|string|null $separator       = null,
    bool              $caseInsensitive = false
): string|array|null
```

**Recherche inverse** : à partir d'une valeur, renvoie le **nom** de la constante. Elle renvoie :

- une **chaîne** quand exactement une constante correspond,
- un **tableau de noms** quand plusieurs constantes partagent la valeur,
- `null` quand rien ne correspond.

`$separator` permet de retrouver une sous-valeur à l'intérieur d'une constante chaîne qui empaquette plusieurs valeurs (ex. `'draft,open,closed'`) ; `$caseInsensitive` active la correspondance insensible à la casse.

```php
use oihana\enums\http\HttpStatusCode;

HttpStatusCode::getConstant( 404 ); // 'NOT_FOUND'
HttpStatusCode::getConstant( 200 ); // 'OK'
HttpStatusCode::getConstant( 999 ); // null
```

## `get()`

```php
public static function get( mixed $value, mixed $default = null ): mixed
```

Renvoie `$value` lorsqu'il s'agit d'une valeur d'énumération valide, sinon `$default`. Pratique pour ramener une entrée externe à une valeur connue avec un repli.

```php
use oihana\enums\Order;

Order::get( 'asc' );           // 'asc'
Order::get( 'sideways', 'asc' ); // 'asc'  (repli)
```

## `includes()`

```php
public static function includes( mixed $value, bool $strict = false, ?string $separator = null ): bool
```

Renvoie `true` quand `$value` existe parmi les constantes. `$strict` ajoute une vérification de type (`200` vs `'200'`) ; `$separator` découpe les constantes chaînes empaquetées avant comparaison.

```php
use oihana\enums\http\HttpMethod;

HttpMethod::includes( 'GET' );    // true
HttpMethod::includes( 'BREW' );   // false
```

> Notez que le défaut diffère de `validate()` : `includes()` est **non-strict par défaut** (`$strict = false`).

## `validate()`

```php
public static function validate( mixed $value, bool $strict = true, ?string $separator = null ): void
```

Affirme que `$value` existe ; lève `oihana\reflect\exceptions\ConstantException` sinon. Contrairement à `includes()`, elle est **stricte par défaut** (`$strict = true`). À utiliser pour échouer vite sur une entrée invalide à une frontière.

```php
use oihana\enums\http\HttpMethod;
use oihana\reflect\exceptions\ConstantException;

HttpMethod::validate( 'GET' );  // ok, renvoie void

try
{
    HttpMethod::validate( 'BREW' );
}
catch ( ConstantException $e )
{
    // 'Invalid constant : "BREW"'
}
```

## `resetCaches()`

```php
public static function resetCaches(): void
```

Vide les caches internes (la table de `getAll()` et l'index inverse de `getConstant()`). On en a rarement besoin en code applicatif ; cette méthode existe surtout pour les **tests** qui définissent des constantes dynamiquement ou vérifient la reconstruction du cache.

```php
SomeEnum::resetCaches();
```

## Voir aussi

- [Introduction](getting-started/introduction.md) — pourquoi des classes de constantes plutôt qu'un `enum` natif.
- [Dépendances](getting-started/dependencies.md) — `oihana/php-reflect`, qui fournit ce trait.
- [Helpers de confort](helpers.md) — les helpers par classe ajoutés par-dessus cette API partagée.
- [Sommaire FR](README.md).
