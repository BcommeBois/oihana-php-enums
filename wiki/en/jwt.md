# JWT / JOSE enums — `oihana\enums\jwt`

Identifiers from the JOSE / JWT family (RFC 7515–7519, 7517, 7518, 8037): algorithms, claims, header parameters, token types, and the JWK key vocabulary. These are plain constant catalogues — they share the [`ConstantsTrait`](constants-trait.md) API and ship no extra helpers.

| Enumeration | Values | # | Description |
|---|---|--:|---|
| `JwtAlgorithm` | `string` | 38 | JOSE algorithm identifiers (`alg` / `enc`). |
| `JwtClaim` | `string` | 53 | Standard JWT claim names. |
| `JwtHeader` | `string` | 17 | Standard JOSE header parameter names. |
| `JwtType` | `string` | 7 | Standard `typ` (JWT type) header values. |
| `JwkKeyType` | `string` | 4 | JWK key types — `kty` values (`EC`, `RSA`, `oct`, `OKP`). |
| `JwkCurve` | `string` | 8 | JWK curves — `crv` values (`P-256`, `Ed25519`, …). |
| `JwkParameter` | `string` | 23 | JWK / JWK Set member names (`kty`, `n`, `e`, `crv`, …). |
| `JwkUse` | `string` | 2 | JWK public-key use — `use` values (`sig`, `enc`). |
| `JwkKeyOperation` | `string` | 8 | JWK key operations — `key_ops` values (`sign`, `verify`, …). |

## Examples

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

## See also

- [The `ConstantsTrait` API](constants-trait.md) — `enums()`, `includes()`, `validate()`, …
- [OAuth 2.0 / OIDC enums](oauth2.md) — the surrounding auth vocabulary.
- [English TOC](README.md).
