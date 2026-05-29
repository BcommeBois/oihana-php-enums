<?php

namespace oihana\enums\http\headers;

/**
 * Range request / download HTTP header names (RFC 9110 §14).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait RangeHeaderTrait
{
    /**
     * `Accept-Ranges` — Range units the server supports for a resource (RFC 9110 §14.3).
     */
    public const string ACCEPT_RANGES = 'Accept-Ranges' ;

    /**
     * `Range` — Requests one or more sub-ranges of the representation (RFC 9110 §14.2).
     */
    public const string RANGE = 'Range' ;

    /**
     * `Retry-After` — How long to wait before making a follow-up request (RFC 9110 §10.2.3).
     */
    public const string RETRY_AFTER = 'Retry-After' ;
}
