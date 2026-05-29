<?php

namespace oihana\enums\http\headers;

/**
 * Content integrity / digest HTTP header names (RFC 9530).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait IntegrityHeaderTrait
{
    /**
     * `Content-Digest` — Digest of the actual message content (RFC 9530).
     */
    public const string CONTENT_DIGEST = 'Content-Digest' ;

    /**
     * `Repr-Digest` — Digest of the selected representation, independent of encoding (RFC 9530).
     */
    public const string REPR_DIGEST = 'Repr-Digest' ;

    /**
     * `Want-Content-Digest` — Requests a `Content-Digest` in the response (RFC 9530).
     */
    public const string WANT_CONTENT_DIGEST = 'Want-Content-Digest' ;

    /**
     * `Want-Repr-Digest` — Requests a `Repr-Digest` in the response (RFC 9530).
     */
    public const string WANT_REPR_DIGEST = 'Want-Repr-Digest' ;
}
