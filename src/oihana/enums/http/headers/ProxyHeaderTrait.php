<?php

namespace oihana\enums\http\headers;

/**
 * Reverse proxy / infrastructure HTTP header names (de-facto standard + CDN).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ProxyHeaderTrait
{
    /**
     * `CF-Connecting-IP` — Original client IP, added by Cloudflare.
     */
    public const string CF_CONNECTING_IP = 'CF-Connecting-IP' ;

    /**
     * `Fastly-Client-IP` — Original client IP, added by Fastly.
     */
    public const string FASTLY_CLIENT_IP = 'Fastly-Client-IP' ;

    /**
     * `True-Client-IP` — Original client IP, used by Akamai / Cloudflare Enterprise.
     */
    public const string TRUE_CLIENT_IP = 'True-Client-IP' ;

    /**
     * `X-Cluster-Client-IP` — Original client IP, added by some load balancers.
     */
    public const string X_CLUSTER_CLIENT_IP = 'X-Cluster-Client-IP' ;

    /**
     * `X-Forwarded-For` — Chain of client and proxy IP addresses (de-facto).
     */
    public const string X_FORWARDED_FOR = 'X-Forwarded-For' ;

    /**
     * `X-Forwarded-Host` — Original `Host` requested by the client (de-facto).
     */
    public const string X_FORWARDED_HOST = 'X-Forwarded-Host' ;

    /**
     * `X-Forwarded-Proto` — Original protocol (`http` / `https`) used by the client (de-facto).
     */
    public const string X_FORWARDED_PROTO = 'X-Forwarded-Proto' ;

    /**
     * `X-Real-IP` — Original client IP, added by nginx and others (de-facto).
     */
    public const string X_REAL_IP = 'X-Real-IP' ;
}
