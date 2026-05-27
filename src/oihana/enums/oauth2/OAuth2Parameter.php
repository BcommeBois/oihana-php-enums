<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OpenID Connect request parameter names.
 *
 * Centralises the standard parameter names used as keys when building
 * authorization, token, introspection, revocation, device, exchange,
 * pushed authorization or logout requests.
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
 * Covered specifications:
 * - RFC 6749  (OAuth 2.0 core)
 * - RFC 7009  (Token Revocation)
 * - RFC 7522  (SAML 2.0 Bearer assertion)
 * - RFC 7523  (JWT Bearer assertion)
 * - RFC 7636  (PKCE)
 * - RFC 7662  (Token Introspection)
 * - RFC 8628  (Device Authorization Grant)
 * - RFC 8693  (Token Exchange)
 * - RFC 8707  (Resource Indicators)
 * - RFC 9126  (Pushed Authorization Requests — PAR)
 * - RFC 9396  (Rich Authorization Requests — RAR)
 * - RFC 9449  (Demonstrating Proof of Possession — DPoP)
 * - OpenID Connect Core 1.0
 * - OpenID Connect RP-Initiated Logout 1.0
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
    public const string REDIRECT_URI  = 'redirect_uri' ;
    public const string RESPONSE_TYPE = 'response_type' ;
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

    public const string CLIENT_SECRET = 'client_secret' ;
    public const string CODE          = 'code' ;
    public const string GRANT_TYPE    = 'grant_type' ;
    public const string PASSWORD      = 'password' ;
    public const string REFRESH_TOKEN = 'refresh_token' ;
    public const string USERNAME      = 'username' ;

    // -------------------------------------------------------------------------
    // JWT Bearer / SAML (RFC 7523, RFC 7522)
    // -------------------------------------------------------------------------

    public const string ASSERTION             = 'assertion' ;
    public const string CLIENT_ASSERTION      = 'client_assertion' ;
    public const string CLIENT_ASSERTION_TYPE = 'client_assertion_type' ;

    // -------------------------------------------------------------------------
    // Introspection / revocation (RFC 7662, RFC 7009)
    // -------------------------------------------------------------------------

    public const string TOKEN           = 'token' ;
    public const string TOKEN_TYPE_HINT = 'token_type_hint' ;

    // -------------------------------------------------------------------------
    // OpenID Connect (OIDC Core 1.0)
    // -------------------------------------------------------------------------

    public const string ACR_VALUES     = 'acr_values' ;
    public const string CLAIMS         = 'claims' ;
    public const string CLAIMS_LOCALES = 'claims_locales' ;
    public const string DISPLAY        = 'display' ;
    public const string ID_TOKEN_HINT  = 'id_token_hint' ;
    public const string LOGIN_HINT     = 'login_hint' ;
    public const string MAX_AGE        = 'max_age' ;
    public const string NONCE          = 'nonce' ;
    public const string PROMPT         = 'prompt' ;
    public const string REGISTRATION   = 'registration' ;
    public const string REQUEST        = 'request' ;
    public const string REQUEST_URI    = 'request_uri' ;
    public const string RESPONSE_MODE  = 'response_mode' ;
    public const string UI_LOCALES     = 'ui_locales' ;

    // -------------------------------------------------------------------------
    // OIDC RP-Initiated Logout 1.0
    // -------------------------------------------------------------------------

    public const string LOGOUT_HINT              = 'logout_hint' ;
    public const string POST_LOGOUT_REDIRECT_URI = 'post_logout_redirect_uri' ;

    // -------------------------------------------------------------------------
    // Device Authorization Grant (RFC 8628)
    // -------------------------------------------------------------------------

    public const string DEVICE_CODE = 'device_code' ;
    public const string USER_CODE   = 'user_code' ;

    // -------------------------------------------------------------------------
    // Token Exchange (RFC 8693)
    // -------------------------------------------------------------------------

    public const string ACTOR_TOKEN          = 'actor_token' ;
    public const string ACTOR_TOKEN_TYPE     = 'actor_token_type' ;
    public const string AUDIENCE             = 'audience' ;
    public const string REQUESTED_TOKEN_TYPE = 'requested_token_type' ;
    public const string SUBJECT_TOKEN        = 'subject_token' ;
    public const string SUBJECT_TOKEN_TYPE   = 'subject_token_type' ;

    // -------------------------------------------------------------------------
    // Resource Indicators (RFC 8707)
    // -------------------------------------------------------------------------

    public const string RESOURCE = 'resource' ;

    // -------------------------------------------------------------------------
    // DPoP (RFC 9449)
    // -------------------------------------------------------------------------

    public const string DPOP_JKT = 'dpop_jkt' ;

    // -------------------------------------------------------------------------
    // Rich Authorization Requests (RFC 9396)
    // -------------------------------------------------------------------------

    public const string AUTHORIZATION_DETAILS = 'authorization_details' ;
}
