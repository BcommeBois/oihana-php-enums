<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * SMTP reply codes (RFC 5321 §4.2, with RFC 4954 / 7504 extensions).
 *
 * The three-digit reply returned by an SMTP server after each command. The
 * leading digit defines the outcome class:
 *
 * | 2yz | Positive completion — command accepted        |
 * | 3yz | Positive intermediate — more input expected   |
 * | 4yz | Transient negative — try again later          |
 * | 5yz | Permanent negative — do not retry (bounce)    |
 *
 * Constants are grouped by class and ordered by value, mirroring
 * {@see \oihana\enums\http\HttpStatusCode}.
 *
 * ```php
 * SmtpReplyCode::getType    ( 250 ) ; // 'Positive Completion'
 * SmtpReplyCode::isTransient( 451 ) ; // true  (retry)
 * SmtpReplyCode::isPermanent( 550 ) ; // true  (bounce)
 * ```
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see EnhancedStatusCode For the finer-grained `X.Y.Z` status codes (RFC 3463).
 */
class SmtpReplyCode
{
    use ConstantsTrait ;

    // ------- 2yz Positive completion

    const int SYSTEM_STATUS                = 211 ;
    const int HELP                         = 214 ;
    const int SERVICE_READY                = 220 ;
    const int SERVICE_CLOSING              = 221 ;
    const int AUTH_SUCCESSFUL              = 235 ;
    const int OK                           = 250 ;
    const int USER_NOT_LOCAL_WILL_FORWARD  = 251 ;
    const int CANNOT_VERIFY                = 252 ;

    // ------- 3yz Positive intermediate

    const int AUTH_CHALLENGE               = 334 ;
    const int START_MAIL_INPUT             = 354 ;

    // ------- 4yz Transient negative (retry)

    const int SERVICE_NOT_AVAILABLE         = 421 ;
    const int PASSWORD_TRANSITION_NEEDED    = 432 ;
    const int MAILBOX_UNAVAILABLE           = 450 ;
    const int LOCAL_ERROR                   = 451 ;
    const int INSUFFICIENT_STORAGE          = 452 ;
    const int TEMPORARY_AUTH_FAILURE        = 454 ;
    const int CANNOT_ACCOMMODATE_PARAMETERS = 455 ;

    // ------- 5yz Permanent negative (bounce)

