<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 `token_type_hint` values.
 *
 * The `token_type_hint` parameter lets a client tell the server which kind of
 * token it is submitting to the introspection (RFC 7662) or revocation
 * (RFC 7009) endpoint, allowing the server to optimise its lookup. The hint is
 * advisory: the server must still handle a token of another type.
 *
 * These are the values of the IANA "OAuth Token Type Hints" registry. Note
 * that `id_token` is NOT a valid hint — an ID Token is validated by the client
 * and never submitted to the introspection / revocation endpoints. The
 * Token Exchange `id_token` *type URI* is a different parameter; see
 * {@see OAuth2TokenType::URI_ID_TOKEN}.
 *
 * Not to be confused with {@see OAuth2TokenType} (the `token_type` of an
 * access token, e.g. `Bearer`).
 *
 * Example:
 * ```php
 * $params =
 * [
 *     OAuth2Parameter::TOKEN           => $refreshToken ,
 *     OAuth2Parameter::TOKEN_TYPE_HINT => OAuth2TokenTypeHint::REFRESH_TOKEN ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7009 §2.1 (Token Revocation)
 * - RFC 7662 §2.1 (Token Introspection)
 * - UMA 2.0 Grant for OAuth 2.0 §3.7 (`pct`)
 * - IANA OAuth Token Type Hints registry
 *
 * @see OAuth2Parameter::TOKEN_TYPE_HINT
 * @see OAuth2TokenType
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2TokenTypeHint
{
    use ConstantsTrait ;

    /**
     * `access_token` — The submitted token is an access token (RFC 7009 §2.1).
     */
    public const string ACCESS_TOKEN = 'access_token' ;

    /**
     * `refresh_token` — The submitted token is a refresh token (RFC 7009 §2.1).
     */
    public const string REFRESH_TOKEN = 'refresh_token' ;

    /**
     * `pct` — The submitted token is a Persisted Claims Token
     * (UMA 2.0 Grant for OAuth 2.0 §3.7).
     */
    public const string PCT = 'pct' ;
}
