<?php

namespace oihana\enums\mail\headers;

/**
 * Informational header field names (RFC 5322 §3.6.5).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait InformationalHeaderTrait
{
    /**
     * `Comments` — Additional comments on the message body (may repeat).
     */
    public const string COMMENTS = 'Comments' ;

    /**
     * `Keywords` — Comma-separated list of keywords / phrases (may repeat).
     */
    public const string KEYWORDS = 'Keywords' ;

    /**
     * `Subject` — Topic of the message.
     */
    public const string SUBJECT = 'Subject' ;
}
