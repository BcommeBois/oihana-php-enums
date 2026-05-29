<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OpenID Connect Subject Identifier types.
 *
 * A subject type controls how the `sub` claim is computed for a relying party
 * (OIDC Core §8). It appears in the `subject_types_supported` discovery field
 * and in the `subject_type` client registration metadata.
 *
 * Example:
 * ```php
 * if ( in_array( OAuth2SubjectType::PAIRWISE , $metadata[ OidcDiscoveryField::SUBJECT_TYPES_SUPPORTED ] , true ) )
 * {
 *     // provider can issue per-client pseudonymous subject identifiers
 * }
 * ```
 *
 * References:
 * - OpenID Connect Core 1.0 §8 (Subject Identifier Types)
 *
 * @see OidcDiscoveryField::SUBJECT_TYPES_SUPPORTED
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2SubjectType
{
    use ConstantsTrait ;

    /**
     * `public` — The same `sub` value is returned to all clients (OIDC Core §8).
     */
    public const string PUBLIC = 'public' ;

    /**
     * `pairwise` — A different, pseudonymous `sub` value is returned to each
     * client (or sector), so identifiers cannot be correlated across clients
     * (OIDC Core §8).
     */
    public const string PAIRWISE = 'pairwise' ;
}
