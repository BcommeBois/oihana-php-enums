<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard JOSE header parameter names.
 *
 * Covers the parameters defined by:
 * - RFC 7515 §4.1 — JSON Web Signature (JWS) header
 * - RFC 7516 §4.1 — JSON Web Encryption (JWE) header
 * - RFC 7797      — Unencoded payload option (`b64`)
 * - RFC 8555      — ACME (`url`, `nonce`)
 *
 * These constants are used when building, parsing, or validating the
 * protected header of a JWS / JWE / JWT.
 *
 * Example:
 * ```php
 * $header =
 * [
 *     JwtHeader::ALG => JwtAlgorithm::RS256 ,
 *     JwtHeader::TYP => JwtType::JWT ,
 *     JwtHeader::KID => $keyId ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7515  §4.1 (JWS Header)
 * - RFC 7516  §4.1 (JWE Header)
 * - RFC 7517  §4   (JWK / JWK Thumbprint)
 * - RFC 7638       (JWK Thumbprint, used as `kid`)
 * - RFC 7797       (`b64`)
 * - RFC 8555  §6.2 (`url`, `nonce` for ACME)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwtHeader
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Common header parameters (JWS + JWE)
    // -------------------------------------------------------------------------

    /**
     * `alg` — Algorithm used to secure the JWS / JWE (RFC 7515 §4.1.1,
     * RFC 7516 §4.1.1).
     *
     * Value: one of the algorithm names registered in the IANA "JSON
     * Web Signature and Encryption Algorithms" registry — see
     * {@see JwtAlgorithm}.
     */
    public const string ALG = 'alg' ;

    /**
     * `jku` — JWK Set URL: HTTPS URI referring to a resource for a set
     * of JSON-encoded public keys (RFC 7515 §4.1.2).
     */
    public const string JKU = 'jku' ;

    /**
     * `jwk` — JSON Web Key corresponding to the key used to digitally
     * sign the JWS (RFC 7515 §4.1.3).
     */
    public const string JWK = 'jwk' ;

    /**
     * `kid` — Key ID hinting which key was used to secure the JWS /
     * JWE (RFC 7515 §4.1.4).
     */
    public const string KID = 'kid' ;

    /**
     * `x5u` — X.509 URL referring to a resource for the X.509 public
     * key certificate or certificate chain (RFC 7515 §4.1.5).
     */
    public const string X5U = 'x5u' ;

    /**
     * `x5c` — X.509 Certificate Chain (RFC 7515 §4.1.6).
     */
    public const string X5C = 'x5c' ;

    /**
     * `x5t` — X.509 Certificate SHA-1 Thumbprint (RFC 7515 §4.1.7).
     */
    public const string X5T = 'x5t' ;

    /**
     * `x5t#S256` — X.509 Certificate SHA-256 Thumbprint (RFC 7515 §4.1.8).
     */
    public const string X5T_S256 = 'x5t#S256' ;

    /**
     * `typ` — Media type of the complete JOSE object (RFC 7515 §4.1.9).
     *
     * Typical values are documented in {@see JwtType}.
     */
    public const string TYP = 'typ' ;

    /**
     * `cty` — Content type of the secured payload (RFC 7515 §4.1.10).
     *
     * Used when the payload is itself a JOSE object (nested JWT).
     */
    public const string CTY = 'cty' ;

    /**
     * `crit` — Critical header parameters: list of header names that
     * the implementation MUST understand and process (RFC 7515 §4.1.11).
     */
    public const string CRIT = 'crit' ;

    // -------------------------------------------------------------------------
    // JWE-only header parameters (RFC 7516 §4.1)
    // -------------------------------------------------------------------------

    /**
     * `enc` — Content encryption algorithm used to perform
     * authenticated encryption on the plaintext (RFC 7516 §4.1.2).
     */
    public const string ENC = 'enc' ;

    /**
     * `zip` — Compression algorithm applied to the plaintext before
     * encryption (RFC 7516 §4.1.3). The only registered value is `DEF`.
     */
    public const string ZIP = 'zip' ;

    // -------------------------------------------------------------------------
    // Extensions
    // -------------------------------------------------------------------------

    /**
     * `b64` — Boolean indicating whether the payload is base64url-encoded
     * (RFC 7797). Used by detached signatures over raw payloads.
     */
    public const string B64 = 'b64' ;

    /**
     * `url` — Target URL of the JWS request (RFC 8555 §6.2). Used by
     * ACME (RFC 8555).
     */
    public const string URL = 'url' ;

    /**
     * `nonce` — Server-issued nonce echoed back in a JWS (RFC 8555).
     */
    public const string NONCE = 'nonce' ;

    /**
     * `ppt` — PASSporT type, used to identify the type of payload
     * (RFC 8225, used by STIR).
     */
    public const string PPT = 'ppt' ;
}
