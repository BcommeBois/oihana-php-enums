# Glossaire

Termes récurrents employés dans cette documentation.

### Classe de constantes

Une `class` PHP ordinaire qui ne contient que des déclarations `public const` et qui `use` `ConstantsTrait`. Ce n'est **pas** un `enum` natif PHP. C'est la brique de base de toute la bibliothèque — voir [Introduction § Pourquoi des classes de constantes](introduction.md#pourquoi-des-classes-de-constantes-plutôt-quun-enum-natif).

### `ConstantsTrait`

Le trait (de `oihana/php-reflect`) que compose chaque énumération. Il expose l'API partagée, statique et basée sur la réflexion : `enums()`, `getAll()`, `getConstant()`, `includes()`, `validate()`, et consorts. Référence complète : [L'API `ConstantsTrait`](../constants-trait.md).

### Chaîne magique / nombre magique

Un littéral nu (`'GET'`, `'Content-Type'`, `200`, `'sha256'`) utilisé directement dans le code au lieu d'une constante nommée. Cette bibliothèque existe pour les **remplacer** par des constantes typées — éliminant les fautes de frappe et rendant les renommages refactor-friendly.

### Valeur vs nom (de constante)

Pour `const string GET = 'GET'`, le **nom** est `GET` (l'identifiant) et la **valeur** est `'GET'` (la donnée). `getConstantKeys()` renvoie les noms ; `enums()`/`getConstantValues()` renvoient les valeurs ; `getConstant()` retrouve **le nom à partir d'une valeur**.

### Valeur composite (tableau)

Une constante dont la valeur est un **tableau** plutôt qu'un scalaire — par exemple un nom symbolique correspondant à plusieurs valeurs concrètes. Les `enum` natifs PHP ne le permettent pas ; les classes de constantes oui. `enums()` **aplatit** ces valeurs dans la liste renvoyée.

### Helper (⚙️)

Une **méthode statique métier** que certaines énumérations ajoutent par-dessus l'API partagée de `ConstantsTrait` — par exemple `HttpStatusCode::getDescription()`, `SmtpSecurity::scheme()`, `MailPriority::toXPriority()`. La liste complète est dans [Helpers de confort](../helpers.md).

### Composition de traits

Répartir les constantes d'une grande énumération sur plusieurs `trait`s, puis les composer dans une seule classe avec un unique `use`. `HttpHeader` et `MailHeader` le font, afin que les appelants puissent `use` uniquement le trait par catégorie dont ils ont besoin (ex. `CorsHeaderTrait`, `OriginatorHeaderTrait`).

### `ConstantException`

L'exception (de `oihana/php-reflect`) levée par `validate()` quand une valeur n'est pas une constante valide, et par certains helpers d'énumération (ex. `HashAlgorithm::ensureAvailable()`).

### Strict vs non-strict

Indique si les vérifications d'appartenance comparent aussi les **types** (`200` vs `'200'`). `includes()` est **non-strict** par défaut ; `validate()` est **strict** par défaut. Voir [L'API `ConstantsTrait`](../constants-trait.md#includes).

## Voir aussi

- [Introduction](introduction.md) — les concepts en contexte.
- [L'API `ConstantsTrait`](../constants-trait.md) — la référence méthode par méthode.
- [Sommaire FR](../README.md).
