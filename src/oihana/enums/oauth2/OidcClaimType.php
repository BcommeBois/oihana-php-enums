<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OpenID Connect claim types.
 *
 * A claim type describes how a claim's value is conveyed in the UserInfo
 * response or ID Token (OIDC Core §5.6). It is advertised by the provider in
 * the `claim_types_supported` discovery field.
 *
 * Example:
 * ```php
 * if ( in_array( OidcClaimType::DISTRIBUTED , $metadata[ OidcDiscoveryField::CLAIM_TYPES_SUPPORTED ] , true ) )
 * {
 *     // provider can reference claims held by a remote claims provider
 * }
 * ```
 *
 * References:
 * - OpenID Connect Core 1.0 §5.6 (Claim Types)
 *
 * @see OidcDiscoveryField::CLAIM_TYPES_SUPPORTED
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OidcClaimType
{
    use ConstantsTrait ;

    /**
     * `normal` — Claim values are asserted directly by the OpenID Provider,
     * inline in the response (OIDC Core §5.6.1).
     */
    public const string NORMAL = 'normal' ;

    /**
     * `aggregated` — Claim values are asserted by a claims provider and embedded
     * as a self-contained JWT inside the response (OIDC Core §5.6.2).
     */
    public const string AGGREGATED = 'aggregated' ;

    /**
     * `distributed` — Claim values are held by a remote claims provider and
     * referenced by an endpoint plus an access token (OIDC Core §5.6.2).
     */
    public const string DISTRIBUTED = 'distributed' ;
}
