<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of common URI schemes (the part before `://`).
 *
 * Values are lowercased — the canonical form returned by PHP's
 * `parse_url()` and recommended by RFC 3986 §3.1 (schemes are
 * case-insensitive but conventionally written lowercase).
 *
 * @package oihana\enums\http
 * @author  Marc Alcaraz
 *
 * @see UrlComponent
 */
class UriScheme
{
    use ConstantsTrait ;

    /**
     * File Transfer Protocol. Default port `21`.
     */
    public const string FTP = 'ftp' ;

    /**
     * HyperText Transfer Protocol (cleartext). Default port `80`.
     */
    public const string HTTP = 'http' ;

    /**
     * HTTP over TLS. Default port `443`.
     */
    public const string HTTPS = 'https' ;

    /**
     * WebSocket (cleartext). Default port `80`.
     */
    public const string WS = 'ws' ;

    /**
     * WebSocket over TLS. Default port `443`.
     */
    public const string WSS = 'wss' ;

    /**
     * Returns the default TCP port for a scheme, or `null` when the
     * scheme has no well-known default.
     *
     * Lets callers drop a redundant port when canonicalising a URL
     * (`https://host:443/` → `https://host/`).
     *
     * @param string $scheme One of the class constants (case-insensitive).
     * @return int|null The default port, or `null` if unknown.
     */
    public static function defaultPort( string $scheme ): ?int
    {
        return match ( strtolower( $scheme ) )
        {
            self::HTTP  , self::WS  => 80 ,
            self::HTTPS , self::WSS => 443 ,
            self::FTP               => 21 ,
            default                 => null ,
        } ;
    }
}