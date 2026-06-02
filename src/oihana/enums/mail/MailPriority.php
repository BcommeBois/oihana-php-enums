<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Canonical message-priority levels, with conversions to the three competing
 * header conventions used in the wild.
 *
 * A message "priority" is expressed three different ways depending on the
 * header; this enum keeps a single canonical vocabulary (`high` / `normal` /
 * `low`) and maps it onto each:
 *
 * | Level    | `X-Priority` | `Importance` | `Priority` (RFC 2156) |
 * |----------|--------------|--------------|-----------------------|
 * | `high`   | 1            | high         | urgent                |
 * | `normal` | 3            | normal       | normal                |
 * | `low`    | 5            | low          | non-urgent            |
 *
 * ```php
 * MailPriority::toXPriority( MailPriority::HIGH ) ; // 1
 * MailPriority::toPriority ( 'urgent' ) ;           // 'urgent'  (normalised)
 * MailPriority::fromXPriority( 2 ) ;                // 'high'
 * ```
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see MailHeader::X_PRIORITY
 * @see MailHeader::IMPORTANCE
 * @see MailHeader::PRIORITY
 */
class MailPriority
{
    use ConstantsTrait ;

    /**
     * Highest priority — `X-Priority: 1`, `Importance: high`, `Priority: urgent`.
     */
    public const string HIGH = 'high' ;

    /**
     * Default priority — `X-Priority: 3`, `Importance: normal`, `Priority: normal`.
     */
    public const string NORMAL = 'normal' ;

    /**
     * Lowest priority — `X-Priority: 5`, `Importance: low`, `Priority: non-urgent`.
     */
    public const string LOW = 'low' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Maps a numeric `X-Priority` value onto a canonical level
     * (`1`–`2` → high, `3` → normal, `4`–`5` → low).
     *
     * @param int $priority The numeric `X-Priority` value.
     * @return string One of {@see self::HIGH} / {@see self::NORMAL} / {@see self::LOW}.
     */
    public static function fromXPriority( int $priority ): string
    {
        return match ( true )
        {
            $priority <= 2 => self::HIGH ,
            $priority >= 4 => self::LOW  ,
            default        => self::NORMAL ,
        } ;
    }

    /**
     * Folds any known spelling onto a canonical level.
     *
     * Recognises the canonical values, the `Priority` tokens
     * (`urgent` / `non-urgent`) and numeric `X-Priority` values (`1`–`5`).
     * Anything unknown, empty or null falls back to {@see self::NORMAL}.
     *
     * @param string|null $value A priority value in any supported spelling.
     * @return string One of {@see self::HIGH} / {@see self::NORMAL} / {@see self::LOW}.
     */
    public static function normalize( ?string $value ): string
    {
        return match ( strtolower( trim( (string) $value ) ) )
        {
            self::HIGH , 'urgent' , 'highest' , '1' , '2'             => self::HIGH ,
            self::LOW  , 'non-urgent' , 'nonurgent' , 'lowest' , '4' , '5' => self::LOW ,
            default                                                   => self::NORMAL ,
        } ;
    }

    /**
     * Maps a level onto the RFC 2156 `Priority` header value
     * (`urgent` / `normal` / `non-urgent`).
     *
     * @param string|null $level A priority value in any supported spelling.
     * @return string The `Priority` value.
     */
    public static function toPriority( ?string $level ): string
    {
        return match ( self::normalize( $level ) )
        {
            self::HIGH => 'urgent' ,
            self::LOW  => 'non-urgent' ,
            default    => self::NORMAL ,
        } ;
    }

    /**
     * Maps a level onto the `Importance` header value (`high` / `normal` / `low`).
     *
     * @param string|null $level A priority value in any supported spelling.
     * @return string The `Importance` value.
     */
    public static function toImportance( ?string $level ): string
    {
        return self::normalize( $level ) ;
    }

    /**
     * Maps a level onto the numeric `X-Priority` value (`1` highest … `5` lowest).
     *
     * @param string|null $level A priority value in any supported spelling.
     * @return int `1`, `3` or `5`.
     */
    public static function toXPriority( ?string $level ): int
    {
        return match ( self::normalize( $level ) )
        {
            self::HIGH => 1 ,
            self::LOW  => 5 ,
            default    => 3 ,
        } ;
    }
}
