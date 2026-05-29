<?php

namespace oihana\enums\http\headers;

/**
 * Observability / tracing HTTP header names.
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ObservabilityHeaderTrait
{
    /**
     * `Server-Timing` — Server-side performance metrics for the response (W3C).
     */
    public const string SERVER_TIMING = 'Server-Timing' ;

    /**
     * `Timing-Allow-Origin` — Origins allowed to read detailed Resource Timing data (W3C).
     */
    public const string TIMING_ALLOW_ORIGIN = 'Timing-Allow-Origin' ;

    /**
     * `traceparent` — W3C Trace Context: incoming trace and parent span identifiers.
     */
    public const string TRACEPARENT = 'traceparent' ;

    /**
     * `tracestate` — W3C Trace Context: vendor-specific trace state.
     */
    public const string TRACESTATE = 'tracestate' ;

    /**
     * `X-Correlation-Id` — Correlates requests across services (de-facto).
     */
    public const string X_CORRELATION_ID = 'X-Correlation-Id' ;

    /**
     * `X-Request-Id` — Unique identifier of the request (de-facto).
     */
    public const string X_REQUEST_ID = 'X-Request-Id' ;

    /**
     * `X-Response-Time` — Time taken to produce the response (de-facto, Express/Koa).
     */
    public const string X_RESPONSE_TIME = 'X-Response-Time' ;
}
