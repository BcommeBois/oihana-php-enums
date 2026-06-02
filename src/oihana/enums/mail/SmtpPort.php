<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Well-known TCP ports used by SMTP transports.
 *
 * Names follow the role of the port rather than a raw number, so callers
 * never hard-code `465` / `587` / `25`:
 *
 * | Port  | Constant       | IANA service  | Usage                                            |
 * |-------|----------------|---------------|--------------------------------------------------|
 * | 25    | `SMTP`         | `smtp`        | Server relay / cleartext (MTA↔MTA)               |
 * | 465   | `IMPLICIT_TLS` | `submissions` | Submission over implicit TLS (RFC 8314)          |
 * | 587   | `SUBMISSION`   | `submission`  | Submission with STARTTLS (RFC 6409)              |
 * | 2525  | `ALTERNATE`    | —             | Common non-standard fallback when 587 is blocked |
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see SmtpScheme
 * @see SmtpSecurity
 */
class SmtpPort
{
    use ConstantsTrait ;

    /**
     * Common non-standard fallback used by some providers when `587` is blocked.
     */
    public const int ALTERNATE = 2525 ;

    /**
     * Message submission over implicit TLS (RFC 8314). IANA service `submissions`.
     */
    public const int IMPLICIT_TLS = 465 ;

    /**
     * Classic SMTP port — server-to-server relay and cleartext. IANA service `smtp`.
     */
    public const int SMTP = 25 ;

    /**
     * Message submission with STARTTLS (RFC 6409). IANA service `submission`.
     */
    public const int SUBMISSION = 587 ;
}
