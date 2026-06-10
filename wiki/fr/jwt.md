# Énumérations JWT / JOSE — `oihana\enums\jwt`

Les identifiants de la famille JOSE / JWT (RFC 7515–7519, 7517, 7518, 8037) : algorithmes, claims, paramètres d'en-tête, types de token, et le vocabulaire des clés JWK. Ce sont de purs catalogues de constantes — ils partagent l'API [`ConstantsTrait`](constants-trait.md) et ne fournissent pas de helper supplémentaire.

| Énumération | Valeurs | # | Description |
|---|---|--:|---|
| `JwtAlgorithm` | `string` | 38 | Identifiants d'algorithmes JOSE (`alg` / `enc`). |
| `JwtClaim` | `string` | 53 | Noms de claims JWT standard. |
| `JwtHeader` | `string` | 17 | Noms de paramètres d'en-tête JOSE standard. |
| `JwtType` | `string` | 7 | Valeurs standard d'en-tête `typ` (type de JWT). |
| `JwkKeyType` | `string` | 4 | Types de clé JWK — valeurs `kty` (`EC`, `RSA`, `oct`, `OKP`). |
| `JwkCurve` | `string` | 8 | Courbes JWK — valeurs `crv` (`P-256`, `Ed25519`, …). |
| `JwkParameter` | `string` | 23 | Noms de membres JWK / JWK Set (`kty`, `n`, `e`, `crv`, …). |
| `JwkUse` | `string` | 2 | Usage de clé publique JWK — valeurs `use` (`sig`, `enc`). |
| `JwkKeyOperation` | `string` | 8 | Opérations de clé JWK — valeurs `key_ops` (`sign`, `verify`, …). |

## Exemples

```php
use oihana\enums\jwt\JwtAlgorithm;
use oihana\enums\jwt\JwtClaim;
use oihana\enums\jwt\JwtHeader;
use oihana\enums\jwt\JwkKeyType;

$header = [
    JwtHeader::ALG => JwtAlgorithm::RS256,
    JwtHeader::TYP => 'JWT',
];

$claims = [
    JwtClaim::ISS => 'https://issuer.example',
    JwtClaim::SUB => 'user-123',
    JwtClaim::EXP => time() + 3600,
];

JwtClaim::includes( 'iss' );              // true
JwkKeyType::enums();                       // ['EC', 'OKP', 'RSA', 'oct']
```

## Voir aussi

- [L'API `ConstantsTrait`](constants-trait.md) — `enums()`, `includes()`, `validate()`, …
- [Énumérations OAuth 2.0 / OIDC](oauth2.md) — le vocabulaire d'authentification environnant.
- [Sommaire FR](README.md).
