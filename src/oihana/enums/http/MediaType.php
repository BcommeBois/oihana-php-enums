<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of commonly used IANA media types (MIME types).
 *
 * These are the values carried by the `Content-Type` and `Accept` HTTP
 * headers (RFC 9110 §8.3 / §12.5.1). Only the type/subtype is stored — use
 * {@see self::withCharset()} to append a `charset` parameter.
 *
 * Only widely used types are listed; the full registry is far larger.
 *
 * Example:
 * ```php
 * $response = $response->withHeader( HttpHeader::CONTENT_TYPE , MediaType::JSON ) ;
 * // or with a charset:
 * $response->withHeader( HttpHeader::CONTENT_TYPE , MediaType::withCharset( MediaType::HTML ) ) ;
 * ```
 *
 * @see HttpHeader::CONTENT_TYPE
 * @see HttpHeader::ACCEPT
 * @see Charset
 * @see https://www.iana.org/assignments/media-types/media-types.xhtml
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class MediaType
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // application/*
    // -------------------------------------------------------------------------

    /**
     * `application/json` — JSON payload (RFC 8259).
     */
    public const string JSON = 'application/json' ;

    /**
     * `application/problem+json` — Problem Details for HTTP APIs (RFC 9457).
     */
    public const string PROBLEM_JSON = 'application/problem+json' ;

    /**
     * `application/ld+json` — JSON-LD linked data.
     */
    public const string JSON_LD = 'application/ld+json' ;

    /**
     * `application/json-patch+json` — JSON Patch document (RFC 6902).
     */
    public const string JSON_PATCH = 'application/json-patch+json' ;

    /**
     * `application/merge-patch+json` — JSON Merge Patch document (RFC 7386).
     */
    public const string MERGE_PATCH_JSON = 'application/merge-patch+json' ;

    /**
     * `application/x-ndjson` — Newline-delimited JSON stream.
     */
    public const string NDJSON = 'application/x-ndjson' ;

    /**
     * `application/x-www-form-urlencoded` — URL-encoded form body (RFC 1866).
     */
    public const string FORM_URLENCODED = 'application/x-www-form-urlencoded' ;

    /**
     * `application/octet-stream` — Arbitrary binary data (RFC 2046).
     */
    public const string OCTET_STREAM = 'application/octet-stream' ;

    /**
     * `application/xml` — XML payload (RFC 7303).
     */
    public const string XML = 'application/xml' ;

    /**
     * `application/pdf` — Portable Document Format (RFC 8118).
     */
    public const string PDF = 'application/pdf' ;

    /**
     * `application/zip` — ZIP archive.
     */
    public const string ZIP = 'application/zip' ;

    /**
     * `application/gzip` — gzip-compressed payload (RFC 6713).
     */
    public const string GZIP = 'application/gzip' ;

    /**
     * `application/wasm` — WebAssembly binary module.
     */
    public const string WASM = 'application/wasm' ;

    /**
     * `application/jwt` — JSON Web Token (RFC 7519).
     */
    public const string JWT = 'application/jwt' ;

    /**
     * `application/jose` — JOSE object in compact serialization (RFC 7515).
     */
    public const string JOSE = 'application/jose' ;

    /**
     * `application/jose+json` — JOSE object in JSON serialization (RFC 7515).
     */
    public const string JOSE_JSON = 'application/jose+json' ;

    // -------------------------------------------------------------------------
    // text/*
    // -------------------------------------------------------------------------

    /**
     * `text/plain` — Plain text (RFC 2046).
     */
    public const string TEXT = 'text/plain' ;

    /**
     * `text/html` — HTML document.
     */
    public const string HTML = 'text/html' ;

    /**
     * `text/css` — Cascading Style Sheets.
     */
    public const string CSS = 'text/css' ;

    /**
     * `text/csv` — Comma-separated values (RFC 4180).
     */
    public const string CSV = 'text/csv' ;

    /**
     * `text/xml` — XML as text (RFC 7303).
     */
    public const string TEXT_XML = 'text/xml' ;

    /**
     * `text/javascript` — JavaScript source (RFC 9239).
     */
    public const string JAVASCRIPT = 'text/javascript' ;

    /**
     * `text/markdown` — Markdown text (RFC 7763).
     */
    public const string MARKDOWN = 'text/markdown' ;

    /**
     * `text/event-stream` — Server-Sent Events stream.
     */
    public const string EVENT_STREAM = 'text/event-stream' ;

    // -------------------------------------------------------------------------
    // multipart/*
    // -------------------------------------------------------------------------

    /**
     * `multipart/form-data` — Form submission with file parts (RFC 7578).
     */
    public const string MULTIPART_FORM_DATA = 'multipart/form-data' ;

    /**
     * `multipart/mixed` — Independent body parts (RFC 2046).
     */
    public const string MULTIPART_MIXED = 'multipart/mixed' ;

    /**
     * `multipart/related` — Compound object of related parts (RFC 2387).
     */
    public const string MULTIPART_RELATED = 'multipart/related' ;

    /**
     * `multipart/alternative` — Same content in alternative formats (RFC 2046).
     */
    public const string MULTIPART_ALTERNATIVE = 'multipart/alternative' ;

    /**
     * `multipart/byteranges` — Multiple range parts of a single document (RFC 9110).
     */
    public const string MULTIPART_BYTERANGES = 'multipart/byteranges' ;

    // -------------------------------------------------------------------------
    // image/*
    // -------------------------------------------------------------------------

    /**
     * `image/png` — PNG image.
     */
    public const string PNG = 'image/png' ;

    /**
     * `image/jpeg` — JPEG image.
     */
    public const string JPEG = 'image/jpeg' ;

    /**
     * `image/gif` — GIF image.
     */
    public const string GIF = 'image/gif' ;

    /**
     * `image/webp` — WebP image.
     */
    public const string WEBP = 'image/webp' ;

    /**
     * `image/svg+xml` — Scalable Vector Graphics.
     */
    public const string SVG = 'image/svg+xml' ;

    /**
     * `image/avif` — AV1 Image File Format.
     */
    public const string AVIF = 'image/avif' ;

    /**
     * `image/x-icon` — Windows icon (favicon).
     */
    public const string ICO = 'image/x-icon' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Appends a `charset` parameter to a media type, ready for a
     * `Content-Type` header value.
     *
     * Example:
     * ```php
     * MediaType::withCharset( MediaType::JSON );          // 'application/json; charset=utf-8'
     * MediaType::withCharset( MediaType::HTML , 'iso-8859-1' );
     * ```
     *
     * @param string $type    One of the class constants (or any media type).
     * @param string $charset The charset token. One of {@see Charset}; defaults to {@see Charset::UTF_8}.
     * @return string The media type with a `; charset=<charset>` parameter.
     */
    public static function withCharset( string $type , string $charset = Charset::UTF_8 ): string
    {
        return $type . '; charset=' . $charset ;
    }
}
