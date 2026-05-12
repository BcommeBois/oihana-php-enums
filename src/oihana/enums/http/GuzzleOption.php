<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of Guzzle HTTP client request options.
 *
 * These constants map to the keys accepted by Guzzle's request options
 * array (timeout, base_uri, headers, form_params, json, query, etc.).
 *
 * Reference: https://docs.guzzlephp.org/en/stable/request-options.html
 *
 * Example:
 * ```php
 * $client = new Client([ GuzzleOption::BASE_URI => $this->issuer , GuzzleOption::TIMEOUT => 10 ]);
 *
 * $response = $client->request( HttpMethod::POST , $path ,
 * [
 *     GuzzleOption::HEADERS     => [ HttpHeader::AUTHORIZATION => '...' ],
 *     GuzzleOption::FORM_PARAMS => [ ... ],
 * ]) ;
 * ```
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class GuzzleOption
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Transport / connection
    // -------------------------------------------------------------------------

    public const string BASE_URI         = 'base_uri' ;
    public const string TIMEOUT          = 'timeout' ;
    public const string CONNECT_TIMEOUT  = 'connect_timeout' ;
    public const string READ_TIMEOUT     = 'read_timeout' ;
    public const string PROXY            = 'proxy' ;
    public const string VERIFY           = 'verify' ;
    public const string CERT             = 'cert' ;
    public const string SSL_KEY          = 'ssl_key' ;
    public const string VERSION          = 'version' ;

    // -------------------------------------------------------------------------
    // Request body
    // -------------------------------------------------------------------------

    public const string BODY        = 'body' ;
    public const string JSON        = 'json' ;
    public const string FORM_PARAMS = 'form_params' ;
    public const string MULTIPART   = 'multipart' ;
    public const string QUERY       = 'query' ;

    // -------------------------------------------------------------------------
    // Headers & auth
    // -------------------------------------------------------------------------

    public const string HEADERS = 'headers' ;
    public const string AUTH    = 'auth' ;
    public const string COOKIES = 'cookies' ;

    // -------------------------------------------------------------------------
    // Behaviour
    // -------------------------------------------------------------------------

    public const string ALLOW_REDIRECTS = 'allow_redirects' ;
    public const string DECODE_CONTENT  = 'decode_content' ;
    public const string DELAY           = 'delay' ;
    public const string HTTP_ERRORS     = 'http_errors' ;
    public const string ON_HEADERS      = 'on_headers' ;
    public const string ON_STATS        = 'on_stats' ;
    public const string PROGRESS        = 'progress' ;
    public const string SINK            = 'sink' ;
    public const string STREAM          = 'stream' ;
    public const string SYNCHRONOUS     = 'synchronous' ;

    // -------------------------------------------------------------------------
    // Handler / debugging
    // -------------------------------------------------------------------------

    public const string HANDLER = 'handler' ;
    public const string DEBUG   = 'debug' ;
}