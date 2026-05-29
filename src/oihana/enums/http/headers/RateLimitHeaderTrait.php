<?php

namespace oihana\enums\http\headers;

/**
 * Rate limiting HTTP header names (de-facto + IETF draft).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait RateLimitHeaderTrait
{
    /**
     * `RateLimit-Limit` — Request quota for the window (IETF draft).
     */
    public const string RATELIMIT_LIMIT = 'RateLimit-Limit' ;

    /**
     * `RateLimit-Remaining` — Remaining quota in the current window (IETF draft).
     */
    public const string RATELIMIT_REMAINING = 'RateLimit-Remaining' ;

    /**
     * `RateLimit-Reset` — Time until the quota resets (IETF draft).
     */
    public const string RATELIMIT_RESET = 'RateLimit-Reset' ;

    /**
     * `X-RateLimit-Limit` — Request quota for the window (de-facto).
     */
    public const string X_RATELIMIT_LIMIT = 'X-RateLimit-Limit' ;

    /**
     * `X-RateLimit-Remaining` — Remaining quota in the current window (de-facto).
     */
    public const string X_RATELIMIT_REMAINING = 'X-RateLimit-Remaining' ;

    /**
     * `X-RateLimit-Reset` — Time until the quota resets (de-facto).
     */
    public const string X_RATELIMIT_RESET = 'X-RateLimit-Reset' ;
}
