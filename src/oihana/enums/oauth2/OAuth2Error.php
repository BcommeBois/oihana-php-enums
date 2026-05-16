<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard OAuth 2.0 / OIDC error codes.
 *
 * Values used in the `error` field of an OAuth 2.0 error response
 * (see {@see OAuth2TokenField::ERROR}) returned by the authorization
 * endpoint (RFC 6749 §4.1.2.1) or the token endpoint (§5.2), plus the
 * additional codes defined by OpenID Connect Core 1.0, RFC 8628
 * (Device Flow), RFC 8707 (Resource Indicators), and RFC 9449 (DPoP).
 *
 * Some codes appear in several specifications with the same wire value
 * (e.g. `invalid_request`, `access_denied`) and are therefore exposed
 * only once.
 *
 * Example:
 * ```php
 * $data = json_decode( $response->getBody()->getContents() , true ) ;
 *
 * if ( ( $data[ OAuth2TokenField::ERROR ] ?? null ) === OAuth2Error::INVALID_GRANT )
 * {
 *     // Refresh token expired or revoked — force re-authentication.
 * }
 * ```
 *
 * References:
 * - RFC 6749  §4.1.2.1 (authorization endpoint), §5.2 (token endpoint)
 * - RFC 8628  §3.5 (Device Authorization Grant)
 * - RFC 8707  §2 (Resource Indicators)
 * - RFC 9449  §7-8 (DPoP)
 * - OIDC Core 1.0 §3.1.2.6
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2Error
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Authorization endpoint errors (RFC 6749 §4.1.2.1)
    // -------------------------------------------------------------------------

    /**
     * `invalid_request` — The request is missing a required parameter,
     * includes an invalid parameter value, includes a parameter more
     * than once, or is otherwise malformed.
     *
     * Defined by RFC 6749 §4.1.2.1 (authorization endpoint) and §5.2
     * (token endpoint). Also re-used by OIDC and most OAuth extensions.
     */
    public const string INVALID_REQUEST = 'invalid_request' ;

    /**
     * `unauthorized_client` — The client is not authorized to request an
     * authorization code (or token) using the requested method.
     */
    public const string UNAUTHORIZED_CLIENT = 'unauthorized_client' ;

    /**
     * `access_denied` — The resource owner or authorization server
     * denied the request.
     */
    public const string ACCESS_DENIED = 'access_denied' ;

    /**
     * `unsupported_response_type` — The authorization server does not
     * support obtaining an authorization code using this method.
     */
    public const string UNSUPPORTED_RESPONSE_TYPE = 'unsupported_response_type' ;

    /**
     * `invalid_scope` — The requested scope is invalid, unknown, or
     * malformed.
     */
    public const string INVALID_SCOPE = 'invalid_scope' ;

    /**
     * `server_error` — The authorization server encountered an
     * unexpected condition that prevented it from fulfilling the request.
     *
     * Used because a 500 HTTP status code cannot be returned to the
     * client via an HTTP redirect.
     */
    public const string SERVER_ERROR = 'server_error' ;

    /**
     * `temporarily_unavailable` — The authorization server is currently
     * unable to handle the request due to a temporary overloading or
     * maintenance of the server.
     */
    public const string TEMPORARILY_UNAVAILABLE = 'temporarily_unavailable' ;

    // -------------------------------------------------------------------------
    // Token endpoint errors (RFC 6749 §5.2)
    // -------------------------------------------------------------------------

    /**
     * `invalid_client` — Client authentication failed (e.g. unknown
     * client, no client authentication included, or unsupported
     * authentication method).
     */
    public const string INVALID_CLIENT = 'invalid_client' ;

    /**
     * `invalid_grant` — The provided authorization grant
     * (e.g. authorization code, resource owner credentials) or refresh
     * token is invalid, expired, revoked, does not match the redirection
     * URI used in the authorization request, or was issued to another
     * client.
     */
    public const string INVALID_GRANT = 'invalid_grant' ;

    /**
     * `unsupported_grant_type` — The authorization grant type is not
     * supported by the authorization server.
     */
    public const string UNSUPPORTED_GRANT_TYPE = 'unsupported_grant_type' ;

    // -------------------------------------------------------------------------
    // OpenID Connect Core 1.0 (§3.1.2.6)
    // -------------------------------------------------------------------------

    /**
     * `interaction_required` — The authorization server requires
     * end-user interaction of some form to proceed. Returned when
     * `prompt=none` was used but user interaction is needed.
     */
    public const string INTERACTION_REQUIRED = 'interaction_required' ;

    /**
     * `login_required` — The authorization server requires end-user
     * authentication. Returned when `prompt=none` was used but no
     * end-user is currently authenticated.
     */
    public const string LOGIN_REQUIRED = 'login_required' ;

    /**
     * `account_selection_required` — The end-user is required to select
     * a session at the authorization server.
     */
    public const string ACCOUNT_SELECTION_REQUIRED = 'account_selection_required' ;

    /**
     * `consent_required` — The authorization server requires end-user
     * consent. Returned when `prompt=none` was used but consent is
     * needed.
     */
    public const string CONSENT_REQUIRED = 'consent_required' ;

    /**
     * `invalid_request_uri` — The `request_uri` in the authorization
     * request returns an error or contains invalid data.
     */
    public const string INVALID_REQUEST_URI = 'invalid_request_uri' ;

    /**
     * `invalid_request_object` — The request parameter contains an
     * invalid Request Object.
     */
    public const string INVALID_REQUEST_OBJECT = 'invalid_request_object' ;

    /**
     * `request_not_supported` — The authorization server does not
     * support use of the `request` parameter.
     */
    public const string REQUEST_NOT_SUPPORTED = 'request_not_supported' ;

    /**
     * `request_uri_not_supported` — The authorization server does not
     * support use of the `request_uri` parameter.
     */
    public const string REQUEST_URI_NOT_SUPPORTED = 'request_uri_not_supported' ;

    /**
     * `registration_not_supported` — The authorization server does not
     * support use of the `registration` parameter.
     */
    public const string REGISTRATION_NOT_SUPPORTED = 'registration_not_supported' ;

    // -------------------------------------------------------------------------
    // Device Authorization Grant (RFC 8628 §3.5)
    // -------------------------------------------------------------------------

    /**
     * `authorization_pending` — The user has not yet completed the
     * authorization step at the verification URI. The client should
     * continue polling using the same `interval`.
     */
    public const string AUTHORIZATION_PENDING = 'authorization_pending' ;

    /**
     * `slow_down` — Polling is happening too frequently. The client
     * MUST increase its polling interval by 5 seconds.
     */
    public const string SLOW_DOWN = 'slow_down' ;

    /**
     * `expired_token` — The `device_code` has expired and the device
     * authorization session has concluded. The client MAY commence a
     * new device authorization request.
     */
    public const string EXPIRED_TOKEN = 'expired_token' ;

    // -------------------------------------------------------------------------
    // Resource Indicators (RFC 8707)
    // -------------------------------------------------------------------------

    /**
     * `invalid_target` — The requested resource is invalid, missing,
     * unknown, or malformed.
     */
    public const string INVALID_TARGET = 'invalid_target' ;

    // -------------------------------------------------------------------------
    // DPoP (RFC 9449)
    // -------------------------------------------------------------------------

    /**
     * `invalid_dpop_proof` — The DPoP proof JWT supplied by the client
     * is invalid (signature, claims, binding...).
     */
    public const string INVALID_DPOP_PROOF = 'invalid_dpop_proof' ;

    /**
     * `use_dpop_nonce` — The authorization server (or resource server)
     * requires the client to include a fresh server-issued `nonce` in
     * its DPoP proof.
     */
    public const string USE_DPOP_NONCE = 'use_dpop_nonce' ;
}
