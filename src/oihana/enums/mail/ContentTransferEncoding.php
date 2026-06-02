<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * MIME `Content-Transfer-Encoding` values (RFC 2045 §6).
 *
 * Declares how the body of a part was encoded for transport:
 *
 * - `7bit`, `8bit`, `binary` are *identity* encodings — the data is left
 *   as-is (only line-length / byte-range guarantees differ).
 * - `quoted-printable` and `base64` actually transform the bytes and must
 *   be decoded before use.
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see MailHeader::CONTENT_TRANSFER_ENCODING
 */
class ContentTransferEncoding
{
    use ConstantsTrait ;

    /**
     * `base64` — Binary-safe base64 encoding.
     */
    public const string BASE64 = 'base64' ;

    /**
     * `binary` — Arbitrary bytes with no line-length restriction.
     */
    public const string BINARY = 'binary' ;

    /**
     * `8bit` — 8-bit data, lines ≤ 998 octets.
     */
    public const string EIGHT_BIT = '8bit' ;

    /**
     * `quoted-printable` — Mostly-ASCII text with `=XX` escapes.
     */
    public const string QUOTED_PRINTABLE = 'quoted-printable' ;

    /**
     * `7bit` — US-ASCII, lines ≤ 998 octets. The default when absent.
     */
    public const string SEVEN_BIT = '7bit' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Whether the encoding leaves the data unchanged (`7bit` / `8bit` /
     * `binary`) and therefore needs no decoding step.
     *
     * @param string $encoding One of the class constants (case-insensitive).
     * @return bool True for an identity encoding, false for `quoted-printable` / `base64`.
     */
    public static function isIdentity( string $encoding ): bool
    {
        return match ( strtolower( trim( $encoding ) ) )
        {
            self::SEVEN_BIT , self::EIGHT_BIT , self::BINARY => true ,
            default                                          => false ,
        } ;
    }
}
