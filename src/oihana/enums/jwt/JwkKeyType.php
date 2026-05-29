<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of JSON Web Key types (the `kty` member of a JWK).
 *
 * The `kty` parameter identifies the cryptographic algorithm family used
 * with the key (RFC 7517 §4.1). It determines which other JWK members are
 * expected — see {@see JwkParameter}.
 *
 * Example:
 * ```php
 * $jwk =
 * [
 *     JwkParameter::KTY => JwkKeyType::EC ,
 *     JwkParameter::CRV => JwkCurve::P_256 ,
 *     JwkParameter::X   => $x ,
 *     JwkParameter::Y   => $y ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7518 §6.1 — `kty` values (`EC`, `RSA`, `oct`)
 * - RFC 8037 §2   — `OKP` (Octet Key Pair, for Edwards / Montgomery curves)
 * - IANA JSON Web Key Types registry
 *
 * @see JwkCurve
 * @see JwkParameter
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwkKeyType
{
    use ConstantsTrait ;

    /**
     * `EC` — Elliptic Curve key (RFC 7518 §6.2). Pairs with {@see JwkCurve} P-* curves.
     */
    public const string EC = 'EC' ;

    /**
     * `RSA` — RSA key (RFC 7518 §6.3).
     */
    public const string RSA = 'RSA' ;

    /**
     * `oct` — Octet sequence, i.e. a symmetric key (RFC 7518 §6.4).
     */
    public const string OCT = 'oct' ;

    /**
     * `OKP` — Octet Key Pair for Edwards / Montgomery curves (RFC 8037 §2).
     */
    public const string OKP = 'OKP' ;
}
