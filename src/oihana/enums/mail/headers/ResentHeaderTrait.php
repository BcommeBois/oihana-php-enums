<?php

namespace oihana\enums\mail\headers;

/**
 * Resent header field names (RFC 5322 §3.6.6).
 *
 * Resent fields are used when a message is reintroduced into the transport
 * system by a user. Each resending adds a new block, so these fields may
 * appear multiple times.
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait ResentHeaderTrait
{
    /**
     * `Resent-Bcc` — Blind carbon-copy recipient(s) of the resending.
     */
    public const string RESENT_BCC = 'Resent-Bcc' ;

    /**
     * `Resent-Cc` — Carbon-copy recipient(s) of the resending.
     */
    public const string RESENT_CC = 'Resent-Cc' ;

    /**
     * `Resent-Date` — Date the message was resent.
     */
    public const string RESENT_DATE = 'Resent-Date' ;

    /**
     * `Resent-From` — Author(s) of the resending.
     */
    public const string RESENT_FROM = 'Resent-From' ;

    /**
     * `Resent-Message-ID` — Unique identifier of the resending.
     */
    public const string RESENT_MESSAGE_ID = 'Resent-Message-ID' ;

    /**
     * `Resent-Sender` — Agent responsible for the resending.
     */
    public const string RESENT_SENDER = 'Resent-Sender' ;

    /**
     * `Resent-To` — Primary recipient(s) of the resending.
     */
    public const string RESENT_TO = 'Resent-To' ;
}
