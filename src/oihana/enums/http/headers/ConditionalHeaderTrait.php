<?php

namespace oihana\enums\http\headers;

/**
 * Conditional request HTTP header names (RFC 9110 §13).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ConditionalHeaderTrait
{
    /**
     * `ETag` — Entity tag uniquely identifying a representation (RFC 9110 §8.8.3).
     */
    public const string ETAG = 'ETag' ;

    /**
     * `If-Match` — Apply the method only if the entity tag matches (RFC 9110 §13.1.1).
     */
    public const string IF_MATCH = 'If-Match' ;

    /**
     * `If-Modified-Since` — Apply the method only if modified since the given date (RFC 9110 §13.1.3).
     */
    public const string IF_MODIFIED_SINCE = 'If-Modified-Since' ;

    /**
     * `If-None-Match` — Apply the method only if no entity tag matches (RFC 9110 §13.1.2).
     */
    public const string IF_NONE_MATCH = 'If-None-Match' ;

    /**
     * `If-Range` — Conditional range request: send the range only if unchanged (RFC 9110 §13.1.5).
     */
    public const string IF_RANGE = 'If-Range' ;

    /**
     * `If-Unmodified-Since` — Apply the method only if unmodified since the given date (RFC 9110 §13.1.4).
     */
    public const string IF_UNMODIFIED_SINCE = 'If-Unmodified-Since' ;
}
