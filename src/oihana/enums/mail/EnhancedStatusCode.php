<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enhanced mail system status codes — outcome classes (RFC 3463).
 *
 * An enhanced status code has the form `class.subject.detail` (e.g. `5.1.1`,
 * `4.2.2`, `2.0.0`). This enum carries the **class** (the leading digit),
 * which mirrors the SMTP reply class and is what most callers branch on:
 *
 * | `2` | Success                          |
 * | `4` | Persistent transient failure     |
 * | `5` | Permanent failure                |
 *
 * This is the *light* tier: only the class is enumerated. The subject digit
 * (the second field — `0` other, `1` addressing, `2` mailbox, `3` mail system,
 * `4` network, `5` protocol, `6` content, `7` security) and the detail digit
 * are exposed numerically via {@see self::subjectOf()} / {@see self::detailOf()}
 * rather than as constants. A future tier may enumerate subjects and the most
 * common full codes.
 *
 * ```php
 * EnhancedStatusCode::classOf    ( '5.1.1' ) ; // '5'
 * EnhancedStatusCode::isPermanent( '5.1.1' ) ; // true
 * EnhancedStatusCode::subjectOf  ( '5.1.1' ) ; // 1 (addressing)
 * ```
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see SmtpReplyCode For the three-digit SMTP reply codes (RFC 5321).
 */
class EnhancedStatusCode
{
    use ConstantsTrait ;

    /**
     * `5` — Permanent failure; the message will not be delivered (bounce).
     */
    public const string PERMANENT = '5' ;

    /**
     * `2` — Success; the requested action completed.
     */
    public const string SUCCESS = '2' ;

    /**
     * `4` — Persistent transient failure; the action may succeed if retried.
     */
    public const string TRANSIENT = '4' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Returns the class digit (`2` / `4` / `5`) of an enhanced status code.
     *
     * @param string $code An enhanced status code (`class.subject.detail`).
     * @return string|null The class digit, or `null` when the code is malformed.
     */
    public static function classOf( string $code ): ?string
    {
        return self::isValid( $code ) ? explode( '.' , trim( $code ) )[ 0 ] : null ;
    }

    /**
     * Returns the detail digit (third field) of an enhanced status code.
     *
     * @param string $code An enhanced status code (`class.subject.detail`).
     * @return int|null The detail number, or `null` when the code is malformed.
     */
    public static function detailOf( string $code ): ?int
    {
        return self::isValid( $code ) ? (int) explode( '.' , trim( $code ) )[ 2 ] : null ;
    }

    /**
     * Whether the code denotes a permanent failure (`5.x.x`).
     *
     * @param string $code An enhanced status code.
     * @return bool
     */
    public static function isPermanent( string $code ): bool
    {
        return self::classOf( $code ) === self::PERMANENT ;
    }

    /**
     * Whether the code denotes success (`2.x.x`).
     *
     * @param string $code An enhanced status code.
     * @return bool
     */
    public static function isSuccess( string $code ): bool
    {
        return self::classOf( $code ) === self::SUCCESS ;
    }

    /**
     * Whether the code denotes a persistent transient failure (`4.x.x`).
     *
     * @param string $code An enhanced status code.
     * @return bool
     */
    public static function isTransient( string $code ): bool
    {
        return self::classOf( $code ) === self::TRANSIENT ;
    }

    /**
     * Whether a string is a well-formed enhanced status code: a valid class
     * (`2` / `4` / `5`) followed by a subject and detail field of 1–3 digits.
     *
     * @param string $code The value to test.
     * @return bool
     */
    public static function isValid( string $code ): bool
    {
        return (bool) preg_match( '/^[245]\.\d{1,3}\.\d{1,3}$/' , trim( $code ) ) ;
    }

    /**
     * Returns the subject digit (second field) of an enhanced status code.
     *
     * @param string $code An enhanced status code (`class.subject.detail`).
     * @return int|null The subject number (`0`–`7` in practice), or `null` when malformed.
     */
    public static function subjectOf( string $code ): ?int
    {
        return self::isValid( $code ) ? (int) explode( '.' , trim( $code ) )[ 1 ] : null ;
    }
}
