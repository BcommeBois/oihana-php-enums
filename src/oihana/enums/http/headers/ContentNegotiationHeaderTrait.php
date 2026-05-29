<?php

namespace oihana\enums\http\headers;

/**
 * Content negotiation HTTP header names (RFC 9110 §12).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ContentNegotiationHeaderTrait
{
    /**
     * `Accept` — Media types acceptable for the response (RFC 9110 §12.5.1).
     */
    public const string ACCEPT = 'Accept' ;

    /**
     * `Accept-Charset` — Charsets acceptable for the response (RFC 9110 §12.5.2, deprecated).
     */
    public const string ACCEPT_CHARSET = 'Accept-Charset' ;

    /**
     * `Accept-Encoding` — Content codings acceptable for the response (RFC 9110 §12.5.3).
     */
    public const string ACCEPT_ENCODING = 'Accept-Encoding' ;

    /**
     * `Accept-Language` — Natural languages preferred for the response (RFC 9110 §12.5.4).
     */
    public const string ACCEPT_LANGUAGE = 'Accept-Language' ;

    /**
     * `Accept-Patch` — Patch document media types supported by the resource (RFC 5789).
     */
    public const string ACCEPT_PATCH = 'Accept-Patch' ;

    /**
     * `Accept-Post` — Media types accepted by the server in a POST request (W3C LDP).
     */
    public const string ACCEPT_POST = 'Accept-Post' ;
}
