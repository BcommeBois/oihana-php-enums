<?php

namespace oihana\enums\http\headers;

/**
 * Content / representation metadata HTTP header names (RFC 9110 §8).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ContentHeaderTrait
{
    /**
     * `Allow` — Set of methods supported by the target resource (RFC 9110 §10.2.1).
     */
    public const string ALLOW = 'Allow' ;

    /**
     * `Content-Disposition` — How the payload should be handled (inline, attachment) (RFC 6266).
     */
    public const string CONTENT_DISPOSITION = 'Content-Disposition' ;

    /**
     * `Content-Encoding` — Content codings applied to the representation (RFC 9110 §8.4).
     */
    public const string CONTENT_ENCODING = 'Content-Encoding' ;

    /**
     * `Content-Language` — Natural language(s) of the representation (RFC 9110 §8.5).
     */
    public const string CONTENT_LANGUAGE = 'Content-Language' ;

    /**
     * `Content-Length` — Size of the representation body in bytes (RFC 9110 §8.6).
     */
    public const string CONTENT_LENGTH = 'Content-Length' ;

    /**
     * `Content-Location` — URL where the representation can be found (RFC 9110 §8.7).
     */
    public const string CONTENT_LOCATION = 'Content-Location' ;

    /**
     * `Content-Range` — Where a partial body belongs in the full representation (RFC 9110 §14.4).
     */
    public const string CONTENT_RANGE = 'Content-Range' ;

    /**
     * `Content-Type` — Media type of the representation (RFC 9110 §8.3).
     */
    public const string CONTENT_TYPE = 'Content-Type' ;

    /**
     * `Last-Modified` — Date/time the representation was last modified (RFC 9110 §8.8.2).
     */
    public const string LAST_MODIFIED = 'Last-Modified' ;

    /**
     * `Vary` — Request headers that influenced content negotiation (RFC 9110 §12.5.5).
     */
    public const string VARY = 'Vary' ;
}
