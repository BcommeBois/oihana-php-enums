<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Defines constants for common HTTP request methods.
 */
class HttpMethod
{
    use ConstantsTrait ;

    public const string DELETE = 'DELETE';
    public const string delete = 'delete';

    public const string HEAD = 'HEAD';
    public const string head = 'head';

    public const string GET = 'GET';
    public const string get = 'get';

    public const string OPTIONS = 'OPTIONS';
    public const string options = 'options';

    public const string PATCH = 'PATCH';
    public const string patch = 'patch';

    public const string POST = 'POST';
    public const string post = 'post';

    public const string PURGE = 'PURGE';
    public const string purge = 'purge';

    public const string PUT = 'PUT';
    public const string put = 'put';

    public const string TRACE = 'TRACE';
    public const string trace = 'trace';

    // ------ extras

    public const string ALL      = 'ALL' ;
    public const string CONNECT  = 'CONNECT';

    public const string all       = 'all' ;
    public const string connect   = 'connect';
    public const string default   = 'default' ;
    public const string deleteAll = 'deleteAll' ;
    public const string count     = 'count' ;
    public const string exist     = 'exist' ;
    public const string flush     = 'flush' ;
    public const string insert    = 'insert' ;
    public const string list      = 'list' ;
    public const string replace   = 'replace' ;
    public const string truncate  = 'truncate' ;
    public const string update    = 'update' ;
    public const string upsert    = 'upsert' ;

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
            $method = strtoupper( $method );
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