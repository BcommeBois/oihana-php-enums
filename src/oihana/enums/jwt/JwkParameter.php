<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of JSON Web Key (JWK) member names.
 *
 * Centralises the member names used when building, parsing or validating a
 * JWK and a JWK Set (JWKS). Members fall into three groups:
 *
 * 1. **Common metadata** — present on any key type (RFC 7517 §4):
 *    `kty`, `use`, `key_ops`, `alg`, `kid`, `x5u`, `x5c`, `x5t`, `x5t#S256`.
 * 2. **Key-type-specific values** — the actual key material, whose presence
 *    depends on {@see JwkKeyType} (RFC 7518 §6, RFC 8037 §2).
 * 3. **JWK Set** — the `keys` array wrapping a set of JWKs (RFC 7517 §5).
 *
 * Example:
 * ```php
 * $jwk =
 * [
 *     JwkParameter::KTY => JwkKeyType::RSA ,
 *     JwkParameter::USE => JwkUse::SIG ,
 *     JwkParameter::KID => $keyId ,
 *     JwkParameter::N   => $modulus ,
 *     JwkParameter::E   => $exponent ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7517 §4 — common JWK parameters
 * - RFC 7517 §5 — JWK Set (`keys`)
 * - RFC 7518 §6 — `EC`, `RSA`, `oct` key parameters
 * - RFC 8037 §2 — `OKP` key parameters
 * - IANA JSON Web Key Parameters registry
 *
 * @see JwkKeyType
 * @see JwkCurve
 * @see JwkUse
 * @see JwkKeyOperation
 * @see JwtHeader::JWK
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwkParameter
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Common metadata (RFC 7517 §4)
    // -------------------------------------------------------------------------

    /**
     * `kty` — Key Type (RFC 7517 §4.1). See {@see JwkKeyType}.
     */
    public const string KTY = 'kty' ;

    /**
     * `use` — Public Key Use, `sig` or `enc` (RFC 7517 §4.2). See {@see JwkUse}.
     */
    public const string USE = 'use' ;

    /**
     * `key_ops` — Key Operations (RFC 7517 §4.3). See {@see JwkKeyOperation}.
     */
    public const string KEY_OPS = 'key_ops' ;

    /**
     * `alg` — Algorithm intended for use with the key (RFC 7517 §4.4). See {@see JwtAlgorithm}.
     */
    public const string ALG = 'alg' ;

    /**
     * `kid` — Key ID (RFC 7517 §4.5).
     */
    public const string KID = 'kid' ;

    /**
     * `x5u` — X.509 URL (RFC 7517 §4.6).
     */
    public const string X5U = 'x5u' ;

    /**
     * `x5c` — X.509 Certificate Chain (RFC 7517 §4.7).
     */
    public const string X5C = 'x5c' ;

    /**
     * `x5t` — X.509 Certificate SHA-1 Thumbprint (RFC 7517 §4.8).
     */
    public const string X5T = 'x5t' ;

    /**
     * `x5t#S256` — X.509 Certificate SHA-256 Thumbprint (RFC 7517 §4.9).
     */
    public const string X5T_S256 = 'x5t#S256' ;

    // -------------------------------------------------------------------------
    // JWK Set (RFC 7517 §5)
    // -------------------------------------------------------------------------

    /**
     * `keys` — Array of JWKs forming a JWK Set (RFC 7517 §5.1).
     */
    public const string KEYS = 'keys' ;

    // -------------------------------------------------------------------------
    // Elliptic Curve & Octet Key Pair (RFC 7518 §6.2, RFC 8037 §2)
    // -------------------------------------------------------------------------

    /**
     * `crv` — Curve (RFC 7518 §6.2.1.1, RFC 8037 §2). See {@see JwkCurve}.
     */
    public const string CRV = 'crv' ;

    /**
     * `x` — X coordinate / public key (RFC 7518 §6.2.1.2, RFC 8037 §2).
     */
    public const string X = 'x' ;

    /**
     * `y` — Y coordinate, EC keys only (RFC 7518 §6.2.1.3).
     */
    public const string Y = 'y' ;

    /**
     * `d` — Private key value (EC §6.2.2.1, OKP RFC 8037, RSA private exponent §6.3.2.1).
     */
    public const string D = 'd' ;

    // -------------------------------------------------------------------------
    // RSA (RFC 7518 §6.3)
    // -------------------------------------------------------------------------

    /**
     * `n` — Modulus (RFC 7518 §6.3.1.1).
     */
    public const string N = 'n' ;

    /**
     * `e` — Public exponent (RFC 7518 §6.3.1.2).
     */
    public const string E = 'e' ;

    /**
     * `p` — First prime factor (RFC 7518 §6.3.2.2).
     */
    public const string P = 'p' ;

    /**
     * `q` — Second prime factor (RFC 7518 §6.3.2.3).
     */
    public const string Q = 'q' ;

    /**
     * `dp` — First factor CRT exponent (RFC 7518 §6.3.2.4).
     */
    public const string DP = 'dp' ;

    /**
     * `dq` — Second factor CRT exponent (RFC 7518 §6.3.2.5).
     */
    public const string DQ = 'dq' ;

    /**
     * `qi` — First CRT coefficient (RFC 7518 §6.3.2.6).
     */
    public const string QI = 'qi' ;

    /**
     * `oth` — Other primes info, for keys with more than two primes (RFC 7518 §6.3.2.7).
     */
    public const string OTH = 'oth' ;

    // -------------------------------------------------------------------------
    // Symmetric (RFC 7518 §6.4)
    // -------------------------------------------------------------------------

    /** `k` — Key value for an octet sequence (symmetric) key (RFC 7518 §6.4.1). */
    public const string K = 'k' ;
}
