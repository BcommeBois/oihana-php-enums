<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 PKCE code challenge methods (RFC 7636).
 *
 * Values used with the {@see OAuth2Parameter::CODE_CHALLENGE_METHOD}
 * parameter when initiating a PKCE-protected authorization code flow.
 *
 * Example:
 * ```php
 * $verifier  = bin2hex( random_bytes( 32 ) ) ;
 * $challenge = rtrim( strtr( base64_encode( hash( 'sha256' , $verifier , true ) ) , '+/' , '-_' ) , '=' ) ;
 *
 * $authUrl = $authorizationEndpoint . '?' . http_build_query
 * ([
 *     OAuth2Parameter::CLIENT_ID             => $clientId ,
 *     OAuth2Parameter::REDIRECT_URI          => $redirectUri ,
 *     OAuth2Parameter::RESPONSE_TYPE         => OAuth2ResponseType::CODE ,
 *     OAuth2Parameter::CODE_CHALLENGE        => $challenge ,
 *     OAuth2Parameter::CODE_CHALLENGE_METHOD => OAuth2CodeChallengeMethod::S256 ,
 * ]) ;
 * ```
 *
 * References:
 * - RFC 7636 §4.2-4.3 (code challenge method)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2CodeChallengeMethod
{
    use ConstantsTrait ;

    /**
     * `plain` — The code challenge is the verbatim code verifier.
     *
     * @deprecated Provides no protection against a passive observer
     *             intercepting the authorization response. RFC 7636
     *             requires servers to support {@see self::S256} and
     *             only allows `plain` for clients that cannot perform
     *             SHA-256. Modern clients MUST use {@see self::S256}.
     */
    public const string PLAIN = 'plain' ;

    /**
     * `S256` — The code challenge is the base64url-encoded SHA-256
     * digest of the code verifier (RFC 7636 §4.2).
     *
     * Required for all PKCE implementations and recommended for every
     * OAuth client by RFC 9700 (Security BCP).
     */
    public const string S256 = 'S256' ;
}