    const int SYNTAX_ERROR                 = 500 ;
    const int SYNTAX_ERROR_IN_PARAMETERS   = 501 ;
    const int COMMAND_NOT_IMPLEMENTED      = 502 ;
    const int BAD_SEQUENCE                 = 503 ;
    const int PARAMETER_NOT_IMPLEMENTED    = 504 ;
    const int DOES_NOT_ACCEPT_MAIL         = 521 ;
    const int AUTH_REQUIRED                = 530 ;
    const int AUTH_INVALID                 = 535 ;
    const int ENCRYPTION_REQUIRED          = 538 ;
    const int MAILBOX_NOT_FOUND            = 550 ;
    const int USER_NOT_LOCAL               = 551 ;
    const int EXCEEDED_STORAGE             = 552 ;
    const int MAILBOX_NAME_NOT_ALLOWED     = 553 ;
    const int TRANSACTION_FAILED           = 554 ;
    const int DOMAIN_DOES_NOT_ACCEPT_MAIL  = 556 ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Returns a short human-readable description of a reply code.
     *
     * @param int|string $code The reply code.
     * @return string|null The description, or `null` when the code is unknown.
     */
    public static function getDescription( int|string $code ): ?string
    {
        return match ( (int) $code )
        {
            self::SYSTEM_STATUS                 => 'System status, or system help reply' ,
            self::HELP                          => 'Help message' ,
            self::SERVICE_READY                 => 'Service ready' ,
            self::SERVICE_CLOSING               => 'Service closing transmission channel' ,
            self::AUTH_SUCCESSFUL               => 'Authentication successful' ,
            self::OK                            => 'Requested mail action okay, completed' ,
            self::USER_NOT_LOCAL_WILL_FORWARD   => 'User not local; will forward' ,
            self::CANNOT_VERIFY                 => 'Cannot verify user, but will accept message and attempt delivery' ,
            self::AUTH_CHALLENGE                => 'Server challenge (authentication exchange)' ,
            self::START_MAIL_INPUT              => 'Start mail input; end with <CRLF>.<CRLF>' ,
            self::SERVICE_NOT_AVAILABLE         => 'Service not available, closing transmission channel' ,
            self::PASSWORD_TRANSITION_NEEDED    => 'A password transition is needed' ,
            self::MAILBOX_UNAVAILABLE           => 'Requested mail action not taken: mailbox unavailable (busy)' ,
            self::LOCAL_ERROR                   => 'Requested action aborted: local error in processing' ,
            self::INSUFFICIENT_STORAGE          => 'Requested action not taken: insufficient system storage' ,
            self::TEMPORARY_AUTH_FAILURE        => 'Temporary authentication failure' ,
            self::CANNOT_ACCOMMODATE_PARAMETERS => 'Server unable to accommodate parameters' ,
            self::SYNTAX_ERROR                  => 'Syntax error, command unrecognized' ,
            self::SYNTAX_ERROR_IN_PARAMETERS    => 'Syntax error in parameters or arguments' ,
            self::COMMAND_NOT_IMPLEMENTED       => 'Command not implemented' ,
            self::BAD_SEQUENCE                  => 'Bad sequence of commands' ,
            self::PARAMETER_NOT_IMPLEMENTED     => 'Command parameter not implemented' ,
            self::DOES_NOT_ACCEPT_MAIL          => 'Server does not accept mail' ,
            self::AUTH_REQUIRED                 => 'Authentication required' ,
            self::AUTH_INVALID                  => 'Authentication credentials invalid' ,
            self::ENCRYPTION_REQUIRED           => 'Encryption required for requested authentication mechanism' ,
            self::MAILBOX_NOT_FOUND             => 'Requested action not taken: mailbox unavailable (not found / no access)' ,
            self::USER_NOT_LOCAL                => 'User not local; please try a different path' ,
            self::EXCEEDED_STORAGE              => 'Requested mail action aborted: exceeded storage allocation' ,
            self::MAILBOX_NAME_NOT_ALLOWED      => 'Requested action not taken: mailbox name not allowed' ,
            self::TRANSACTION_FAILED            => 'Transaction failed' ,
            self::DOMAIN_DOES_NOT_ACCEPT_MAIL   => 'Domain does not accept mail' ,
            default                             => null ,
        } ;
    }

    /**
     * Returns the outcome class of a reply code.
     *
     * @param int|string $code The reply code.
     * @return string|null One of `Positive Completion`, `Positive Intermediate`,
     *                      `Transient Negative` or `Permanent Negative`; `null` if out of range.
     */
    public static function getType( int|string $code ): ?string
    {
        return match ( intdiv( (int) $code , 100 ) )
        {
            2       => 'Positive Completion' ,
            3       => 'Positive Intermediate' ,
            4       => 'Transient Negative' ,
            5       => 'Permanent Negative' ,
            default => null ,
        } ;
    }

    /**
     * Whether the code is a permanent negative (`5yz`) — the message bounced
     * and must not be retried.
     *
     * @param int|string $code The reply code.
     * @return bool
     */
    public static function isPermanent( int|string $code ): bool
    {
        return intdiv( (int) $code , 100 ) === 5 ;
    }

    /**
     * Whether the code is positive (`2yz` completion or `3yz` intermediate).
     *
     * @param int|string $code The reply code.
     * @return bool
     */
    public static function isPositive( int|string $code ): bool
    {
        return match ( intdiv( (int) $code , 100 ) )
        {
            2 , 3   => true ,
            default => false ,
        } ;
    }

    /**
     * Whether the code is a transient negative (`4yz`) — delivery failed for
     * now but may succeed if retried later.
     *
     * @param int|string $code The reply code.
     * @return bool
     */
    public static function isTransient( int|string $code ): bool
    {
        return intdiv( (int) $code , 100 ) === 4 ;
    }
}
