<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard `typ` (JWT Type) header values.
 *
 * Values used in the {@see JwtHeader::TYP} header to identify the
 * specific JWT profile carried by a JWS or JWE, allowing recipients
 * to reject tokens whose profile does not match the expected one
 * (and to mitigate token confusion attacks).
 *
 * References:
 * - RFC 7519       — JSON Web Token (generic `JWT` type)
 * - RFC 9068       — JSON Web Token (JWT) Profile for OAuth 2.0 Access Tokens (`at+jwt`)
 * - RFC 9449       — OAuth 2.0 DPoP (`dpop+jwt`)
 * - RFC 8417       — Security Event Token (`secevent+jwt`)
 * - RFC 9701       — JWT Response for OAuth Token Introspection (`token-introspection+jwt`)
 * - OIDC Back-Channel Logout 1.0 (`logout+jwt`)
 * - OpenID Connect Initiating User Registration via OIDC 1.0 (`it+jwt`)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwtType
{
    use ConstantsTrait ;

    /**
     * `JWT` — Generic JSON Web Token (RFC 7519).
     *
     * Most common value; indicates a JWS- or JWE-secured JWT without
     * further profile constraint. Value is case-insensitive on the
     * wire but the canonical form is `JWT`.
     */
    public const string JWT = 'JWT' ;

    /**
     * `at+jwt` — JWT Profile for OAuth 2.0 Access Tokens (RFC 9068).
     *
     * Used to distinguish a structured (JWT) access token from an
     * ID Token. Resource servers MUST reject access tokens whose
     * `typ` does not match this value (or another expected profile).
     */
    public const string AT_JWT = 'at+jwt' ;

    /**
     * `dpop+jwt` — DPoP proof JWT (RFC 9449).
     *
     * Carried in the `DPoP` HTTP header alongside a DPoP-bound access
     * token. Recipients MUST verify this `typ` value.
     */
    public const string DPOP_JWT = 'dpop+jwt' ;

    /**
     * `logout+jwt` — OIDC Back-Channel Logout Token.
     *
     * Sent by the OP to RPs registered for back-channel logout to
     * terminate sessions identified by `sid` and/or `sub`.
     */
    public const string LOGOUT_JWT = 'logout+jwt' ;

    /**
     * `secevent+jwt` — Security Event Token (RFC 8417).
     *
     * Used by the SET, RISC, and CAEP families of specifications to
     * convey security-relevant events between systems.
     */
    public const string SECEVENT_JWT = 'secevent+jwt' ;

    /**
     * `token-introspection+jwt` — JWT response from a Token
     * Introspection endpoint (RFC 9701).
     */
    public const string TOKEN_INTROSPECTION_JWT = 'token-introspection+jwt' ;

    /**
     * `it+jwt` — Initiation Token used by "Initiating User
     * Registration via OpenID Connect 1.0".
     */
    public const string IT_JWT = 'it+jwt' ;
}
