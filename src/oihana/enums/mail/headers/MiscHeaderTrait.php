<?php

namespace oihana\enums\mail\headers;

/**
 * Miscellaneous / commonly-seen non-standard header field names.
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait MiscHeaderTrait
{
    /**
     * `Errors-To` — Legacy address for delivery-error reports (superseded by Return-Path).
     */
    public const string ERRORS_TO = 'Errors-To' ;

    /**
     * `Organization` — Organization of the sender.
     */
    public const string ORGANIZATION = 'Organization' ;

    /**
     * `Precedence` — Legacy hint (`bulk` / `list` / `junk`) used to suppress auto-replies.
     */
    public const string PRECEDENCE = 'Precedence' ;

    /**
     * `X-Mailer` — Software that generated the message.
     */
    public const string X_MAILER = 'X-Mailer' ;
}
