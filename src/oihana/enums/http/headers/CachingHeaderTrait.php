<?php

namespace oihana\enums\http\headers;

/**
 * Caching HTTP header names (RFC 9111).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait CachingHeaderTrait
{
    /**
     * `Age` — Estimated time in seconds since the response was generated (RFC 9111 §5.1).
     */
    public const string AGE = 'Age' ;

    /**
     * `Cache-Control` — Directives for caches along the request/response chain (RFC 9111 §5.2).
     */
    public const string CACHE_CONTROL = 'Cache-Control' ;

    /**
     * `Expires` — Date/time after which the response is considered stale (RFC 9111 §5.3).
     */
    public const string EXPIRES = 'Expires' ;

    /**
     * `Pragma` — Legacy HTTP/1.0 cache directive, superseded by `Cache-Control` (RFC 9111 §5.4).
     */
    public const string PRAGMA = 'Pragma' ;

    /**
     * `Warning` — Additional information about the status of a response (obsoleted by RFC 9111).
     */
    public const string WARNING = 'Warning' ;
}
