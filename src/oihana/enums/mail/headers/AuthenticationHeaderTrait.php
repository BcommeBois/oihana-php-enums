<?php

namespace oihana\enums\mail\headers;

/**
 * Authentication / deliverability header field names
 * (RFC 6376 DKIM, RFC 8601 Authentication-Results, RFC 8617 ARC, RFC 3834).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait AuthenticationHeaderTrait
{
    /**
     * `ARC-Authentication-Results` — ARC authentication results (RFC 8617; may repeat).
     */
    public const string ARC_AUTHENTICATION_RESULTS = 'ARC-Authentication-Results' ;

    /**
     * `ARC-Message-Signature` — ARC message signature (RFC 8617; may repeat).
     */
    public const string ARC_MESSAGE_SIGNATURE = 'ARC-Message-Signature' ;

    /**
     * `ARC-Seal` — Authenticated Received Chain seal (RFC 8617; may repeat).
     */
    public const string ARC_SEAL = 'ARC-Seal' ;

    /**
     * `Authentication-Results` — SPF/DKIM/DMARC results recorded by a receiver (RFC 8601; may repeat).
     */
    public const string AUTHENTICATION_RESULTS = 'Authentication-Results' ;

    /**
     * `Auto-Submitted` — Marks automatically generated messages to prevent loops (RFC 3834).
     */
    public const string AUTO_SUBMITTED = 'Auto-Submitted' ;

    /**
     * `DKIM-Signature` — DomainKeys Identified Mail signature (RFC 6376; may repeat).
     */
    public const string DKIM_SIGNATURE = 'DKIM-Signature' ;
}
