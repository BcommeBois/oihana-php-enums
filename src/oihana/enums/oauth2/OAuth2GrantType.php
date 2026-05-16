<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OIDC grant type identifiers.
 *
 * Values used with the `grant_type` parameter of a token endpoint request
 * (see {@see OAuth2Parameter::GRANT_TYPE}).
 *
 * Covers the core flows defined by RFC 6749, the IETF extension grants
 * (JWT Bearer, SAML 2.0 Bearer, Device Code, Token Exchange), the UMA 2.0
 * grant, and the OpenID Connect CIBA grant.
 *
 * Some flows defined by RFC 6749 (Resource Owner Password Credentials and
 * Implicit) are now considered insecure and are deprecated by the OAuth 2.1
 * draft and the OAuth 2.0 Security Best Current Practice (RFC 9700). They
 * are still exposed here for interoperability with legacy systems.
 *
 * Example:
 * ```php
 * $response = $client->post( $tokenEndpoint ,
 * [
 *     GuzzleOption::FORM_PARAMS =>
 *     [
 *         OAuth2Parameter::GRANT_TYPE    => OAuth2GrantType::CLIENT_CREDENTIALS ,
 *         OAuth2Parameter::CLIENT_ID     => $clientId ,
 *         OAuth2Parameter::CLIENT_SECRET => $clientSecret ,
 *         OAuth2Parameter::SCOPE         => 'openid profile' ,
 *     ]
 * ]) ;
 * ```
 *
 * References:
 * - RFC 6749  — OAuth 2.0 core
 * - RFC 7522  — SAML 2.0 Bearer assertion
 * - RFC 7523  — JWT Bearer assertion
 * - RFC 8628  — OAuth 2.0 Device Authorization Grant
 * - RFC 8693  — OAuth 2.0 Token Exchange
 * - RFC 9700  — OAuth 2.0 Security Best Current Practice
 * - UMA 2.0 Grant for OAuth 2.0 Authorization (Kantara)
 * - OpenID Connect CIBA Core 1.0
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2GrantType
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Core grants (RFC 6749)
    // -------------------------------------------------------------------------

    /**
     * `authorization_code` — Authorization Code grant (RFC 6749 §4.1).
     *
     * Used by confidential and public clients to exchange an authorization
     * code (obtained at the authorization endpoint) for an access token
     * and, optionally, a refresh token.
     *
     * Should be combined with PKCE (RFC 7636) for any public client, and
     * is recommended for confidential clients as well by the OAuth 2.0
     * Security BCP (RFC 9700).
     */
    public const string AUTHORIZATION_CODE = 'authorization_code' ;

    /**
     * `client_credentials` — Client Credentials grant (RFC 6749 §4.4).
     *
     * Used by a confidential client to obtain an access token in its own
     * name, without any user context. Typically used for machine-to-machine
     * (M2M) communication and backend services.
     */
    public const string CLIENT_CREDENTIALS = 'client_credentials' ;

    /**
     * `refresh_token` — Refresh Token grant (RFC 6749 §6).
     *
     * Used to obtain a new access token (and optionally a new refresh
     * token) from a previously issued refresh token, without requiring
     * the resource owner to re-authenticate.
     */
    public const string REFRESH_TOKEN = 'refresh_token' ;

    /**
     * `password` — Resource Owner Password Credentials grant (RFC 6749 §4.3).
     *
     * Allows a client to obtain tokens by directly providing the user's
     * username and password to the token endpoint.
     *
     * @deprecated Disallowed by OAuth 2.1 and RFC 9700 (Security BCP).
     *             Exposes user credentials to the client and prevents
     *             multi-factor authentication. Kept for legacy
     *             interoperability only; prefer
     *             {@see self::AUTHORIZATION_CODE} with PKCE.
     */
    public const string PASSWORD = 'password' ;

    /**
     * `implicit` — Implicit grant (RFC 6749 §4.2).
     *
     * Historically used by browser-based public clients to obtain an
     * access token directly from the authorization endpoint (no token
     * endpoint exchange).
     *
     * @deprecated Removed by OAuth 2.1 and disallowed by RFC 9700
     *             (Security BCP) because of access-token leakage via
     *             redirect URIs and browser history. Use
     *             {@see self::AUTHORIZATION_CODE} with PKCE instead.
     */
    public const string IMPLICIT = 'implicit' ;

    // -------------------------------------------------------------------------
    // Extension grants (IETF URN namespace)
    // -------------------------------------------------------------------------

    /**
     * `urn:ietf:params:oauth:grant-type:jwt-bearer` — JWT Bearer assertion
     * grant (RFC 7523).
     *
     * Lets a client obtain an access token by presenting a signed JWT as
     * an authorization grant or as a client credential.
     *
     * Common use cases:
     * - service account authentication (e.g. Google, Zitadel, Auth0
     *   Machine-to-Machine with private key JWT),
     * - on-behalf-of style delegation when combined with
     *   {@see self::TOKEN_EXCHANGE}.
     */
    public const string JWT_BEARER = 'urn:ietf:params:oauth:grant-type:jwt-bearer' ;

    /**
     * `urn:ietf:params:oauth:grant-type:saml2-bearer` — SAML 2.0 Bearer
     * assertion grant (RFC 7522).
     *
     * Lets a client obtain an access token by presenting a SAML 2.0
     * assertion as an authorization grant. Used to bridge SAML-based
     * identity providers with OAuth 2.0 protected APIs.
     */
    public const string SAML2_BEARER = 'urn:ietf:params:oauth:grant-type:saml2-bearer' ;

    /**
     * `urn:ietf:params:oauth:grant-type:device_code` — Device Authorization
     * grant (RFC 8628).
     *
     * Designed for input-constrained devices (smart TVs, IoT, CLIs) that
     * cannot easily display a browser. The device polls the token
     * endpoint with the `device_code` until the user has authorized the
     * request on a secondary device.
     */
    public const string DEVICE_CODE = 'urn:ietf:params:oauth:grant-type:device_code' ;

    /**
     * `urn:ietf:params:oauth:grant-type:token-exchange` — Token Exchange
     * (RFC 8693).
     *
     * Lets a client exchange a security token (access token, ID token,
     * SAML assertion, ...) for another security token, typically with a
     * different audience, scope, or subject.
     *
     * Foundation for delegation, impersonation, and "on-behalf-of"
     * scenarios across trust domains.
     */
    public const string TOKEN_EXCHANGE = 'urn:ietf:params:oauth:grant-type:token-exchange' ;

    /**
     * `urn:ietf:params:oauth:grant-type:uma-ticket` — UMA 2.0 grant
     * (User-Managed Access, Kantara Initiative).
     *
     * Used by a requesting party client to exchange a permission ticket
     * (issued by an UMA-protected resource server) and, optionally, a
     * claims token, for an UMA Requesting Party Token (RPT) at the
     * authorization server.
     */
    public const string UMA_TICKET = 'urn:ietf:params:oauth:grant-type:uma-ticket' ;

    // -------------------------------------------------------------------------
    // OpenID Connect
    // -------------------------------------------------------------------------

    /**
     * `urn:openid:params:grant-type:ciba` — Client-Initiated Backchannel
     * Authentication grant (OpenID Connect CIBA Core 1.0).
     *
     * Decoupled authentication flow: the client initiates an
     * authentication request at the backchannel authentication endpoint,
     * the user approves it on an authentication device (e.g. mobile app),
     * and the client retrieves tokens from the token endpoint using this
     * grant type with the returned `auth_req_id`.
     */
    public const string CIBA = 'urn:openid:params:grant-type:ciba' ;
}
