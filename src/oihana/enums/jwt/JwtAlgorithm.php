<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard JOSE algorithm identifiers (the `alg` /
 * `enc` header values defined by RFC 7518, plus widely deployed
 * extensions).
 *
 * Three families are exposed here:
 *
 * 1. **Signature / MAC algorithms** — values for the `alg` header of
 *    a JWS (RFC 7518 §3): `HS*`, `RS*`, `ES*`, `PS*`, `EdDSA`, ...
 * 2. **Key management algorithms** — values for the `alg` header of a
 *    JWE (RFC 7518 §4): `RSA-OAEP`, `A*KW`, `dir`, `ECDH-ES`, ...
 * 3. **Content encryption algorithms** — values for the `enc` header
 *    of a JWE (RFC 7518 §5): `A128CBC-HS256`, `A256GCM`, ...
 *
 * Example:
 * ```php
 * $header =
 * [
 *     JwtHeader::ALG => JwtAlgorithm::RS256 ,
 *     JwtHeader::TYP => JwtType::JWT ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7518 §3 — JWS signature algorithms
 * - RFC 7518 §4 — JWE key management algorithms
 * - RFC 7518 §5 — JWE content encryption algorithms
 * - RFC 8037     — EdDSA (Ed25519, Ed448)
 * - RFC 8812     — secp256k1 (`ES256K`)
 * - IANA JOSE Algorithms registry
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwtAlgorithm
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // JWS — Signature / MAC algorithms (RFC 7518 §3)
    // -------------------------------------------------------------------------

    /**
     * `none` — Unsecured JWS (RFC 7518 §3.6).
     *
     * @deprecated Disallowed in practice for any security-bearing
     *             token. Many libraries reject it by default; clients
     *             MUST NOT accept it without explicit opt-in.
     */
    public const string NONE = 'none' ;

    /** `HS256` — HMAC using SHA-256 (RFC 7518 §3.2). */
    public const string HS256 = 'HS256' ;

    /** `HS384` — HMAC using SHA-384 (RFC 7518 §3.2). */
    public const string HS384 = 'HS384' ;

    /** `HS512` — HMAC using SHA-512 (RFC 7518 §3.2). */
    public const string HS512 = 'HS512' ;

    /** `RS256` — RSASSA-PKCS1-v1_5 using SHA-256 (RFC 7518 §3.3). */
    public const string RS256 = 'RS256' ;

    /** `RS384` — RSASSA-PKCS1-v1_5 using SHA-384 (RFC 7518 §3.3). */
    public const string RS384 = 'RS384' ;

    /** `RS512` — RSASSA-PKCS1-v1_5 using SHA-512 (RFC 7518 §3.3). */
    public const string RS512 = 'RS512' ;

    /** `ES256` — ECDSA using P-256 and SHA-256 (RFC 7518 §3.4). */
    public const string ES256 = 'ES256' ;

    /** `ES384` — ECDSA using P-384 and SHA-384 (RFC 7518 §3.4). */
    public const string ES384 = 'ES384' ;

    /** `ES512` — ECDSA using P-521 and SHA-512 (RFC 7518 §3.4). */
    public const string ES512 = 'ES512' ;

    /** `PS256` — RSASSA-PSS using SHA-256 and MGF1 with SHA-256 (RFC 7518 §3.5). */
    public const string PS256 = 'PS256' ;

    /** `PS384` — RSASSA-PSS using SHA-384 and MGF1 with SHA-384 (RFC 7518 §3.5). */
    public const string PS384 = 'PS384' ;

    /** `PS512` — RSASSA-PSS using SHA-512 and MGF1 with SHA-512 (RFC 7518 §3.5). */
    public const string PS512 = 'PS512' ;

    /** `EdDSA` — Edwards-curve DSA, with Ed25519 or Ed448 (RFC 8037). */
    public const string EDDSA = 'EdDSA' ;

    /** `ES256K` — ECDSA using secp256k1 and SHA-256 (RFC 8812). */
    public const string ES256K = 'ES256K' ;

    // -------------------------------------------------------------------------
    // JWE — Key management algorithms (RFC 7518 §4)
    // -------------------------------------------------------------------------

    /**
     * `RSA1_5` — RSAES-PKCS1-v1_5 (RFC 7518 §4.2).
     *
     * @deprecated Vulnerable to Bleichenbacher-style attacks; prefer
     *             {@see self::RSA_OAEP_256}.
     */
    public const string RSA1_5 = 'RSA1_5' ;

    /** `RSA-OAEP` — RSAES OAEP using default parameters (RFC 7518 §4.3). */
    public const string RSA_OAEP = 'RSA-OAEP' ;

    /** `RSA-OAEP-256` — RSAES OAEP using SHA-256 and MGF1 with SHA-256 (RFC 7518 §4.3). */
    public const string RSA_OAEP_256 = 'RSA-OAEP-256' ;

    /** `A128KW` — AES Key Wrap using 128-bit key (RFC 7518 §4.4). */
    public const string A128KW = 'A128KW' ;

    /** `A192KW` — AES Key Wrap using 192-bit key (RFC 7518 §4.4). */
    public const string A192KW = 'A192KW' ;

    /** `A256KW` — AES Key Wrap using 256-bit key (RFC 7518 §4.4). */
    public const string A256KW = 'A256KW' ;

    /**
     * `dir` — Direct use of a shared symmetric key as the Content
     * Encryption Key (RFC 7518 §4.5).
     */
    public const string DIR = 'dir' ;

    /** `ECDH-ES` — ECDH Ephemeral Static key agreement (RFC 7518 §4.6). */
    public const string ECDH_ES = 'ECDH-ES' ;

    /** `ECDH-ES+A128KW` — ECDH-ES + Concat KDF + AES Key Wrap with 128-bit key. */
    public const string ECDH_ES_A128KW = 'ECDH-ES+A128KW' ;

    /** `ECDH-ES+A192KW` — ECDH-ES + Concat KDF + AES Key Wrap with 192-bit key. */
    public const string ECDH_ES_A192KW = 'ECDH-ES+A192KW' ;

    /** `ECDH-ES+A256KW` — ECDH-ES + Concat KDF + AES Key Wrap with 256-bit key. */
    public const string ECDH_ES_A256KW = 'ECDH-ES+A256KW' ;

    /** `A128GCMKW` — Key wrapping with AES GCM using 128-bit key (RFC 7518 §4.7). */
    public const string A128GCMKW = 'A128GCMKW' ;

    /** `A192GCMKW` — Key wrapping with AES GCM using 192-bit key. */
    public const string A192GCMKW = 'A192GCMKW' ;

    /** `A256GCMKW` — Key wrapping with AES GCM using 256-bit key. */
    public const string A256GCMKW = 'A256GCMKW' ;

    /** `PBES2-HS256+A128KW` — PBES2 with HMAC SHA-256 and A128KW (RFC 7518 §4.8). */
    public const string PBES2_HS256_A128KW = 'PBES2-HS256+A128KW' ;

    /** `PBES2-HS384+A192KW` — PBES2 with HMAC SHA-384 and A192KW. */
    public const string PBES2_HS384_A192KW = 'PBES2-HS384+A192KW' ;

    /** `PBES2-HS512+A256KW` — PBES2 with HMAC SHA-512 and A256KW. */
    public const string PBES2_HS512_A256KW = 'PBES2-HS512+A256KW' ;

    // -------------------------------------------------------------------------
    // JWE — Content encryption algorithms (RFC 7518 §5)
    // -------------------------------------------------------------------------

    /** `A128CBC-HS256` — AES-128 CBC with HMAC SHA-256 (RFC 7518 §5.2). */
    public const string A128CBC_HS256 = 'A128CBC-HS256' ;

    /** `A192CBC-HS384` — AES-192 CBC with HMAC SHA-384 (RFC 7518 §5.2). */
    public const string A192CBC_HS384 = 'A192CBC-HS384' ;

    /** `A256CBC-HS512` — AES-256 CBC with HMAC SHA-512 (RFC 7518 §5.2). */
    public const string A256CBC_HS512 = 'A256CBC-HS512' ;

    /** `A128GCM` — AES-128 in Galois/Counter Mode (RFC 7518 §5.3). */
    public const string A128GCM = 'A128GCM' ;

    /** `A192GCM` — AES-192 in Galois/Counter Mode (RFC 7518 §5.3). */
    public const string A192GCM = 'A192GCM' ;

    /** `A256GCM` — AES-256 in Galois/Counter Mode (RFC 7518 §5.3). */
    public const string A256GCM = 'A256GCM' ;
}
