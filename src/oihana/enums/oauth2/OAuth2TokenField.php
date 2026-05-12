<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OIDC token endpoint response fields.
 *
 * These constants are used as keys when decoding a successful token
 * response (RFC 6749 §5.1) or an error response (§5.2).
 *
 * Example:
 * ```php
 * $data = json_decode( $response->getBody()->getContents() , true ) ;
 *
 * $this->accessToken  = $data[ OAuth2TokenField::ACCESS_TOKEN ] ?? null ;
 * $this->tokenExpires = $now + ( $data[ OAuth2TokenField::EXPIRES_IN ] ?? 3600 ) - 60 ;
 * ```
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2TokenField
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Success response (RFC 6749 §5.1)
    // -------------------------------------------------------------------------

    public const string ACCESS_TOKEN  = 'access_token' ;
    public const string TOKEN_TYPE    = 'token_type' ;
    public const string EXPIRES_IN    = 'expires_in' ;
    public const string REFRESH_TOKEN = 'refresh_token' ;
    public const string SCOPE         = 'scope' ;

    // -------------------------------------------------------------------------
    // OpenID Connect
    // -------------------------------------------------------------------------

    public const string ID_TOKEN = 'id_token' ;

    // -------------------------------------------------------------------------
    // Introspection (RFC 7662)
    // -------------------------------------------------------------------------

    public const string ACTIVE     = 'active' ;
    public const string CLIENT_ID  = 'client_id' ;
    public const string USERNAME   = 'username' ;
    public const string SUB        = 'sub' ;
    public const string AUD        = 'aud' ;
    public const string ISS        = 'iss' ;
    public const string EXP        = 'exp' ;
    public const string IAT        = 'iat' ;
    public const string NBF        = 'nbf' ;
    public const string JTI        = 'jti' ;

    // -------------------------------------------------------------------------
    // Error response (RFC 6749 §5.2)
    // -------------------------------------------------------------------------

    public const string ERROR             = 'error' ;
    public const string ERROR_DESCRIPTION = 'error_description' ;
    public const string ERROR_URI         = 'error_uri' ;
}