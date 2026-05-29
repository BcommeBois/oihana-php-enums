<?php

namespace oihana\enums\http\headers;

/**
 * Fetch Metadata request HTTP header names (W3C Fetch Metadata).
 *
 * Browser-set `Sec-Fetch-*` headers describing the context of a request, used
 * server-side as a defence against CSRF, clickjacking and cross-site leaks.
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait FetchMetadataHeaderTrait
{
    /**
     * `Sec-Fetch-Dest` — Destination of the request (`document`, `image`, `script`, …).
     */
    public const string SEC_FETCH_DEST = 'Sec-Fetch-Dest' ;

    /**
     * `Sec-Fetch-Mode` — Request mode (`navigate`, `cors`, `no-cors`, `same-origin`, …).
     */
    public const string SEC_FETCH_MODE = 'Sec-Fetch-Mode' ;

    /**
     * `Sec-Fetch-Site` — Relationship between origin and target (`same-origin`, `cross-site`, …).
     */
    public const string SEC_FETCH_SITE = 'Sec-Fetch-Site' ;

    /**
     * `Sec-Fetch-User` — Set to `?1` when the request was triggered by a user activation.
     */
    public const string SEC_FETCH_USER = 'Sec-Fetch-User' ;
}
