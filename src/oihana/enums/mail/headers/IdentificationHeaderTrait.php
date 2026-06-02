<?php

namespace oihana\enums\mail\headers;

/**
 * Identification header field names (RFC 5322 §3.6.4).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait IdentificationHeaderTrait
{
    /**
     * `In-Reply-To` — Message-ID(s) of the message(s) this one replies to.
     */
    public const string IN_REPLY_TO = 'In-Reply-To' ;

    /**
     * `Message-ID` — Unique identifier of this message.
     */
    public const string MESSAGE_ID = 'Message-ID' ;

    /**
     * `References` — Message-ID(s) identifying the conversation thread.
     */
    public const string REFERENCES = 'References' ;
}
