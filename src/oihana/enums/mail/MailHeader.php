<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

use oihana\enums\mail\headers\AuthenticationHeaderTrait;
use oihana\enums\mail\headers\DestinationHeaderTrait;
use oihana\enums\mail\headers\IdentificationHeaderTrait;
use oihana\enums\mail\headers\InformationalHeaderTrait;
use oihana\enums\mail\headers\ListHeaderTrait;
use oihana\enums\mail\headers\MimeHeaderTrait;
use oihana\enums\mail\headers\MiscHeaderTrait;
use oihana\enums\mail\headers\NotificationHeaderTrait;
use oihana\enums\mail\headers\OriginatorHeaderTrait;
use oihana\enums\mail\headers\PriorityHeaderTrait;
use oihana\enums\mail\headers\ResentHeaderTrait;
use oihana\enums\mail\headers\TraceHeaderTrait;

/**
 * Enumeration of standard email header field names (RFC 5322 and friends).
 *
 * The constants preserve the canonical wire-format casing from the relevant
 * RFCs (5322, 2045, 2369/2919/8058, 6376, 8601, 8617, 8098, 3834). They are
 * organised by domain into composable traits living in
 * {@see \oihana\enums\mail\headers}; this class simply `use`s them all and
 * adds helper methods. Use a single category trait directly when you only
 * need part of the set.
 *
 * Unlike {@see \oihana\enums\http\HttpHeader} — whose helpers act on the
 * PHP response sink (`headers_list()` / `header()`) — email is built in
 * memory, so the helpers here operate on an in-memory header **map**
 * (`array<string,string>`). Lookups are case-insensitive per RFC 5322 §2.2:
 *
 * ```php
 * $headers = MailHeader::set( [] , MailHeader::SUBJECT , 'Hello' ) ;
 * MailHeader::has( $headers , 'subject' ) ;          // true (case-insensitive)
 * MailHeader::get( $headers , 'SUBJECT' ) ;          // 'Hello'
 * MailHeader::normalize( 'message-id' ) ;            // 'Message-ID'
 * MailHeader::canRepeat( MailHeader::RECEIVED ) ;    // true
 * ```
 *
 * The {@see ConstantsTrait} utilities remain available:
 * - `MailHeader::enums()` returns all header names
 * - `MailHeader::includes('Subject')` checks existence (exact, case-sensitive)
 * - `MailHeader::getConstant('Subject')` returns the constant name
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
class MailHeader
{
    use ConstantsTrait             ,
        AuthenticationHeaderTrait  ,
        DestinationHeaderTrait     ,
        IdentificationHeaderTrait  ,
        InformationalHeaderTrait   ,
        ListHeaderTrait            ,
        MimeHeaderTrait            ,
        MiscHeaderTrait            ,
        NotificationHeaderTrait    ,
        OriginatorHeaderTrait      ,
        PriorityHeaderTrait        ,
        ResentHeaderTrait          ,
        TraceHeaderTrait           ;

    // -------------------------------------------------------------------------
    // Helpers (operate on an in-memory header map, not a runtime sink)
    // -------------------------------------------------------------------------

    /**
     * Returns a copy of the header map with every key rewritten to its
     * canonical casing (see {@see self::normalize()}).
     *
     * @param array<string,string> $headers The source header map.
     * @return array<string,string> A new map with canonical header names.
     */
    public static function all( array $headers ): array
    {
        $result = [] ;
        foreach ( $headers as $key => $value )
        {
            $result[ self::normalize( (string) $key ) ] = $value ;
        }
        return $result ;
    }

    /**
     * Whether a header may legitimately appear more than once in a message
     * (trace fields, resent blocks, signatures, free-form comments…).
     *
     * @param string $name The header name (case-insensitive).
     * @return bool True if multiple occurrences are allowed.
     */
    public static function canRepeat( string $name ): bool
    {
        return match ( self::normalize( $name ) )
        {
            self::ARC_AUTHENTICATION_RESULTS ,
            self::ARC_MESSAGE_SIGNATURE      ,
            self::ARC_SEAL                   ,
            self::AUTHENTICATION_RESULTS     ,
            self::COMMENTS                   ,
            self::DKIM_SIGNATURE             ,
            self::KEYWORDS                   ,
            self::RECEIVED                   ,
            self::RECEIVED_SPF               ,
            self::RESENT_BCC                 ,
            self::RESENT_CC                  ,
            self::RESENT_DATE                ,
            self::RESENT_FROM                ,
            self::RESENT_MESSAGE_ID          ,
            self::RESENT_SENDER              ,
            self::RESENT_TO                  => true ,
            default                          => false ,
        } ;
    }

    /**
     * Returns the value of a header, looked up case-insensitively.
     *
     * @param array<string,string> $headers The header map to inspect.
     * @param string               $name    The header name to look for.
     * @param string|null          $default Value returned when the header is absent.
     * @return string|null The header value, or `$default`.
     */
    public static function get( array $headers , string $name , ?string $default = null ): ?string
    {
        $lower = strtolower( $name ) ;
        foreach ( $headers as $key => $value )
        {
            if ( strtolower( (string) $key ) === $lower )
            {
                return $value ;
            }
        }
        return $default ;
    }

    /**
     * Checks whether a header is present, case-insensitively.
     *
     * @param array<string,string> $headers The header map to inspect.
     * @param string               $name    The header name to look for.
     * @return bool True if a matching header exists.
     */
    public static function has( array $headers , string $name ): bool
    {
        $lower = strtolower( $name ) ;
        foreach ( array_keys( $headers ) as $key )
        {
            if ( strtolower( (string) $key ) === $lower )
            {
                return true ;
            }
        }
        return false ;
    }

    /**
     * Returns the canonical wire-format casing of a header name.
     *
     * Known headers are mapped to their declared constant value (e.g.
     * `message-id` → `Message-ID`, `mime-version` → `MIME-Version`);
     * unknown names fall back to `Train-Case` (`x-foo-bar` → `X-Foo-Bar`).
     *
     * @param string $name The header name in any casing.
     * @return string The canonical header name.
     */
    public static function normalize( string $name ): string
    {
        $lower = strtolower( trim( $name ) ) ;

        foreach ( self::enums() as $canonical )
        {
            if ( strtolower( $canonical ) === $lower )
            {
                return $canonical ;
            }
        }

        return implode( '-' , array_map( ucfirst( ... ) , explode( '-' , $lower ) ) ) ;
    }

    /**
     * Returns a copy of the map with every case-insensitive occurrence of a
     * header removed.
     *
     * @param array<string,string> $headers The source header map.
     * @param string               $name    The header name to remove.
     * @return array<string,string> A new map without the header.
     */
    public static function remove( array $headers , string $name ): array
    {
        $lower = strtolower( $name ) ;
        foreach ( array_keys( $headers ) as $key )
        {
            if ( strtolower( (string) $key ) === $lower )
            {
                unset( $headers[ $key ] ) ;
            }
        }
        return $headers ;
    }

    /**
     * Returns a copy of the map with the header set to a single value, using
     * canonical casing and replacing any previous case-insensitive occurrence.
     *
     * No validation is performed: custom (`X-*`) headers are intentionally
     * allowed, unlike {@see \oihana\enums\http\HttpHeader::send()}.
     *
     * @param array<string,string> $headers The source header map.
     * @param string               $name    The header name to set.
     * @param string               $value   The header value.
     * @return array<string,string> A new map with the header set.
     */
    public static function set( array $headers , string $name , string $value ): array
    {
        $headers = self::remove( $headers , $name ) ;
        $headers[ self::normalize( $name ) ] = $value ;
        return $headers ;
    }
}
