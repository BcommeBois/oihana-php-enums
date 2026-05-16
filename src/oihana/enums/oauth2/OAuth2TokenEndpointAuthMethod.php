<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard client authentication methods at the OAuth 2.0
 * token endpoint (and other authenticated endpoints).
 *
 * Values used in the `token_endpoint_auth_method` metadata of a client
 * registered via RFC 7591 / RFC 7592, and advertised by the
 * authorization server in
 * {@see OidcDiscoveryField::TOKEN_ENDPOINT_AUTH_METHODS_SUPPORTED}.
 *
 * Example (private_key_jwt):
 * ```php
 * $assertion = $jwtSigner->sign( [
 *     JwtClaim::ISS => $clientId ,
 *     JwtClaim::SUB => $clientId ,
 *     JwtClaim::AUD => $tokenEndpoint ,
 *     JwtClaim::IAT => time() ,
 *     JwtClaim::EXP => time() + 300 ,
 *     JwtClaim::JTI => bin2hex( random_bytes( 16 ) ) ,
 * ] ) ;
 *
 * $client->post( $tokenEndpoint ,
 * [
 *     GuzzleOption::FORM_PARAMS =>
 *     [
 *         OAuth2Parameter::GRANT_TYPE            => OAuth2GrantType::CLIENT_CREDENTIALS ,
 *         OAuth2Parameter::CLIENT_ASSERTION_TYPE => OAuth2ClientAssertionType::JWT_BEARER ,
 *         OAuth2Parameter::CLIENT_ASSERTION      => $assertion ,
 *     ]
 * ]) ;
 * ```
 *
 * References:
 * - OIDC Core 1.0 §9 (Client Authentication)
 * - RFC 7591  §2 (Dynamic Client Registration metadata)
 * - RFC 7521 / RFC 7523 (assertion-based client authentication)
 * - RFC 8705  (mTLS client authentication)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2TokenEndpointAuthMethod
{
    use ConstantsTrait ;

    /**
     * `client_secret_basic` — HTTP Basic authentication with
     * `client_id:client_secret` credentials (RFC 6749 §2.3.1).
     *
     * Default method when none is specified for confidential clients.
     */
    public const string CLIENT_SECRET_BASIC = 'client_secret_basic' ;

    /**
     * `client_secret_post` — Client credentials sent in the request
     * body as `client_id` and `client_secret` (RFC 6749 §2.3.1).
     */
    public const string CLIENT_SECRET_POST = 'client_secret_post' ;

    /**
     * `client_secret_jwt` — The client authenticates by signing a JWT
     * with its `client_secret` using HMAC (HS256/HS384/HS512)
     * (OIDC Core §9, RFC 7523).
     */
    public const string CLIENT_SECRET_JWT = 'client_secret_jwt' ;

    /**
     * `private_key_jwt` — The client authenticates by signing a JWT
     * with its private key (RS256/PS256/ES256, ...) registered with
     * the authorization server (OIDC Core §9, RFC 7523).
     */
    public const string PRIVATE_KEY_JWT = 'private_key_jwt' ;

    /**
     * `none` — The client is public and does not authenticate at the
     * token endpoint (OIDC Core §9). Typically combined with PKCE.
     */
    public const string NONE = 'none' ;

    /**
     * `tls_client_auth` — The client authenticates using a PKI-issued
     * X.509 client certificate over mutual TLS (RFC 8705 §2.1).
     */
    public const string TLS_CLIENT_AUTH = 'tls_client_auth' ;

    /**
     * `self_signed_tls_client_auth` — The client authenticates using a
     * self-signed X.509 certificate over mutual TLS, with the public
     * key registered out-of-band (RFC 8705 §2.2).
     */
    public const string SELF_SIGNED_TLS_CLIENT_AUTH = 'self_signed_tls_client_auth' ;
}
