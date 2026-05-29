<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of cryptographic curves used by a JSON Web Key (the `crv` member of a JWK).
 *
 * The `crv` parameter appears on Elliptic Curve keys ({@see JwkKeyType::EC})
 * and on Octet Key Pair keys ({@see JwkKeyType::OKP}). It selects the curve the key is defined over.
 *
 * Example:
 * ```php
 * $jwk =
 * [
 *     JwkParameter::KTY => JwkKeyType::OKP ,
 *     JwkParameter::CRV => JwkCurve::ED25519 ,
 *     JwkParameter::X   => $x ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7518 §6.2.1.1 — `P-256`, `P-384`, `P-521` (EC keys)
 * - RFC 8812  §3       — `secp256k1` (used with `ES256K`)
 * - RFC 8037  §3.1     — `Ed25519`, `Ed448`, `X25519`, `X448` (OKP keys)
 * - IANA JSON Web Key Elliptic Curve registry
 *
 * @see JwkKeyType
 * @see JwkParameter::CRV
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwkCurve
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Elliptic Curve keys — kty = EC (RFC 7518 §6.2.1.1, RFC 8812)
    // -------------------------------------------------------------------------

    /** `P-256` — NIST P-256 (secp256r1), used with `ES256` (RFC 7518). */
    public const string P_256 = 'P-256' ;

    /** `P-384` — NIST P-384 (secp384r1), used with `ES384` (RFC 7518). */
    public const string P_384 = 'P-384' ;

    /** `P-521` — NIST P-521 (secp521r1), used with `ES512` (RFC 7518). */
    public const string P_521 = 'P-521' ;

    /** `secp256k1` — SEC 2 curve, used with `ES256K` (RFC 8812). */
    public const string SECP256K1 = 'secp256k1' ;

    // -------------------------------------------------------------------------
    // Octet Key Pair keys — kty = OKP (RFC 8037 §3.1)
    // -------------------------------------------------------------------------

    /** `Ed25519` — EdDSA signature curve (RFC 8037). */
    public const string ED25519 = 'Ed25519' ;

    /** `Ed448` — EdDSA signature curve (RFC 8037). */
    public const string ED448 = 'Ed448' ;

    /** `X25519` — ECDH key-agreement curve (RFC 8037). */
    public const string X25519 = 'X25519' ;

    /** `X448` — ECDH key-agreement curve (RFC 8037). */
    public const string X448 = 'X448' ;
}
