<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard OAuth 2.0 / OIDC `response_type` values.
 *
 * Values used with the `response_type` parameter of an authorization
 * request (see {@see OAuth2Parameter::RESPONSE_TYPE}) to indicate the
 * flow to follow at the authorization endpoint.
 *
 * The single values {@see self::CODE} and {@see self::TOKEN} come from
 * RFC 6749. OIDC Core §3 introduces {@see self::ID_TOKEN}, the
 * `response_type=none` extension, and the three hybrid combinations
 * used by the OIDC Hybrid Flow.
 *
 * For combined values, the order of the space-separated tokens is not
 * significant on the wire, but this enum uses the canonical ordering
 * from OIDC Core §3.3.
 *
 * Example:
 * ```php
 * $authUrl = $authorizationEndpoint . '?' . http_build_query
 * ([
 *     OAuth2Parameter::CLIENT_ID     => $clientId ,
 *     OAuth2Parameter::REDIRECT_URI  => $redirectUri ,
 *     OAuth2Parameter::RESPONSE_TYPE => OAuth2ResponseType::CODE ,
 *     OAuth2Parameter::SCOPE         => OidcScope::OPENID ,
 *     OAuth2Parameter::STATE         => $state ,
 * ]) ;
 * ```
 *
 * References:
 * - RFC 6749  §3.1.1 (Response Type)
 * - OIDC Core 1.0 §3 (Authentication: Code / Implicit / Hybrid flows)
 * - OIDC Core 1.0 §3.1.2.1, §3.2.2.1, §3.3.2.1
 * - OAuth 2.0 Multiple Response Type Encoding Practices (`none`)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2ResponseType
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Core (RFC 6749)
    // -------------------------------------------------------------------------

    /**
     * `code` — Authorization Code flow (RFC 6749 §4.1).
     *
     * The authorization endpoint returns an authorization code that the
     * client subsequently exchanges for tokens at the token endpoint.
     * Recommended flow for all client types when combined with PKCE.
     */
    public const string CODE = 'code' ;

    /**
     * `token` — Implicit flow (RFC 6749 §4.2).
     *
     * The authorization endpoint returns an access token directly in the
     * URL fragment.
     *
     * @deprecated Disallowed by OAuth 2.1 and RFC 9700 (Security BCP).
     *             Use {@see self::CODE} with PKCE instead.
     */
    public const string TOKEN = 'token' ;

    // -------------------------------------------------------------------------
    // OpenID Connect (Core §3)
    // -------------------------------------------------------------------------

    /**
     * `id_token` — OIDC Implicit flow returning only an ID Token
     * (OIDC Core §3.2).
     */
    public const string ID_TOKEN = 'id_token' ;

    /**
     * `none` — Indicates that no token should be returned from the
     * authorization endpoint. Used in OIDC for clients that only need
     * to confirm the user is logged in.
     *
     * Defined by "OAuth 2.0 Multiple Response Type Encoding Practices".
     */
    public const string NONE = 'none' ;

    // -------------------------------------------------------------------------
    // OIDC Hybrid Flow (Core §3.3)
    // -------------------------------------------------------------------------

    /**
     * `code id_token` — OIDC Hybrid flow: authorization endpoint
     * returns both an authorization code and an ID Token.
     */
    public const string CODE_ID_TOKEN = 'code id_token' ;

    /**
     * `code token` — OIDC Hybrid flow: authorization endpoint returns
     * both an authorization code and an access token.
     */
    public const string CODE_TOKEN = 'code token' ;

    /**
     * `id_token token` — OIDC Implicit flow returning both an ID Token
     * and an access token (OIDC Core §3.2).
     *
     * @deprecated Like {@see self::TOKEN}, the implicit flow is
     *             discouraged by RFC 9700.
     */
    public const string ID_TOKEN_TOKEN = 'id_token token' ;

    /**
     * `code id_token token` — OIDC Hybrid flow: authorization endpoint
     * returns an authorization code, an ID Token, and an access token.
     */
    public const string CODE_ID_TOKEN_TOKEN = 'code id_token token' ;
}
