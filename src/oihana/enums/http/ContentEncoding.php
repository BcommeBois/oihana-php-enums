<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of HTTP content codings.
 *
 * These are the values carried by the `Content-Encoding`, `Accept-Encoding`
 * and `Transfer-Encoding` headers (RFC 9110 §8.4.1), as registered in the
 * IANA HTTP Content Coding Registry.
 *
 * Example:
 * ```php
 * $response->withHeader( HttpHeader::CONTENT_ENCODING , ContentEncoding::GZIP ) ;
 * ```
 *
 * @see HttpHeader::CONTENT_ENCODING
 * @see HttpHeader::ACCEPT_ENCODING
 * @see https://www.iana.org/assignments/http-parameters/http-parameters.xhtml#content-coding
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class ContentEncoding
{
    use ConstantsTrait ;

    /** `gzip` — LZ77 with a 32-bit CRC, the Lempel-Ziv coding (RFC 1952). */
    public const string GZIP = 'gzip' ;

    /** `compress` — LZW coding (UNIX `compress`). Rarely used today. */
    public const string COMPRESS = 'compress' ;

    /** `deflate` — zlib data format (RFC 1950 / RFC 1951). */
    public const string DEFLATE = 'deflate' ;

    /** `br` — Brotli coding (RFC 7932). */
    public const string BR = 'br' ;

    /** `zstd` — Zstandard coding (RFC 8878). */
    public const string ZSTD = 'zstd' ;

    /** `identity` — No transformation; only meaningful in `Accept-Encoding`. */
    public const string IDENTITY = 'identity' ;
}
