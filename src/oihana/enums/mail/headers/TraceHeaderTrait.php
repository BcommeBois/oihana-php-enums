<?php

namespace oihana\enums\mail\headers;

/**
 * Trace header field names (RFC 5322 §3.6.7, RFC 5321 §4.4, RFC 7208).
 *
 * Trace fields are prepended by mail transfer agents and may appear
 * multiple times.
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait TraceHeaderTrait
{
    /**
     * `Received` — Trace of an MTA that handled the message (may repeat).
     */
    public const string RECEIVED = 'Received' ;

    /**
     * `Received-SPF` — Result of an SPF check performed by a receiver (RFC 7208).
     */
    public const string RECEIVED_SPF = 'Received-SPF' ;

    /**
     * `Return-Path` — Reverse-path (envelope sender) recorded at final delivery.
     */
    public const string RETURN_PATH = 'Return-Path' ;
}
