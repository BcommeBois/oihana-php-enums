<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Defines constants for common HTTP request methods.
 *
 * Constants are organised in three sections:
 *
 * 1. **Standard methods** — the HTTP verbs recognised by {@see self::isValid()}:
 *    the RFC 9110 §9 core methods (plus `PATCH` from RFC 5789) and the widely
 *    deployed `PURGE` extension. Each is exposed in two casings: an uppercase
 *    form matching the canonical, case-sensitive token sent on the wire, and a
 *    lowercase alias convenient for routing tables and configuration keys.
 *
 * 2. **RFC 5323 (WebDAV SEARCH)** — the `SEARCH` method, an IANA-registered
 *    extension for server-side search over a collection. Registered, but not a
 *    core HTTP verb, hence intentionally excluded from {@see self::isValid()}.
 *
 * 3. **Extras** — tokens that are not HTTP verbs: a wildcard (`ALL`), the
 *    non-standard `COUNT`, and a small lowercase CRUD/command vocabulary
 *    (`insert`, `upsert`, `flush`, …) used by higher-level data layers. These
 *    are also excluded from {@see self::isValid()}.
 *
 * Example:
 * ```php
 * $request = $factory->createRequest( HttpMethod::GET , $uri ) ;
 *
 * HttpMethod::isValid( 'POST' ) ;   // true
 * HttpMethod::isValid( 'SEARCH' ) ; // false (registry extension, not a core verb)
 * HttpMethod::isValid( 'flush' ) ;  // false (operation alias, not an HTTP verb)
 * ```
 *
 * @see https://www.iana.org/assignments/http-methods/http-methods.xhtml
 *
 * @package oihana\enums\http
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.0.0
 */
class HttpMethod
{
    use ConstantsTrait ;

    // ------ standard methods (recognised by isValid)

    /**
     * `DELETE` — Removes the target resource (RFC 9110 §9.3.5).
     */
    public const string DELETE = 'DELETE' ;

    /**
     * `delete` — Lowercase form of {@see self::DELETE}.
     */
    public const string delete = 'delete' ;

    /**
     * `HEAD` — Identical to `GET` but returns headers only, no body (RFC 9110 §9.3.2).
     */
    public const string HEAD = 'HEAD' ;

    /**
     * `head` — Lowercase form of {@see self::HEAD}.
     */
    public const string head = 'head' ;

    /**
     * `GET` — Requests a representation of the target resource; safe and idempotent (RFC 9110 §9.3.1).
     */
    public const string GET = 'GET' ;

    /**
     * `get` — Lowercase form of {@see self::GET}.
     */
    public const string get = 'get' ;

    /**
     * `OPTIONS` — Describes the communication options for the target resource (RFC 9110 §9.3.7).
     */
    public const string OPTIONS = 'OPTIONS' ;

    /** `options` — Lowercase form of {@see self::OPTIONS}. */
    public const string options = 'options' ;

    /** `PATCH` — Applies a partial modification to the target resource (RFC 5789). */
    public const string PATCH = 'PATCH' ;

    /** `patch` — Lowercase form of {@see self::PATCH}. */
    public const string patch = 'patch' ;

    /**
     * `POST` — Submits an entity to the resource, often changing server state (RFC 9110 §9.3.3).
     */
    public const string POST = 'POST' ;

    /**
     * `post` — Lowercase form of {@see self::POST}.
     */
    public const string post = 'post' ;

    /**
     * `PURGE` — Non-standard; invalidates a cached representation (Varnish, Squid, …).
     */
    public const string PURGE = 'PURGE' ;

    /**
     * `purge` — Lowercase form of {@see self::PURGE}.
     */
    public const string purge = 'purge';

    /**
     * `PUT` — Replaces the target resource with the request payload; idempotent (RFC 9110 §9.3.4).
     */
    public const string PUT = 'PUT' ;

    /**
     * `put` — Lowercase form of {@see self::PUT}.
     */
    public const string put = 'put' ;

