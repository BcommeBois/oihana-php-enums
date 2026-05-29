<?php

namespace oihana\enums\http;

use oihana\reflect\exceptions\ConstantException;
use oihana\reflect\traits\ConstantsTrait;

use oihana\enums\http\headers\ApiHeaderTrait;
use oihana\enums\http\headers\AuthenticationHeaderTrait;
use oihana\enums\http\headers\CachingHeaderTrait;
use oihana\enums\http\headers\ClientHintHeaderTrait;
use oihana\enums\http\headers\ConditionalHeaderTrait;
use oihana\enums\http\headers\ContentHeaderTrait;
use oihana\enums\http\headers\ContentNegotiationHeaderTrait;
use oihana\enums\http\headers\CookieHeaderTrait;
use oihana\enums\http\headers\CorsHeaderTrait;
use oihana\enums\http\headers\FetchMetadataHeaderTrait;
use oihana\enums\http\headers\IntegrityHeaderTrait;
use oihana\enums\http\headers\MiscHeaderTrait;
use oihana\enums\http\headers\ObservabilityHeaderTrait;
use oihana\enums\http\headers\ProxyHeaderTrait;
use oihana\enums\http\headers\RangeHeaderTrait;
use oihana\enums\http\headers\RateLimitHeaderTrait;
use oihana\enums\http\headers\ReportingHeaderTrait;
use oihana\enums\http\headers\RequestContextHeaderTrait;
use oihana\enums\http\headers\RoutingHeaderTrait;
use oihana\enums\http\headers\SecurityHeaderTrait;
use oihana\enums\http\headers\WebSocketHeaderTrait;

/**
 * Enumeration of standard HTTP header names (request and response).
 *
 * This class provides a centralized, type-safe list of common HTTP header
 * names, preserving the exact wire-format casing defined by the relevant
 * RFCs (notably RFC 9110–9112) and de-facto standards.
 *
 * The constants are organised by domain into composable traits living in
 * {@see \oihana\enums\http\headers}; this class simply `use`s them all and
 * adds the helper methods. Use a single category trait directly when you only
 * need part of the set.
 *
 * Usage examples:
 * - Access a header name: `HttpHeader::CONTENT_TYPE`
 * - List/validate names with the {@see ConstantsTrait} utilities:
 *   - `HttpHeader::enums()` returns all header values
 *   - `HttpHeader::includes('Content-Type')` checks existence
 *   - `HttpHeader::getConstant('Content-Type')` returns the constant name
 *
 * Notes:
 * - Values are case-insensitive per RFC, but this list keeps canonical casing.
 *
 * @package oihana\enums\http
 * @author  Marc Alcaraz (ekameleon)
 */
class HttpHeader
{
    use ConstantsTrait                ,
        ApiHeaderTrait                ,
        AuthenticationHeaderTrait     ,
        CachingHeaderTrait            ,
        ClientHintHeaderTrait         ,
        ConditionalHeaderTrait        ,
        ContentHeaderTrait            ,
        ContentNegotiationHeaderTrait ,
        CookieHeaderTrait             ,
        CorsHeaderTrait               ,
        FetchMetadataHeaderTrait      ,
        IntegrityHeaderTrait          ,
        MiscHeaderTrait               ,
        ObservabilityHeaderTrait      ,
        ProxyHeaderTrait              ,
        RangeHeaderTrait              ,
        RateLimitHeaderTrait          ,
        ReportingHeaderTrait          ,
        RequestContextHeaderTrait     ,
        RoutingHeaderTrait            ,
        SecurityHeaderTrait           ,
        WebSocketHeaderTrait          ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

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
    public static function has( string $name ): bool
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
    public static function remove( string $name ): void
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
