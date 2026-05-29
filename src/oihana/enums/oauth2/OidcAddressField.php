<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of the sub-fields of the OpenID Connect `address` claim.
 *
 * The `address` claim is a JSON object whose members are defined by
 * OIDC Core §5.1.1. These constants standardise the member names so callers
 * reading or building the address object avoid magic strings.
 *
 * Example:
 * ```php
 * $address = $userClaims[ JwtClaim::ADDRESS ] ?? [] ;
 * $city    = $address[ OidcAddressField::LOCALITY ] ?? null ;
 * ```
 *
 * References:
 * - OpenID Connect Core 1.0 §5.1.1 (Address Claim)
 *
 * @see JwtClaim::ADDRESS
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OidcAddressField
{
    use ConstantsTrait ;

    /**
     * `formatted` — Full mailing address, formatted for display or use on a
     * label, newline-separated (OIDC Core §5.1.1).
     */
    public const string FORMATTED = 'formatted' ;

    /**
     * `street_address` — Full street address (house number, street name, etc.),
     * may contain newlines (OIDC Core §5.1.1).
     */
    public const string STREET_ADDRESS = 'street_address' ;

    /**
     * `locality` — City or locality (OIDC Core §5.1.1).
     */
    public const string LOCALITY = 'locality' ;

    /**
     * `region` — State, province, prefecture or region (OIDC Core §5.1.1).
     */
    public const string REGION = 'region' ;

    /**
     * `postal_code` — Zip or postal code (OIDC Core §5.1.1).
     */
    public const string POSTAL_CODE = 'postal_code' ;

    /**
     * `country` — Country name (OIDC Core §5.1.1).
     */
    public const string COUNTRY = 'country' ;
}