    /**
     * `TRACE` — Performs a message loop-back test along the path to the target (RFC 9110 §9.3.8).
     */
    public const string TRACE = 'TRACE' ;

    /**
     * `trace` — Lowercase form of {@see self::TRACE}.
     */
    public const string trace = 'trace' ;

    /**
     * `CONNECT` — Establishes a tunnel to the server, typically for TLS proxying (RFC 9110 §9.3.6).
     */
    public const string CONNECT = 'CONNECT';

    /**
     * `connect` — Lowercase form of {@see self::CONNECT}.
     */
    public const string connect = 'connect' ;

    // ------ RFC 5323 (WebDAV SEARCH)

    /**
     * `SEARCH` — Server-side search over a resource collection (RFC 5323, WebDAV SEARCH).
     */
    public const string SEARCH = 'SEARCH' ;

    /**
     * `search` — Lowercase form of {@see self::SEARCH}.
     */
    public const string search = 'search' ;

    // ------ extras

    /**
     * `ALL` — Wildcard token matching any method, e.g. when registering a catch-all route.
     */
    public const string ALL = 'ALL' ;

    /**
     * `all` — Operation alias targeting every record of a collection.
     */
    public const string all = 'all' ;

    /**
     * `COUNT` — Non-standard; returns the number of matching resources without their bodies.
     */
    public const string COUNT = 'COUNT' ;

    /**
     * `count` — Operation alias returning the number of matching records.
     */
    public const string count = 'count' ;

    /**
     * `default` — Fallback operation used when no specific method is provided.
     */
    public const string default = 'default' ;

    /**
     * `deleteAll` — Bulk operation removing every record of a collection.
     */
    public const string deleteAll = 'deleteAll' ;

    /**
     * `exist` — Operation alias checking whether a record exists.
     */
    public const string exist = 'exist' ;

    /**
     * `flush` — Operation alias clearing a cache or buffer.
     */
    public const string flush = 'flush' ;

    /**
     * `insert` — Operation alias creating a new record.
     */
    public const string insert = 'insert' ;

    /**
     * `list` — Operation alias retrieving a collection of records.
     */
    public const string list = 'list' ;

    /**
     * `replace` — Operation alias fully replacing an existing record (`PUT`-like).
     */
    public const string replace = 'replace' ;

    /**
     * `truncate` — Operation alias emptying a collection of all its records.
     */
    public const string truncate = 'truncate' ;

    /**
     * `update` — Operation alias applying a partial change to a record.
     */
    public const string update = 'update' ;

    /**
     * `upsert` — Operation alias inserting a record or updating it when it already exists.
     */
    public const string upsert = 'upsert' ;

    /**
     * Checks whether a given HTTP method is a valid standard HTTP method.
     *
     * This method compares the input string against the list of recognized
     * HTTP methods (GET, POST, PUT, DELETE, PATCH, HEAD, OPTIONS, TRACE, CONNECT, PURGE).
     * By default, the check is case-insensitive, but you can enforce exact case
     * matching by setting `$caseSensitive` to `true`.
     *
     * @param string $method        The HTTP method to validate (e.g., 'GET', 'post').
     * @param bool   $caseSensitive Optional. Whether the match should be case-sensitive.
     *                              Defaults to `false`.
     *
     * @return bool Returns `true` if the method is a recognized HTTP method,
     *              `false` otherwise.
     *
     * @example
     * ```php
     * HttpMethod::isValid('POST');        // true
     * HttpMethod::isValid('post');        // true
     * HttpMethod::isValid('post', true);  // false
     * HttpMethod::isValid('flush');       // false
     * ```
     */
    public static function isValid( string $method , bool $caseSensitive = false ): bool
    {
        if ( !$caseSensitive )
        {
            $method = strtoupper( $method ) ;
        }

        return match ( $method )
        {
            self::GET, self::POST, self::PUT, self::DELETE,
            self::PATCH, self::HEAD, self::OPTIONS, self::TRACE,
            self::CONNECT, self::PURGE => true,
            default => false,
        };
    }
}
