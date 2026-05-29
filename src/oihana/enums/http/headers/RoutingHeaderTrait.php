<?php

namespace oihana\enums\http\headers;

/**
 * Message routing & transport HTTP header names (RFC 9110 / RFC 9112).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait RoutingHeaderTrait
{
    /**
     * `Connection` — Control options for the current connection (RFC 9110 §7.6.1).
     */
    public const string CONNECTION = 'Connection' ;

    /**
     * `Date` — Date and time the message was originated (RFC 9110 §6.6.1).
     */
    public const string DATE = 'Date' ;

    /**
     * `Expect` — Expectations the server must meet, e.g. `100-continue` (RFC 9110 §10.1.1).
     */
    public const string EXPECT = 'Expect' ;

    /**
     * `Forwarded` — Proxy disclosure of the originating client and chain (RFC 7239).
     */
    public const string FORWARDED = 'Forwarded' ;

    /**
     * `From` — E-mail address of the human controlling the user agent (RFC 9110 §10.1.2).
     */
    public const string FROM = 'From' ;

    /**
     * `Host` — Target host and port of the request (RFC 9110 §7.2).
     */
    public const string HOST = 'Host' ;

    /**
     * `Keep-Alive` — Parameters for a persistent connection (RFC 9112).
     */
    public const string KEEP_ALIVE = 'Keep-Alive' ;

    /**
     * `Link` — Typed relationships to other resources (RFC 8288).
     */
    public const string LINK = 'Link' ;

    /**
     * `Location` — URL to redirect to, or of a newly created resource (RFC 9110 §10.2.2).
     */
    public const string LOCATION = 'Location' ;

    /**
     * `Max-Forwards` — Hop limit for TRACE and OPTIONS requests (RFC 9110 §7.6.2).
     */
    public const string MAX_FORWARDS = 'Max-Forwards' ;

    /**
     * `Server` — Software used by the origin server (RFC 9110 §10.2.4).
     */
    public const string SERVER = 'Server' ;

    /**
     * `TE` — Transfer codings the client is willing to accept (RFC 9110 §10.1.4).
     */
    public const string TE = 'TE' ;

    /**
     * `Trailer` — Names of fields present in the trailer section (RFC 9110 §6.6.2).
     */
    public const string TRAILER = 'Trailer' ;

    /**
     * `Transfer-Encoding` — Transfer codings applied to the message body (RFC 9112 §6.1).
     */
    public const string TRANSFER_ENCODING = 'Transfer-Encoding' ;

    /**
     * `Upgrade` — Request to switch to a different protocol (RFC 9110 §7.8).
     */
    public const string UPGRADE = 'Upgrade' ;

    /**
     * `Via` — Intermediaries (proxies, gateways) traversed by the message (RFC 9110 §7.6.3).
     */
    public const string VIA = 'Via' ;
}
