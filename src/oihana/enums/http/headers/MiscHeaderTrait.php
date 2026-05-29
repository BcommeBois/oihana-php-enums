<?php

namespace oihana\enums\http\headers;

/**
 * Miscellaneous modern HTTP header names.
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait MiscHeaderTrait
{
    /**
     * `Alt-Svc` — Alternative services (e.g. HTTP/3) available for the origin (RFC 7838).
     */
    public const string ALT_SVC = 'Alt-Svc' ;

    /**
     * `103 Early Hints` — Informational status hinting at resources to preload (RFC 8297).
     */
    public const string EARLY_HINTS = '103 Early Hints' ;
}
