<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Values of the `Auto-Submitted` header field (RFC 3834, RFC 5436).
 *
 * Marks how a message was produced so that automated responders can avoid
 * mail loops: an auto-responder MUST NOT reply to a message that already
 * carries an `Auto-Submitted` value other than `no`.
 *
 * ```php
 * if ( AutoSubmitted::isAutomated( $headerValue ) )
 * {
 *     return ; // do not auto-reply
 * }
 * ```
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see MailHeader::AUTO_SUBMITTED
 */
class AutoSubmitted
{
    use ConstantsTrait ;

    /**
     * `auto-generated` — Produced automatically (notifications, mailing lists, …).
     */
    public const string AUTO_GENERATED = 'auto-generated' ;

    /**
     * `auto-notified` — A notification generated automatically (RFC 5436).
     */
    public const string AUTO_NOTIFIED = 'auto-notified' ;

    /**
     * `auto-replied` — An automatic reply (vacation / out-of-office responders).
     */
    public const string AUTO_REPLIED = 'auto-replied' ;

    /**
     * `no` — Authored by a human; not automatically submitted.
     */
    public const string NO = 'no' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Whether a header value marks the message as automatically submitted
     * (anything other than `no`), and therefore must not be auto-replied to.
     *
     * @param string $value An `Auto-Submitted` value (case-insensitive).
     * @return bool `true` for the `auto-*` values, `false` for `no` / empty / unknown.
     */
    public static function isAutomated( string $value ): bool
    {
        return match ( strtolower( trim( $value ) ) )
        {
            self::AUTO_GENERATED , self::AUTO_NOTIFIED , self::AUTO_REPLIED => true ,
            default                                                        => false ,
        } ;
    }
}
