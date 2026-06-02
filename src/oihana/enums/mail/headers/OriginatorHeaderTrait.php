<?php

namespace oihana\enums\mail\headers;

/**
 * Originator header field names (RFC 5322 §3.6.2).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait OriginatorHeaderTrait
{
    /**
     * `Date` — Origination date of the message (RFC 5322 §3.6.1).
     */
    public const string DATE = 'Date' ;

    /**
     * `From` — Author(s) of the message (RFC 5322 §3.6.2).
     */
    public const string FROM = 'From' ;

    /**
     * `Reply-To` — Mailbox(es) to which replies should be sent.
     */
    public const string REPLY_TO = 'Reply-To' ;

    /**
     * `Sender` — Mailbox of the agent responsible for the actual transmission.
     */
    public const string SENDER = 'Sender' ;
}
