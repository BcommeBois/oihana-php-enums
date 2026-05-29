<?php

namespace oihana\enums\http\headers;

/**
 * Authentication & authorization HTTP header names (RFC 9110 §11).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait AuthenticationHeaderTrait
{
    /**
     * `Authorization` — Credentials authenticating the user agent (RFC 9110 §11.6.2).
     */
    public const string AUTHORIZATION = 'Authorization' ;

    /**
     * `Proxy-Authenticate` — Authentication challenge from a proxy (RFC 9110 §11.7.1).
     */
    public const string PROXY_AUTHENTICATE = 'Proxy-Authenticate' ;

    /**
     * `Proxy-Authorization` — Credentials for a proxy (RFC 9110 §11.7.2).
     */
    public const string PROXY_AUTHORIZATION = 'Proxy-Authorization' ;

    /**
     * `WWW-Authenticate` — Authentication challenge from the server (RFC 9110 §11.6.1).
     */
    public const string WWW_AUTHENTICATE = 'WWW-Authenticate' ;
}
