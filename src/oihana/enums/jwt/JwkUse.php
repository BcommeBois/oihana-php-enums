<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of JSON Web Key public-key use values (the `use` member of a JWK).
 *
 * The `use` parameter declares the intended use of the public key (RFC 7517
 * §4.2). It is advisory and mutually informative with {@see JwkKeyOperation}
 * (`key_ops`); applications should not set both inconsistently.
 *
 * Example:
 * ```php
 * $jwk[ JwkParameter::USE ] = JwkUse::SIG ;
 * ```
 *
 * References:
 * - RFC 7517 §4.2 — `use` values (`sig`, `enc`)
 * - IANA JSON Web Key Use registry
 *
 * @see JwkParameter::USE
 * @see JwkKeyOperation
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwkUse
{
    use ConstantsTrait ;

    /**
     * `sig` — Key is used to verify / produce signatures (RFC 7517 §4.2).
     */
    public const string SIG = 'sig' ;

    /**
     * `enc` — Key is used to encrypt / decrypt content (RFC 7517 §4.2).
     */
    public const string ENC = 'enc' ;
}
