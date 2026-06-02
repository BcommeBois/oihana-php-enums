<?php

namespace oihana\enums\mail\headers;

/**
 * Destination address header field names (RFC 5322 §3.6.3).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait DestinationHeaderTrait
{
    /**
     * `Bcc` — Blind carbon-copy recipient(s); removed before delivery.
     */
    public const string BCC = 'Bcc' ;

    /**
     * `Cc` — Carbon-copy recipient(s).
     */
    public const string CC = 'Cc' ;

    /**
     * `To` — Primary recipient(s) of the message.
     */
    public const string TO = 'To' ;
}
