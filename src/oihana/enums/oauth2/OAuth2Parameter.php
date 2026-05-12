<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OIDC request parameter names.
 *
 * Covers the standard parameter names defined by RFC 6749 (OAuth 2.0),
 * RFC 7523 (JWT Bearer assertion), RFC 7636 (PKCE), and OpenID Connect Core 1.0.
 *
 * These constants are used as keys when building token, authorization,
 * introspection, or revocation requests.
 *
 * Example:
 * ```php
 * $response = $client->post( $tokenEndpoint ,
 * [
 *     GuzzleOption::FORM_PARAMS =>
 *     [
 *         OAuth2Parameter::GRANT_TYPE => ZitadelGrant::JWT_BEARER ,
 *         OAuth2Parameter::SCOPE      => ZitadelScope::OPENID ,
 *         OAuth2Parameter::ASSERTION  => $assertion ,
 *     ]
 * ]) ;
 * ```
 *
 * References:
 * - RFC 6749  (OAuth 2.0 core)
 * - RFC 7523  (JWT Bearer assertion)
 * - RFC 7636  (PKCE)
 * - RFC 7662  (Token Introspection)
 * - RFC 7009  (Token Revocation)
 * - OIDC Core 1.0
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2Parameter
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Authorization request (RFC 6749 §4.1.1)
    // -------------------------------------------------------------------------

    public const string CLIENT_ID     = 'client_id' ;
    public const string RESPONSE_TYPE = 'response_type' ;
    public const string REDIRECT_URI  = 'redirect_uri' ;
    public const string SCOPE         = 'scope' ;
    public const string STATE         = 'state' ;

    // -------------------------------------------------------------------------
    // PKCE (RFC 7636)
    // -------------------------------------------------------------------------

    public const string CODE_CHALLENGE        = 'code_challenge' ;
    public const string CODE_CHALLENGE_METHOD = 'code_challenge_method' ;
    public const string CODE_VERIFIER         = 'code_verifier' ;

    // -------------------------------------------------------------------------
    // Token request (RFC 6749 §4)
    // -------------------------------------------------------------------------

    public const string GRANT_TYPE    = 'grant_type' ;
    public const string CODE          = 'code' ;
    public const string CLIENT_SECRET = 'client_secret' ;
    public const string REFRESH_TOKEN = 'refresh_token' ;
    public const string USERNAME      = 'username' ;
    public const string PASSWORD      = 'password' ;

    // -------------------------------------------------------------------------
    // JWT Bearer / SAML (RFC 7523, RFC 7522)
    // -------------------------------------------------------------------------

    public const string ASSERTION             = 'assertion' ;
    public const string CLIENT_ASSERTION      = 'client_assertion' ;
    public const string CLIENT_ASSERTION_TYPE = 'client_assertion_type' ;

    // -------------------------------------------------------------------------
    // Introspection / revocation (RFC 7662, RFC 7009)
    // -------------------------------------------------------------------------

    public const string TOKEN               = 'token' ;
    public const string TOKEN_TYPE_HINT     = 'token_type_hint' ;

    // -------------------------------------------------------------------------
    // OpenID Connect
    // -------------------------------------------------------------------------

    public const string NONCE         = 'nonce' ;
    public const string PROMPT        = 'prompt' ;
    public const string MAX_AGE       = 'max_age' ;
    public const string ID_TOKEN_HINT = 'id_token_hint' ;
    public const string LOGIN_HINT    = 'login_hint' ;
    public const string ACR_VALUES    = 'acr_values' ;
    public const string AUDIENCE      = 'audience' ;
    public const string RESOURCE      = 'resource' ;
}