<?php

namespace oihana\enums\http;

use oihana\reflect\exceptions\ConstantException;
use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard HTTP header names (request and response).
 *
 * This class provides a centralized, type-safe list of common HTTP header
 * names, preserving the exact wire-format casing defined by the relevant
 * RFCs (notably RFC 7230–7235, RFC 9110–9112) and de-facto standards.
 *
 * Usage examples:
 * - Access a header name: Headers::CONTENT_TYPE
 * - Validate/inspect available names with ConstantsTrait utilities:
 *   - Headers::enums() returns all header values
 *   - Headers::includes('Content-Type') checks existence
 *   - Headers::getConstant('Content-Type') returns the constant name
 *
 * Notes:
 * - Only widely used standardized headers are listed. Vendor-specific
 *   or application-specific X- headers are intentionally omitted.
 * - Values are case-insensitive per RFC, but this list keeps canonical casing.
 */
class HttpHeader
{
    use ConstantsTrait ;

    // CORS (Cross-Origin Resource Sharing)
    const string ACCESS_CONTROL_ALLOW_CREDENTIALS = 'Access-Control-Allow-Credentials' ;
    const string ACCESS_CONTROL_ALLOW_HEADERS     = 'Access-Control-Allow-Headers' ;
    const string ACCESS_CONTROL_ALLOW_METHODS     = 'Access-Control-Allow-Methods' ;
    const string ACCESS_CONTROL_ALLOW_ORIGIN      = 'Access-Control-Allow-Origin'  ;
    const string ACCESS_CONTROL_EXPOSE_HEADERS    = 'Access-Control-Expose-Headers' ;
    const string ACCESS_CONTROL_MAX_AGE           = 'Access-Control-Max-Age'       ;
    const string ACCESS_CONTROL_REQUEST_HEADERS   = 'Access-Control-Request-Headers' ;
    const string ACCESS_CONTROL_REQUEST_METHOD    = 'Access-Control-Request-Method' ;

    // Content negotiation (request)
    const string ACCEPT                           = 'Accept' ;
    const string ACCEPT_CHARSET                   = 'Accept-Charset' ;
    const string ACCEPT_ENCODING                  = 'Accept-Encoding' ;
    const string ACCEPT_LANGUAGE                  = 'Accept-Language' ;

    // Caching
    const string AGE                              = 'Age' ;
    const string CACHE_CONTROL                    = 'Cache-Control' ;
    const string EXPIRES                          = 'Expires' ;
    const string PRAGMA                           = 'Pragma' ;
    const string WARNING                          = 'Warning' ;

    // Conditional requests
    const string ETAG                             = 'ETag' ;
    const string IF_MATCH                         = 'If-Match' ;
    const string IF_NONE_MATCH                    = 'If-None-Match' ;
    const string IF_MODIFIED_SINCE                = 'If-Modified-Since' ;
    const string IF_UNMODIFIED_SINCE              = 'If-Unmodified-Since' ;
    const string IF_RANGE                         = 'If-Range' ;

    // Content/representation metadata
    const string CONTENT_DISPOSITION              = 'Content-Disposition' ;
    const string CONTENT_ENCODING                 = 'Content-Encoding' ;
    const string CONTENT_LANGUAGE                 = 'Content-Language' ;
    const string CONTENT_LENGTH                   = 'Content-Length' ;
    const string CONTENT_LOCATION                 = 'Content-Location' ;
    const string CONTENT_RANGE                    = 'Content-Range' ;
    const string CONTENT_TYPE                     = 'Content-Type' ;
    const string LAST_MODIFIED                    = 'Last-Modified' ;
    const string VARY                             = 'Vary' ;

    // Authentication & Authorization
    const string AUTHORIZATION                    = 'Authorization' ;
    const string OAUTH                            = 'OAuth' ;
    const string PROXY_AUTHENTICATE               = 'Proxy-Authenticate' ;
    const string PROXY_AUTHORIZATION              = 'Proxy-Authorization' ;
    const string WWW_AUTHENTICATE                 = 'WWW-Authenticate' ;

