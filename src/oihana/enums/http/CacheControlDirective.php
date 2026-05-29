<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of `Cache-Control` header directives (RFC 9111).
 *
 * Covers both response and request directives, plus the widely deployed
 * extensions `immutable` (RFC 8246) and `stale-while-revalidate` /
 * `stale-if-error` (RFC 5861).
 *
 * Some directives take an argument (`max-age=3600`, `s-maxage=60`); the
 * constants hold only the directive name.
 *
 * Example:
 * ```php
 * $value = CacheControlDirective::PUBLIC . ', ' . CacheControlDirective::MAX_AGE . '=3600' ;
 * $response->withHeader( HttpHeader::CACHE_CONTROL , $value ) ; // 'public, max-age=3600'
 * ```
 *
 * @see HttpHeader::CACHE_CONTROL
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class CacheControlDirective
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Response directives (RFC 9111 §5.2.2)
    // -------------------------------------------------------------------------

    /**
     * `public` — Response may be stored by any cache (RFC 9111 §5.2.2.9).
     */
    public const string PUBLIC = 'public' ;

    /**
     * `private` — Response is for a single user; shared caches must not store it (RFC 9111 §5.2.2.7).
     */
    public const string PRIVATE = 'private' ;

    /**
     * `no-cache` — Stored response must be revalidated before reuse (RFC 9111 §5.2.2.4).
     */
    public const string NO_CACHE = 'no-cache' ;

    /**
     * `no-store` — Response must not be stored by any cache (RFC 9111 §5.2.2.5).
     */
    public const string NO_STORE = 'no-store' ;

    /**
     * `no-transform` — Intermediaries must not transform the payload (RFC 9111 §5.2.2.6).
     */
    public const string NO_TRANSFORM = 'no-transform' ;

    /**
     * `must-revalidate` — Stale response must be revalidated (RFC 9111 §5.2.2.2).
     */
    public const string MUST_REVALIDATE = 'must-revalidate' ;

    /**
     * `proxy-revalidate` — Like `must-revalidate`, for shared caches only (RFC 9111 §5.2.2.8).
     */
    public const string PROXY_REVALIDATE = 'proxy-revalidate' ;

    /**
     * `must-understand` — Cache must understand the status code to store it (RFC 9111 §5.2.2.3).
     */
    public const string MUST_UNDERSTAND = 'must-understand' ;

    /**
     * `max-age` — Maximum freshness lifetime in seconds (RFC 9111 §5.2.2.1 / §5.2.1.1).
     */
    public const string MAX_AGE = 'max-age' ;

    /**
     * `s-maxage` — Like `max-age`, overrides it for shared caches (RFC 9111 §5.2.2.10).
     */
    public const string S_MAXAGE = 's-maxage' ;

    /**
     * `immutable` — Response body will not change while fresh (RFC 8246).
     */
    public const string IMMUTABLE = 'immutable' ;

    /**
     * `stale-while-revalidate` — Serve stale while revalidating in background (RFC 5861).
     */
    public const string STALE_WHILE_REVALIDATE = 'stale-while-revalidate' ;

    /**
     * `stale-if-error` — Serve stale if revalidation fails (RFC 5861).
     */
    public const string STALE_IF_ERROR = 'stale-if-error' ;

    // -------------------------------------------------------------------------
    // Request directives (RFC 9111 §5.2.1)
    // -------------------------------------------------------------------------

    /**
     * `max-stale` — Client accepts a stale response within the given seconds (RFC 9111 §5.2.1.2).
     */
    public const string MAX_STALE = 'max-stale' ;

    /**
     * `min-fresh` — Client wants a response still fresh for the given seconds (RFC 9111 §5.2.1.3).
     */
    public const string MIN_FRESH = 'min-fresh' ;

    /**
     * `only-if-cached` — Client wants a stored response only, no upstream fetch (RFC 9111 §5.2.1.7).
     */
    public const string ONLY_IF_CACHED = 'only-if-cached' ;
}
