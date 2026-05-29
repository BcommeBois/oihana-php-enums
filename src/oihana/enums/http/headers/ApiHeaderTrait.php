<?php

namespace oihana\enums\http\headers;

/**
 * REST / API lifecycle HTTP header names.
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ApiHeaderTrait
{
    /**
     * `Idempotency-Key` — Client-generated key making an unsafe request idempotent (IETF draft, de-facto).
     */
    public const string IDEMPOTENCY_KEY = 'Idempotency-Key' ;

    /**
     * `Prefer` — Preferences for how the server should handle the request (RFC 7240).
     */
    public const string PREFER = 'Prefer' ;

    /**
     * `Preference-Applied` — Indicates which `Prefer` preferences were applied (RFC 7240).
     */
    public const string PREFERENCE_APPLIED = 'Preference-Applied' ;

    /**
     * `Sunset` — Date/time at which the resource is expected to become unresponsive (RFC 8594).
     */
    public const string SUNSET = 'Sunset' ;
}