    // Cookies
    const string COOKIE                           = 'Cookie' ;
    const string SET_COOKIE                       = 'Set-Cookie' ;

    // Range requests
    const string ACCEPT_RANGES                    = 'Accept-Ranges' ;
    const string RANGE                            = 'Range' ;
    const string RETRY_AFTER                      = 'Retry-After' ;

    // Message routing and networking
    const string CONNECTION                       = 'Connection' ;
    const string DATE                             = 'Date' ;
    const string FORWARDED                        = 'Forwarded' ;
    const string HOST                             = 'Host' ;
    const string KEEP_ALIVE                       = 'Keep-Alive' ;
    const string LINK                             = 'Link' ;
    const string LOCATION                         = 'Location' ;
    const string SERVER                           = 'Server' ;
    const string TE                               = 'TE' ;
    const string TRAILER                          = 'Trailer' ;
    const string TRANSFER_ENCODING                = 'Transfer-Encoding' ;
    const string UPGRADE                          = 'Upgrade' ;
    const string VIA                              = 'Via' ;

    // Request context
    const string DNT                              = 'DNT' ;
    const string ORIGIN                           = 'Origin' ;
    const string REFERER                          = 'Referer' ;
    const string USER_AGENT                       = 'User-Agent' ;
    const string UPGRADE_INSECURE_REQUESTS        = 'Upgrade-Insecure-Requests' ;

    // Security related response headers (commonly used)
    const string STRICT_TRANSPORT_SECURITY        = 'Strict-Transport-Security' ;
    const string X_CONTENT_TYPE_OPTIONS           = 'X-Content-Type-Options' ;
    const string X_FRAME_OPTIONS                  = 'X-Frame-Options' ;
    const string X_XSS_PROTECTION                 = 'X-XSS-Protection' ;

    // Helpers

    /**
     * Returns all currently sent headers.
     * @return array<string> List of headers in "Name: Value" format.
     */
    public static function all() :array
    {
        return headers_list() ;
    }

    /**
     * Checks if a specific header has already been sent.
     *
     * @param string $name The header name.
     * @return bool True if the header was sent, false otherwise.
     */
    public static function has(string $name): bool
    {
        $lowerName = strtolower( $name ) ;
        return array_any( headers_list() , fn( $header ) => str_starts_with( strtolower( $header ) , $lowerName . ':' ) ) ;
    }

    /**
     * Removes a previously set header.
     *
     * @param string $name The header name.
     *
     * @return void
     */
    public static function remove(string $name): void
    {
        if ( !headers_sent() )
        {
            header_remove( $name ) ;
        }
    }

    /**
     * Sends an HTTP header with optional value.
     *
     * This method wraps the native `header()` function and provides a safer,
     * enum-based way to set headers.
     *
     * Example:
     * ```php
     * HttpHeader::send( HttpHeader::CONTENT_TYPE  , 'application/json' ) ;
     * HttpHeader::send( HttpHeader::CACHE_CONTROL , 'no-cache' ) ;
     * HttpHeader::send( HttpHeader::ACCESS_CONTROL_ALLOW_ORIGIN , '*' ) ;
     * ```
     *
     * @param string      $name         The header name (preferably one of the class constants).
     * @param string|null $value        Optional header value. If null, only the name is sent.
     * @param bool        $replace      Whether to replace previous header of the same name.
     * @param int|null    $responseCode Optional HTTP response code to send.
     *
     * @return void
     *
     * @throws ConstantException If the header name is invalid.
     */
    public static function send( string $name , ?string $value = null , bool $replace = true , ?int $responseCode = null ): void
    {
        self::validate( $name ) ;

        if ( headers_sent($file, $line ) )
        {
            trigger_error
            (
                sprintf
                (
                    "Cannot send header '%s' because headers were already sent in %s on line %d.",
                    $name ,
                    $file ,
                    $line
                ),
                E_USER_WARNING
            );
            return ;
        }

        $header = $value !== null ? "{$name}: {$value}" : $name ;

        if ( $responseCode !== null )
        {
            header( $header , $replace , $responseCode ) ;
        }
        else
        {
            header( $header , $replace ) ;
        }
    }
}