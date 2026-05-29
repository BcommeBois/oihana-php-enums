<?php

namespace oihana\enums\http\headers;

/**
 * Request context HTTP header names (client identity and intent).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait RequestContextHeaderTrait
{
    /**
     * `DNT` — Legacy "Do Not Track" preference (deprecated).
     */
    public const string DNT = 'DNT' ;

    /**
     * `Origin` — Origin that caused the request, sent for CORS and POST (RFC 9110 §7.8 / Fetch).
     */
    public const string ORIGIN = 'Origin' ;

    /**
     * `Referer` — Address of the page from which the request was made (RFC 9110 §10.1.3).
     */
    public const string REFERER = 'Referer' ;

    /**
     * `Upgrade-Insecure-Requests` — Signals the client's preference for an encrypted response.
     */
    public const string UPGRADE_INSECURE_REQUESTS = 'Upgrade-Insecure-Requests' ;

    /**
     * `User-Agent` — Product tokens identifying the client software (RFC 9110 §10.1.5).
     */
    public const string USER_AGENT = 'User-Agent' ;

    /**
     * `X-Requested-With` — De-facto AJAX marker, usually `XMLHttpRequest`.
     */
    public const string X_REQUESTED_WITH = 'X-Requested-With' ;
}
