<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of official character set codes as assigned by IANA and
 * used in Internet standards and documentation.
 *
 * This class defines integer constants representing the numeric identifiers
 * of various character encodings (code pages) commonly used in databases,
 * networking, and application protocols.
 *
 * The constants correspond to values supported by connection options such as
 * IANAAppCodePage, facilitating consistent charset handling in database drivers
 * or other components interacting with textual data.
 *
 * See the official IANA character sets registry for full details:
 * https://www.iana.org/assignments/character-sets/character-sets.xhtml
 *
 * Example usage:
 * ```php
 * use oihana\enums\CharacterSet;
 *
 * $charset = CharacterSet::UTF8;  // 106
 * ```
 *
 * Notes:
 * - The UTF8 constant represents passing Unicode data without conversion
 * when the database is configured for Unicode.
 * - Some values are specific to certain vendors or drivers (e.g. Progress DataDirect),
 * and may not appear in the official IANA list.
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.0.0
 */
class CharacterSet
{
    use ConstantsTrait ;

    /**
     * Passes Unicode data without conversion if the database is set to Unicode.
     */
    public const int UTF8 = 106 ;

    public const int US_ASCII        = 3 ;
    public const int ISO_8859_1      = 4 ;
    public const int ISO_8859_2      = 5 ;
    public const int ISO_8859_3      = 6 ;
    public const int ISO_8859_4      = 7 ;
    public const int ISO_8859_5      = 8 ;
    public const int ISO_8859_6      = 9 ;
    public const int ISO_8859_7      = 10 ;
    public const int ISO_8859_8      = 11 ;
    public const int ISO_8859_9      = 12 ;
    public const int JIS_Encoding    = 16 ;
    public const int Shift_JIS       = 17 ;
    public const int EUC_JP          = 18 ;
    public const int ISO_646_IRV     = 30 ;
    public const int KS_C_5601       = 36 ;
    public const int ISO_2022_KR     = 37 ;
    public const int EUC_KR          = 38 ;
    public const int ISO_2022_JP     = 39 ;
    public const int ISO_2022_JP_2   = 40 ;
    public const int GB_2312_80      = 57 ;
    public const int ISO_2022_CN     = 104 ;
    public const int ISO_2022_CN_EXT = 105 ;
    public const int ISO_8859_13     = 109	 ;
    public const int ISO_8859_14     = 110	 ;
    public const int ISO_8859_15     = 111	 ;
    public const int GBK             = 113	 ;
    public const int HP_ROMAN8       = 2004 ;
    public const int IBM850          = 2009 ;
    public const int IBM852          = 2010 ;
    public const int IBM437          = 2011 ;
    public const int IBM862          = 2013 ;
    public const int IBM_Thai        = 2016 ;
    public const int WINDOWS_31J     = 2024 ;
    public const int GB2312          = 2025 ;
    public const int Big5            = 2026 ;
    public const int MACINTOSH       = 2027 ;
    public const int IBM037          = 2028 ;
    public const int IBM038          = 2029 ;
    public const int IBM273          = 2030 ;
    public const int IBM277          = 2033 ;
    public const int IBM278          = 2034 ;
    public const int IBM280          = 2035 ;
    public const int IBM284          = 2037 ;
    public const int IBM285          = 2038 ;
    public const int IBM290          = 2039 ;
    public const int IBM297          = 2040 ;
    public const int IBM420          = 2041 ;
    public const int IBM424          = 2043 ;
    public const int IBM500          = 2044 ;
    public const int IBM851          = 2045 ;
    public const int IBM855          = 2046 ;
    public const int IBM857          = 2047 ;
    public const int IBM860          = 2048 ;
    public const int IBM861          = 2049 ;
    public const int IBM863          = 2050 ;
    public const int IBM864          = 2051 ;
    public const int IBM865          = 2052 ;
    public const int IBM868          = 2053 ;
    public const int IBM869          = 2054 ;
    public const int IBM870          = 2055 ;
    public const int IBM871          = 2056 ;
    public const int IBM918          = 2062 ;
    public const int IBM1026         = 2063 ;
    public const int KOI8_R          = 2084 ;
    public const int HZ_GB_2312      = 2085 ;
    public const int IBM866          = 2086 ;
    public const int IBM775          = 2087 ;
    public const int IBM00858        = 2089 ;
    public const int IBM01140        = 2091 ;
    public const int IBM01141        = 2092 ;
    public const int IBM01142        = 2093 ;
    public const int IBM01143        = 2094 ;
    public const int IBM01144        = 2095 ;
    public const int IBM01145        = 2096 ;
    public const int IBM01146        = 2097 ;
    public const int IBM01147        = 2098 ;
    public const int IBM01148        = 2099 ;
    public const int IBM01149        = 2100 ;
    public const int IBM1047         = 2102 ;
    public const int WINDOWS_1250    = 2250 ;
    public const int WINDOWS_1251    = 2251 ;
    public const int WINDOWS_1252    = 2252 ;
    public const int WINDOWS_1253    = 2253 ;
    public const int WINDOWS_1254    = 2254 ;
    public const int WINDOWS_1255    = 2255 ;
    public const int WINDOWS_1256    = 2256 ;
    public const int WINDOWS_1257    = 2257 ;
    public const int WINDOWS_1258    = 2258 ;
    public const int TIS_620         = 2259 ;

    // These values are assigned by Progress DataDirect
    // and not appear in the official Character Sets Enumeration.
    public const int IBM_939           = 2000000939 ;
    public const int IBM_943_P14A_2000 = 2000000943 ;
    public const int IBM_1025          = 2000001025 ;
    public const int IBM_4396          = 2000004396 ;
    public const int IBM_5026          = 2000005026 ;
    public const int IBM_5035          = 2000005035 ;
}