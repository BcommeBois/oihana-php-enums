<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of `SameSite` cookie attribute values.
 *
 * The `SameSite` attribute of a `Set-Cookie` header controls whether the
 * cookie is sent with cross-site requests, mitigating CSRF and some
 * cross-site tracking. Values are case-insensitive on the wire but the
 * canonical capitalised form is kept here.
 *
 * Example:
 * ```php
 * setcookie( 'sid' , $id , [ 'samesite' => CookieSameSite::LAX , 'secure' => true ] ) ;
 * ```
 *
 * @see HttpHeader::SET_COOKIE
 * @see https://datatracker.ietf.org/doc/html/draft-ietf-httpbis-rfc6265bis
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class CookieSameSite
{
    use ConstantsTrait ;

    /**
     * `Lax` — Cookie sent on same-site requests and top-level cross-site navigations.
     */
    public const string LAX = 'Lax' ;

    /**
     * `None` — Cookie sent on all requests; requires the `Secure` attribute.
     */
    public const string NONE = 'None' ;

    /**
     * `Strict` — Cookie sent only for same-site requests.
     */
    public const string STRICT = 'Strict' ;
}
