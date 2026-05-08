<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standardized HTTP authentication schemes.
 *
 * Authentication schemes appear as the first token in the value of the
 * `Authorization` (RFC 7235) and `Proxy-Authorization` headers, and as the
 * first token of `WWW-Authenticate` / `Proxy-Authenticate` challenges, e.g.:
 *
 *     Authorization: Bearer eyJhbGciOi...
 *     Authorization: Basic dXNlcjpwYXNz
 *     Authorization: OAuth oauth_consumer_key="...", oauth_token="..."
 *
 * Schemes are NOT header names — for header names, see {@see HttpHeader}.
 *
 * Casing follows the IANA HTTP Authentication Scheme Registry. Per RFC 7235,
 * schemes are case-insensitive on the wire, but canonical casing is preserved
 * here for interoperability with strict consumers.
 *
 * References:
 * - RFC 7235 (HTTP/1.1 Authentication)
 * - RFC 7617 (Basic)
 * - RFC 6750 (Bearer)
 * - RFC 7616 (Digest)
 * - RFC 5849 (OAuth 1.0a)
 * - RFC 7486 (HOBA)
 * - RFC 8120 (Mutual)
 * - RFC 4559 (Negotiate / SPNEGO)
 * - RFC 8292 (vapid — Web Push)
 *
 * @see HttpHeader::AUTHORIZATION
 * @see HttpHeader::PROXY_AUTHORIZATION
 * @see HttpHeader::WWW_AUTHENTICATE
 * @see HttpHeader::PROXY_AUTHENTICATE
 */
class AuthScheme
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Standard schemes (IANA registry)
    // -------------------------------------------------------------------------

    const string BASIC         = 'Basic' ;
    const string BEARER        = 'Bearer' ;
    const string DIGEST        = 'Digest' ;
    const string HOBA          = 'HOBA' ;
    const string MUTUAL        = 'Mutual' ;
    const string NEGOTIATE     = 'Negotiate' ;
    const string OAUTH         = 'OAuth' ;
    const string SCRAM_SHA_1   = 'SCRAM-SHA-1' ;
    const string SCRAM_SHA_256 = 'SCRAM-SHA-256' ;
    const string VAPID         = 'vapid' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Returns the scheme followed by a single space, ready to prefix a token
     * value in an Authorization header.
     *
     * Example:
     * ```php
     * $header = AuthScheme::prefix( AuthScheme::BEARER ) . $token ;
     * // => "Bearer eyJhbGciOi..."
     * ```
     *
     * @param string $scheme One of the class constants.
     * @return string The scheme followed by a single space.
     */
    public static function prefix( string $scheme ): string
    {
        return $scheme . ' ' ;
    }
}