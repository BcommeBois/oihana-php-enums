<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OIDC access token types and Token
 * Exchange token type identifiers.
 *
 * Two distinct registries are exposed here:
 *
 * 1. **HTTP token types** — values returned in the
 *    {@see OAuth2TokenField::TOKEN_TYPE} field of a successful token
 *    response and used in the `Authorization` HTTP header scheme:
 *    {@see self::BEARER}, {@see self::DPOP}, {@see self::MAC}.
 *
 * 2. **Token Exchange URIs** (RFC 8693 §3) — values used in the
 *    `subject_token_type`, `actor_token_type`, `requested_token_type`,
 *    and `issued_token_type` parameters of a Token Exchange request or
 *    response.
 *
 * Example (Bearer):
 * ```php
 * $client = new Client( [ 'headers' =>
 * [
 *     'Authorization' => OAuth2TokenType::BEARER . ' ' . $accessToken ,
 * ]]) ;
 * ```
 *
 * Example (Token Exchange):
 * ```php
 * $params =
 * [
 *     OAuth2Parameter::GRANT_TYPE          => OAuth2GrantType::TOKEN_EXCHANGE ,
 *     OAuth2Parameter::SUBJECT_TOKEN       => $userToken ,
 *     'subject_token_type'                 => OAuth2TokenType::URI_ACCESS_TOKEN ,
 *     'requested_token_type'               => OAuth2TokenType::URI_ACCESS_TOKEN ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 6749  §5.1 (token_type)
 * - RFC 6750  (Bearer)
 * - RFC 8693  §3 (Token Exchange token type identifiers)
 * - RFC 9449  (DPoP)
 * - draft-ietf-oauth-v2-http-mac (MAC, expired)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2TokenType
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // HTTP token types
    // -------------------------------------------------------------------------

    /**
     * `Bearer` — Bearer token (RFC 6750).
     *
     * Any party in possession of the token can use it. By far the most
     * common token type. Sent in the `Authorization: Bearer <token>`
     * HTTP header.
     *
     * Value is case-insensitive on the wire (RFC 6749 §5.1) but the
     * canonical form is `Bearer`.
     */
    public const string BEARER = 'Bearer' ;

    /**
     * `DPoP` — Demonstrating Proof-of-Possession at the Application
     * Layer (RFC 9449).
     *
     * Sender-constrained access token tied to a client-held key. Each
     * request must carry a fresh DPoP proof JWT in the `DPoP` header
     * alongside `Authorization: DPoP <token>`.
     */
    public const string DPOP = 'DPoP' ;

    /**
     * `MAC` — Message Authentication Code token type.
     *
     * @deprecated The MAC token type IETF draft has expired and is not
     *             a published RFC. Exposed only for completeness;
     *             prefer {@see self::DPOP} for sender-constrained
     *             tokens.
     */
    public const string MAC = 'MAC' ;

    /**
     * `N_A` — Returned by Token Exchange (RFC 8693) when the issued
     * token is not directly usable as a bearer-style access token
     * (e.g. a SAML assertion).
     */
    public const string N_A = 'N_A' ;

    // -------------------------------------------------------------------------
    // Token Exchange URIs (RFC 8693 §3)
    // -------------------------------------------------------------------------

    /**
     * `urn:ietf:params:oauth:token-type:access_token` — Indicates that
     * the token is an OAuth 2.0 access token (RFC 8693 §3).
     */
    public const string URI_ACCESS_TOKEN = 'urn:ietf:params:oauth:token-type:access_token' ;

    /**
     * `urn:ietf:params:oauth:token-type:refresh_token` — Indicates that
     * the token is an OAuth 2.0 refresh token (RFC 8693 §3).
     */
    public const string URI_REFRESH_TOKEN = 'urn:ietf:params:oauth:token-type:refresh_token' ;

    /**
     * `urn:ietf:params:oauth:token-type:id_token` — Indicates that the
     * token is an OIDC ID Token (RFC 8693 §3).
     */
    public const string URI_ID_TOKEN = 'urn:ietf:params:oauth:token-type:id_token' ;

    /**
     * `urn:ietf:params:oauth:token-type:saml1` — Indicates that the
     * token is a base64url-encoded SAML 1.1 assertion (RFC 8693 §3).
     */
    public const string URI_SAML1 = 'urn:ietf:params:oauth:token-type:saml1' ;

    /**
     * `urn:ietf:params:oauth:token-type:saml2` — Indicates that the
     * token is a base64url-encoded SAML 2.0 assertion (RFC 8693 §3).
     */
    public const string URI_SAML2 = 'urn:ietf:params:oauth:token-type:saml2' ;

    /**
     * `urn:ietf:params:oauth:token-type:jwt` — Indicates that the token
     * is a JWT (RFC 7519). Often used as a generic JWT subject token
     * in Token Exchange (RFC 8693 §3).
     */
    public const string URI_JWT = 'urn:ietf:params:oauth:token-type:jwt' ;
}
