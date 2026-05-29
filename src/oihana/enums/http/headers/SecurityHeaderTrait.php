<?php

namespace oihana\enums\http\headers;

/**
 * Security HTTP header names (modern best practices).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait SecurityHeaderTrait
{
    /**
     * `Clear-Site-Data` — Clears browsing data (cookies, storage, cache) for the origin (W3C).
     */
    public const string CLEAR_SITE_DATA = 'Clear-Site-Data' ;

    /**
     * `Content-Security-Policy` — Controls resources the user agent may load (CSP Level 3).
     */
    public const string CONTENT_SECURITY_POLICY = 'Content-Security-Policy' ;

    /**
     * `Content-Security-Policy-Report-Only` — Monitors a CSP without enforcing it.
     */
    public const string CONTENT_SECURITY_POLICY_REPORT_ONLY = 'Content-Security-Policy-Report-Only' ;

    /**
     * `Cross-Origin-Embedder-Policy` — Requires cross-origin resources to opt in to embedding.
     */
    public const string CROSS_ORIGIN_EMBEDDER_POLICY = 'Cross-Origin-Embedder-Policy' ;

    /**
     * `Cross-Origin-Opener-Policy` — Isolates the browsing context group from cross-origin documents.
     */
    public const string CROSS_ORIGIN_OPENER_POLICY = 'Cross-Origin-Opener-Policy' ;

    /**
     * `Cross-Origin-Resource-Policy` — Restricts which origins may embed the resource.
     */
    public const string CROSS_ORIGIN_RESOURCE_POLICY = 'Cross-Origin-Resource-Policy' ;

    /**
     * `Permissions-Policy` — Enables or disables browser features for the document.
     */
    public const string PERMISSIONS_POLICY = 'Permissions-Policy' ;

    /**
     * `Referrer-Policy` — Controls how much referrer information is sent (W3C).
     */
    public const string REFERRER_POLICY = 'Referrer-Policy' ;

    /**
     * `Strict-Transport-Security` — Enforces HTTPS for future requests (HSTS, RFC 6797).
     */
    public const string STRICT_TRANSPORT_SECURITY = 'Strict-Transport-Security' ;

    /**
     * `X-Content-Type-Options` — `nosniff` disables MIME-type sniffing.
     */
    public const string X_CONTENT_TYPE_OPTIONS = 'X-Content-Type-Options' ;

    /**
     * `X-Frame-Options` — Legacy clickjacking protection, superseded by CSP `frame-ancestors`.
     */
    public const string X_FRAME_OPTIONS = 'X-Frame-Options' ;

    /**
     * `X-XSS-Protection` — Legacy XSS filter control (deprecated; prefer CSP).
     */
    public const string X_XSS_PROTECTION = 'X-XSS-Protection' ;
}
