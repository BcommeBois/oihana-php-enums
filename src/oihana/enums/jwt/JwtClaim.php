<?php

namespace oihana\enums\jwt;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard JWT claim names.
 *
 * Covers the IANA "JSON Web Token Claims" registry: registered claims
 * from RFC 7519, plus widely used OIDC, OAuth2 and security-related claims.
 *
 * Example:
 * ```php
 * $assertion = JWT::encode
 * (
 *     [
 *         JwtClaim::ISS => $this->serviceAccount[ ZitadelKeyFile::USER_ID ] ,
 *         JwtClaim::SUB => $this->serviceAccount[ ZitadelKeyFile::USER_ID ] ,
 *         JwtClaim::AUD => $this->issuer ,
 *         JwtClaim::IAT => $now ,
 *         JwtClaim::EXP => $now + 3600 ,
 *     ] ,
 *     ...
 * ) ;
 * ```
 *
 * References:
 * - RFC 7519  (JSON Web Token — registered claims)
 * - RFC 8693  (Token Exchange)
 * - OIDC Core 1.0 §2 (Standard Claims)
 * - IANA JWT Claims Registry
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class JwtClaim
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Registered claims (RFC 7519 §4.1)
    // -------------------------------------------------------------------------

    public const string ISS = 'iss' ; // Issuer
    public const string SUB = 'sub' ; // Subject
    public const string AUD = 'aud' ; // Audience
    public const string EXP = 'exp' ; // Expiration time
    public const string NBF = 'nbf' ; // Not before
    public const string IAT = 'iat' ; // Issued at
    public const string JTI = 'jti' ; // JWT ID

    /**
     * `aud` — the JWT audience (typically the issuer URL of the IdP
     * for a `client_credentials` exchange).
     */
    public const string AUDIENCE = 'aud' ;

    /**
     * `exp` — the Unix epoch time at which the assertion stops being
     * valid. Must be in the near future (`now + 60s` is plenty).
     */
    public const string EXPIRES_AT = 'exp' ;

    /**
     * `iat` — the Unix epoch time at which the assertion was minted.
     */
    public const string ISSUED_AT = 'iat' ;

    /**
     * `iss` — the JWT issuer. For a `jwt-bearer` client assertion,
     * this is the OAuth client_id of the application.
     */
    public const string ISSUER = 'iss' ;

    /**
     * `sub` — the subject of the assertion. For a `jwt-bearer`
     * client assertion, this is the OAuth client_id of the
     * application (same value as {@see self::ISSUER}).
     */
    public const string SUBJECT = 'sub' ;

    /**
     * `jti` — unique identifier for the JWT (JWT ID).
     *
     * Used to prevent replay attacks by ensuring each assertion
     * is only used once. The authorization server may store and
     * reject already seen identifiers.
     */
    public const string JWT_ID = 'jti' ;

    /**
     * `nbf` — "not before" timestamp.
     *
     * Defines the earliest time at which the JWT becomes valid.
     * Helps mitigate clock skew between client and server.
     */
    public const string NOT_BEFORE = 'nbf' ;

    // -------------------------------------------------------------------------
    // OAuth2 / OIDC commonly used claims
    // -------------------------------------------------------------------------

    public const string AZP        = 'azp' ;        // Authorized party
    public const string NONCE      = 'nonce' ;
    public const string AUTH_TIME  = 'auth_time' ;
    public const string ACR        = 'acr' ;
    public const string AMR        = 'amr' ;
    public const string SCOPE      = 'scope' ;
    public const string CLIENT_ID  = 'client_id' ;

    // -------------------------------------------------------------------------
    // OIDC standard profile claims (OIDC Core §5.1)
    // -------------------------------------------------------------------------

    public const string NAME               = 'name' ;
    public const string GIVEN_NAME         = 'given_name' ;
    public const string FAMILY_NAME        = 'family_name' ;
    public const string EMAIL              = 'email' ;
    public const string EMAIL_VERIFIED     = 'email_verified' ;
    public const string PREFERRED_USERNAME = 'preferred_username' ;
    public const string LOCALE             = 'locale' ;
}