<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * The two URI schemes accepted by an SMTP transport DSN.
 *
 *     smtp://user:pass@host:587    // STARTTLS (or cleartext)
 *     smtps://user:pass@host:465   // implicit TLS
 *
 * Values are lowercased — the canonical form used in a DSN.
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see SmtpSecurity
 */
class SmtpScheme
{
    use ConstantsTrait ;

    /**
     * SMTP, optionally upgraded via STARTTLS. Default port `587` (or `25` cleartext).
     */
    public const string SMTP = 'smtp' ;

    /**
     * SMTP over implicit TLS. Default port `465`.
     */
    public const string SMTPS = 'smtps' ;

    /**
     * Returns the default TCP port for a scheme, or `null` when the
     * scheme has no well-known default.
     *
     * @param string $scheme One of the class constants (case-insensitive).
     * @return int|null The default port, or `null` if unknown.
     */
    public static function defaultPort( string $scheme ): ?int
    {
        return match ( strtolower( $scheme ) )
        {
            self::SMTPS => SmtpPort::IMPLICIT_TLS ,
            self::SMTP  => SmtpPort::SUBMISSION   ,
            default     => null ,
        } ;
    }
}
