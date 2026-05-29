<?php

namespace oihana\enums\http\headers;

/**
 * Cookie HTTP header names (RFC 6265).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait CookieHeaderTrait
{
    /**
     * `Cookie` — Cookies previously stored, sent by the user agent (RFC 6265 §5.4).
     */
    public const string COOKIE = 'Cookie' ;

    /**
     * `Set-Cookie` — Instructs the user agent to store a cookie (RFC 6265 §4.1).
     */
    public const string SET_COOKIE = 'Set-Cookie' ;
}
