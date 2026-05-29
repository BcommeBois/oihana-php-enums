<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of JSON Web Key operations (entries of the `key_ops` member
 * of a JWK).
 *
 * The `key_ops` parameter is a JSON array listing the operations the key is
 * intended to be used for (RFC 7517 §4.3). It conveys finer-grained intent
 * than {@see JwkUse} (`use`); the two should not be set inconsistently.
 *
 * Example:
 * ```php
 * $jwk[ JwkParameter::KEY_OPS ] = [ JwkKeyOperation::SIGN , JwkKeyOperation::VERIFY ] ;
 * ```
 *
 * References:
 * - RFC 7517 §4.3 — `key_ops` values
 * - IANA JSON Web Key Operations registry
 *
 * @see JwkParameter::KEY_OPS
 * @see JwkUse
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwkKeyOperation
{
    use ConstantsTrait ;

    /**
     * `sign` — Compute a digital signature or MAC (RFC 7517 §4.3).
     */
    public const string SIGN = 'sign' ;

    /**
     * `verify` — Verify a digital signature or MAC (RFC 7517 §4.3).
     */
    public const string VERIFY = 'verify' ;

    /**
     * `encrypt` — Encrypt content (RFC 7517 §4.3).
     */
    public const string ENCRYPT = 'encrypt' ;

    /**
     * `decrypt` — Decrypt content and validate decryption, if applicable (RFC 7517 §4.3).
     */
    public const string DECRYPT = 'decrypt' ;

    /**
     * `wrapKey` — Encrypt a key (RFC 7517 §4.3).
     */
    public const string WRAP_KEY = 'wrapKey' ;

    /**
     * `unwrapKey` — Decrypt a key and validate decryption, if applicable (RFC 7517 §4.3).
     */
    public const string UNWRAP_KEY = 'unwrapKey' ;

    /**
     * `deriveKey` — Derive a key (RFC 7517 §4.3).
     */
    public const string DERIVE_KEY = 'deriveKey' ;

    /**
     * `deriveBits` — Derive bits not to be used as a key (RFC 7517 §4.3).
     */
    public const string DERIVE_BITS = 'deriveBits' ;
}
