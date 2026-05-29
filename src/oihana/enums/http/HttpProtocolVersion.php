<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of HTTP protocol version identifiers.
 *
 * These are the canonical version strings used in a request/status line and
 * exposed by PHP as `$_SERVER['SERVER_PROTOCOL']`.
 *
 * Note: some SAPIs report HTTP/2 as `HTTP/2.0` in `SERVER_PROTOCOL`, and the
 * ALPN protocol identifiers (`h2`, `h3`) differ from these version strings.
 *
 * Example:
 * ```php
 * if ( ( $_SERVER[ ServerParam::SERVER_PROTOCOL ] ?? '' ) === HttpProtocolVersion::HTTP_1_1 ) { ... }
 * ```
 *
 * References:
 * - RFC 9110 §2.5 (protocol versioning)
 * - RFC 9112 (HTTP/1.1), RFC 9113 (HTTP/2), RFC 9114 (HTTP/3)
 *
 * @see ServerParam::SERVER_PROTOCOL
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class HttpProtocolVersion
{
    use ConstantsTrait ;

    /**
     * `HTTP/1.0` — RFC 1945.
     */
    public const string HTTP_1_0 = 'HTTP/1.0' ;

    /**
     * `HTTP/1.1` — RFC 9112.
     */
    public const string HTTP_1_1 = 'HTTP/1.1' ;

    /**
     * `HTTP/2` — RFC 9113 (ALPN id `h2`).
     */
    public const string HTTP_2 = 'HTTP/2' ;

    /**
     * `HTTP/3` — RFC 9114 (ALPN id `h3`).
     */
    public const string HTTP_3 = 'HTTP/3' ;
}
