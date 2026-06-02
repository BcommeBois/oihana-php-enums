<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Symbolic values of an SMTP `secure` configuration key, and the rules that
 * map them onto a {@see SmtpScheme} and a default port.
 *
 * Replaces the inline `match( $secure )` blocks often scattered through DI
 * definitions when building a Symfony Mailer DSN:
 *
 * ```php
 * $scheme = SmtpSecurity::scheme     ( $secure ) ; // 'smtp' | 'smtps'
 * $port   = SmtpSecurity::defaultPort( $secure ) ; // 465 | 587 | 25
 * ```
 *
 * The six accepted values are pairs of synonyms — both spellings are valid
 * configuration input, so both are declared as constants and therefore
 * recognised by {@see validate()}, {@see includes()} and {@see enums()}:
 *
 * | secure              | scheme  | default port | TLS               |
 * |---------------------|---------|--------------|-------------------|
 * | ssl / smtps         | smtps   | 465          | implicit          |
 * | tls / starttls      | smtp    | 587          | STARTTLS          |
 * | none / plain        | smtp    | 25           | none (dev only)   |
 *
 * An absent, empty or unknown value falls back to the STARTTLS behaviour
 * (`smtp` / `587`), the safe default for modern submission.
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see SmtpScheme
 */
class SmtpSecurity
{
    use ConstantsTrait ;

    /**
     * Implicit TLS (synonym of {@see self::SMTPS}). Scheme `smtps`, port `465`.
     */
    public const string SSL = 'ssl' ;

    /**
     * Implicit TLS. Scheme `smtps`, port `465`.
     */
    public const string SMTPS = 'smtps' ;

    /**
     * Opportunistic STARTTLS (synonym of {@see self::STARTTLS}). Scheme `smtp`, port `587`.
     */
    public const string TLS = 'tls' ;

    /**
     * Opportunistic STARTTLS. Scheme `smtp`, port `587`.
     */
    public const string STARTTLS = 'starttls' ;

    /**
     * Cleartext, no encryption (synonym of {@see self::PLAIN}). Scheme `smtp`, port `25` — dev only.
     */
    public const string NONE = 'none' ;

    /**
     * Cleartext, no encryption. Scheme `smtp`, port `25` — dev only.
     */
    public const string PLAIN = 'plain' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Maps a `secure` value onto the SMTP DSN scheme.
     *
     * @param string|null $secure One of the class constants (case-insensitive).
     *                            Absent / empty / unknown falls back to STARTTLS.
     * @return string Either {@see SmtpScheme::SMTP} or {@see SmtpScheme::SMTPS}.
     */
    public static function scheme( ?string $secure ): string
    {
        return match ( strtolower( (string) $secure ) )
        {
            self::SSL , self::SMTPS => SmtpScheme::SMTPS ,
            default                 => SmtpScheme::SMTP ,
        } ;
    }

    /**
     * Maps a `secure` value onto the conventional default SMTP port.
     *
     * @param string|null $secure One of the class constants (case-insensitive).
     *                            Absent / empty / unknown falls back to STARTTLS.
     * @return int `465` (implicit TLS), `25` (cleartext) or `587` (STARTTLS).
     */
    public static function defaultPort( ?string $secure ): int
    {
        return match ( strtolower( (string) $secure ) )
        {
            self::SSL  , self::SMTPS => SmtpPort::IMPLICIT_TLS ,
            self::NONE , self::PLAIN => SmtpPort::SMTP         ,
            default                  => SmtpPort::SUBMISSION   ,
        } ;
    }

    /**
     * Whether the mode negotiates TLS up front (`smtps`) rather than via STARTTLS.
     *
     * @param string|null $secure One of the class constants (case-insensitive).
     * @return bool `true` for `ssl` / `smtps`, `false` otherwise.
     */
    public static function isImplicitTls( ?string $secure ): bool
    {
        return self::scheme( $secure ) === SmtpScheme::SMTPS ;
    }
}
