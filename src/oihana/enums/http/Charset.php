<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of character set (charset) names.
 *
 * These are the IANA / WHATWG charset labels carried by the `charset`
 * parameter of a `Content-Type` header (`text/html; charset=utf-8`). The same
 * labels are commonly accepted by PHP's `mb_*` / `iconv` functions, which are
 * case-insensitive and recognise many aliases. Charset tokens are
 * case-insensitive on the wire (RFC 9110 §8.3.2); the lowercase WHATWG form is
 * kept here.
 *
 * This is the string-name counterpart of {@see \oihana\enums\CharacterSet},
 * which holds the numeric IANA MIBenum codes (e.g. `106` for UTF-8) used by
 * some database drivers. Use this class wherever a charset *name* is needed.
 *
 * Example:
 * ```php
 * $type = MediaType::withCharset( MediaType::HTML , Charset::UTF_8 ) ;
 * // 'text/html; charset=utf-8'
 * ```
 *
 * @see \oihana\enums\CharacterSet
 * @see MediaType::withCharset()
 * @see https://www.iana.org/assignments/character-sets/character-sets.xhtml
 * @see https://encoding.spec.whatwg.org/#names-and-labels
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class Charset
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Unicode
    // -------------------------------------------------------------------------

    /**
     * `utf-8` — Unicode, variable-width. The recommended default for the web.
     */
    public const string UTF_8 = 'utf-8' ;

    /**
     * `utf-16` — Unicode, 16-bit, byte order detected from a BOM.
     */
    public const string UTF_16 = 'utf-16' ;

    /**
     * `utf-16be` — Unicode, 16-bit, big-endian.
     */
    public const string UTF_16BE = 'utf-16be' ;

    /**
     * `utf-16le` — Unicode, 16-bit, little-endian.
     */
    public const string UTF_16LE = 'utf-16le' ;

    /**
     * `utf-32` — Unicode, 32-bit.
     */
    public const string UTF_32 = 'utf-32' ;

    // -------------------------------------------------------------------------
    // ASCII / ISO 8859
    // -------------------------------------------------------------------------

    /**
     * `us-ascii` — 7-bit ASCII.
     */
    public const string US_ASCII = 'us-ascii' ;

    /**
     * `iso-8859-1` — Latin-1, Western European.
     */
    public const string ISO_8859_1 = 'iso-8859-1' ;

    /**
     * `iso-8859-2` — Latin-2, Central European.
     */
    public const string ISO_8859_2 = 'iso-8859-2' ;

    /**
     * `iso-8859-5` — Latin/Cyrillic.
     */
    public const string ISO_8859_5 = 'iso-8859-5' ;

    /**
     * `iso-8859-15` — Latin-9, Western European with the euro sign.
     */
    public const string ISO_8859_15 = 'iso-8859-15' ;

    // -------------------------------------------------------------------------
    // Windows code pages
    // -------------------------------------------------------------------------

    /**
     * `windows-1250` — Central European.
     */
    public const string WINDOWS_1250 = 'windows-1250' ;

    /**
     * `windows-1251` — Cyrillic.
     */
    public const string WINDOWS_1251 = 'windows-1251' ;

    /**
     * `windows-1252` — Western European (superset of ISO-8859-1).
     */
    public const string WINDOWS_1252 = 'windows-1252' ;

    // -------------------------------------------------------------------------
    // East Asian
    // -------------------------------------------------------------------------

    /**
     * `shift_jis` — Japanese.
     */
    public const string SHIFT_JIS = 'shift_jis' ;

    /**
     * `euc-jp` — Japanese (Extended Unix Code).
     */
    public const string EUC_JP = 'euc-jp' ;

    /**
     * `iso-2022-jp` — Japanese (JIS).
     */
    public const string ISO_2022_JP = 'iso-2022-jp' ;

    /**
     * `gb2312` — Simplified Chinese.
     */
    public const string GB2312 = 'gb2312' ;

    /**
     * `gbk` — Simplified Chinese (extends GB2312).
     */
    public const string GBK = 'gbk' ;

    /**
     * `gb18030` — Chinese, full Unicode coverage.
     */
    public const string GB18030 = 'gb18030' ;

    /**
     * `big5` — Traditional Chinese.
     */
    public const string BIG5 = 'big5' ;

    /**
     * `euc-kr` — Korean (Extended Unix Code).
     */
    public const string EUC_KR = 'euc-kr' ;

    // -------------------------------------------------------------------------
    // Cyrillic (legacy)
    // -------------------------------------------------------------------------

    /**
     * `koi8-r` — Russian Cyrillic.
     */
    public const string KOI8_R = 'koi8-r' ;
}
