<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Component keys of the associative array returned by PHP's
 * `parse_url()` (and consumed when reassembling a URL).
 *
 * Centralises the array keys so callers manipulating `parse_url()`
 * output can avoid magic strings.
 *
 * @package oihana\enums\http
 * @author  Marc Alcaraz
 *
 * @see https://www.php.net/manual/en/function.parse-url.php
 * @see UriScheme
 */
class UrlComponent
{
    use ConstantsTrait ;

    /**
     * The fragment, i.e. the part after the `#` (without the leading `#`).
     */
    public const string FRAGMENT = 'fragment' ;

    /**
     * The host name (e.g. `www.example.com`).
     */
    public const string HOST = 'host' ;

    /**
     * The password from the userinfo part (`scheme://user:pass@host`).
     */
    public const string PASS = 'pass' ;

    /**
     * The path (e.g. `/foo/bar`).
     */
    public const string PATH = 'path' ;

    /**
     * The port. Returned as an `int` by `parse_url()`, unlike the other components.
     */
    public const string PORT = 'port' ;

    /**
     * The query string, i.e. the part after the `?` (without the leading `?`).
     */
    public const string QUERY = 'query' ;

    /**
     * The URI scheme (e.g. `https`). See {@see UriScheme}.
     */
    public const string SCHEME = 'scheme' ;

    /**
     * The user name from the userinfo part (`scheme://user:pass@host`).
     */
    public const string USER = 'user' ;
}