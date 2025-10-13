<?php

namespace oihana\enums;

use InvalidArgumentException;
use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of postal code regular expressions by country.
 *
 * Provides validation and pattern lookup for ISO 3166-1 alpha-2 country codes.
 *
 * Example:
 * ```php
 * PostalCode::isValid('75015', 'FR'); // true
 * PostalCode::isValid('90210', 'US'); // true
 * PostalCode::isValid('99999', 'CH'); // false
 * PostalCode::getPattern('HK'); // null (no postal code system)
 * ```
 *
 * Countries without postal code systems (not defined in this class):
 * - HK (Hong Kong)
 * - MO (Macao)
 * - QA (Qatar)
 * - TD (Chad)
 * - UG (Uganda)
 *
 * Note: For countries without postal codes, getPattern() returns null
 * and isValid() returns false for any input.
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class PostalCode
{
    use ConstantsTrait;

    /**
     * Andorra postal code pattern (AD100-AD700).
     */
    public const string AD = '/^AD[1-7]0{2}$/';

    /**
     * Argentina postal code pattern (4 or 8 characters).
     */
    public const string AR = '/^(?:\d{4}|[A-Z]\d{4}[A-Z]{3})$/';

    /**
     * Austria postal code pattern (4 digits).
     */
    public const string AT = '/^\d{4}$/';

    /**
     * Australia postal code pattern (4 digits).
     */
    public const string AU = '/^\d{4}$/';

    /**
     * Azerbaijan postal code pattern (AZ 1000 - AZ 9999).
     */
    public const string AZ = '/^AZ\d{4}$/';

    /**
     * Bosnia and Herzegovina postal code pattern (5 digits).
     */
    public const string BA = '/^\d{5}$/';

    /**
     * Barbados postal code pattern (BB11000-BB99999).
     */
    public const string BB = '/^BB\d{5}$/';

    /**
     * Bangladesh postal code pattern (4 digits).
     */
    public const string BD = '/^\d{4}$/';

    /**
     * Belgium postal code pattern (1000–9999).
     */
    public const string BE = '/^[1-9]\d{3}$/';

    /**
     * Bulgaria postal code pattern (4 digits).
     */
    public const string BG = '/^\d{4}$/';

    /**
     * Bahrain postal code pattern (3 or 4 digits).
     */
    public const string BH = '/^\d{3,4}$/';

    /**
     * Bermuda postal code pattern (AA 00 or AA AA).
     */
    public const string BM = '/^[A-Z]{2}\s?(?:\d{2}|[A-Z]{2})$/';

    /**
     * Brunei postal code pattern (AA1234).
     */
    public const string BN = '/^[A-Z]{2}\d{4}$/';

    /**
     * Brazil postal code pattern (12345-678).
     */
    public const string BR = '/^\d{5}-?\d{3}$/';

    /**
     * Bhutan postal code pattern (5 digits).
     */
    public const string BT = '/^\d{5}$/';

    /**
     * Belarus postal code pattern (6 digits).
     */
    public const string BY = '/^\d{6}$/';

    /**
     * Canada postal code pattern (A1A 1A1).
     */
    public const string CA = '/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ ]?\d[ABCEGHJ-NPRSTV-Z]\d$/i';

    /**
     * Switzerland postal code pattern (1000–9999).
     */
    public const string CH = '/^[1-9]\d{3}$/';

    /**
     * Chile postal code pattern (7 digits).
     */
    public const string CL = '/^\d{7}$/';

    /**
     * China postal code pattern (6 digits).
     */
    public const string CN = '/^\d{6}$/';

    /**
     * Colombia postal code pattern (6 digits).
     */
    public const string CO = '/^\d{6}$/';

    /**
     * Costa Rica postal code pattern (5 digits).
     */
    public const string CR = '/^\d{5}$/';

    /**
     * Cuba postal code pattern (5 digits).
     */
    public const string CU = '/^\d{5}$/';

    /**
     * Cape Verde postal code pattern (4 digits).
     */
    public const string CV = '/^\d{4}$/';

    /**
     * Cyprus postal code pattern (4 digits).
     */
    public const string CY = '/^\d{4}$/';

    /**
     * Czech Republic postal code pattern (123 45 or 12345).
     */
    public const string CZ = '/^\d{3}\s?\d{2}$/';

    /**
     * Germany postal code pattern (5 digits).
     */
    public const string DE = '/^\d{5}$/';

    /**
     * Denmark postal code pattern (4 digits).
     */
    public const string DK = '/^\d{4}$/';

    /**
     * Dominican Republic postal code pattern (5 digits).
     */
    public const string DO = '/^\d{5}$/';

    /**
     * Algeria postal code pattern (5 digits).
     */
    public const string DZ = '/^\d{5}$/';

    /**
     * Ecuador postal code pattern (6 digits).
     */
    public const string EC = '/^\d{6}$/';

    /**
     * Estonia postal code pattern (5 digits).
     */
    public const string EE = '/^\d{5}$/';

    /**
     * Egypt postal code pattern (5 digits).
     */
    public const string EG = '/^\d{5}$/';

    /**
     * Spain postal code pattern (01000–52999).
     */
    public const string ES = '/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/';

    /**
     * Ethiopia postal code pattern (4 digits).
     */
    public const string ET = '/^\d{4}$/';

    /**
     * Finland postal code pattern (5 digits).
     */
    public const string FI = '/^\d{5}$/';

    /**
     * Faroe Islands postal code pattern (FO-100 to FO-970).
     */
    public const string FO = '/^FO-?\d{3}$/';

    /**
     * France postal code pattern (01000–98999).
     */
    public const string FR = '/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/';

    /**
     * Great Britain postal code pattern (complex UK postcode).
     */
    public const string GB = '/^(?:GIR 0AA|(?:(?:(?:A[BL]|B[ABDHLNRSTX]?|C[ABFHMORTVW]|D[ADEGHLNTY]|E[HNX]?|F[KY]|G[LUY]?|H[ADGPRSUX]|I[GMPV]|JE|K[ATWY]|L[ADELNSU]?|M[EKL]?|N[EGNPRW]?|O[LX]|P[AEHLOR]|R[GHM]|S[AEGK-PRSTY]?|T[ADFNQRSW]|UB|W[ADFNRSV]|YO|ZE)[1-9]?\d|(?:(?:E|N|NW|SE|SW|W)1|EC[1-4]|WC[12])[A-HJKMNPR-Y]|(?:SW|W)(?:[2-9]|[1-9]\d)|EC[1-9]\d)\d[ABD-HJLNP-UW-Z]{2}))$/i';

    /**
     * Georgia postal code pattern (4 digits).
     */
    public const string GE = '/^\d{4}$/';

    /**
     * French Guiana postal code pattern (973xx).
     */
    public const string GF = '/^973\d{2}$/';

    /**
     * Guernsey postal code pattern (GY1-GY10).
     */
    public const string GG = '/^GY\d{1,2}\s?\d[A-Z]{2}$/i';

    /**
     * Gibraltar postal code pattern (GX11 1AA).
     */
    public const string GI = '/^GX11\s?1AA$/i';

    /**
     * Greenland postal code pattern (4 digits).
     */
    public const string GL = '/^\d{4}$/';

    /**
     * Guadeloupe postal code pattern (971xx).
     */
    public const string GP = '/^971\d{2}$/';

    /**
     * Greece postal code pattern (123 45 or 12345).
     */
    public const string GR = '/^\d{3}\s?\d{2}$/';

    /**
     * Guatemala postal code pattern (5 digits).
     */
    public const string GT = '/^\d{5}$/';

    /**
     * Guam postal code pattern (US ZIP format).
     */
    public const string GU = '/^969\d{2}(?:-\d{4})?$/';

    /**
     * Honduras postal code pattern (5 digits).
     */
    public const string HN = '/^\d{5}$/';

    /**
     * Croatia postal code pattern (5 digits, 10000-53000).
     */
    public const string HR = '/^[1-5]\d{4}$/';

    /**
     * Haiti postal code pattern (4 digits).
     */
    public const string HT = '/^\d{4}$/';

    /**
     * Hungary postal code pattern (4 digits).
     */
    public const string HU = '/^\d{4}$/';

    /**
     * Indonesia postal code pattern (5 digits).
     */
    public const string ID = '/^\d{5}$/';

    /**
     * Ireland postal code pattern (Eircode: A65 F4E2).
     */
    public const string IE = '/^[AC-FHKNPRTV-Y]\d{2}\s?[0-9AC-FHKNPRTV-Y]{4}$/i';

    /**
     * Israel postal code pattern (5 or 7 digits).
     */
    public const string IL = '/^\d{5}(?:\d{2})?$/';

    /**
     * Isle of Man postal code pattern (IM1-IM9).
     */
    public const string IM = '/^IM\d{1,2}\s?\d[A-Z]{2}$/i';

    /**
     * India postal code pattern (6 digits).
     */
    public const string IN = '/^\d{6}$/';

    /**
     * Iraq postal code pattern (5 digits).
     */
    public const string IQ = '/^\d{5}$/';

    /**
     * Iran postal code pattern (10 digits, ####-#####).
     */
    public const string IR = '/^\d{5}-?\d{5}$/';

    /**
     * Iceland postal code pattern (3 digits).
     */
    public const string IS = '/^\d{3}$/';

    /**
     * Italy postal code pattern (5 digits).
     */
    public const string IT = '/^\d{5}$/';

    /**
     * Jersey postal code pattern (JE1-JE5).
     */
    public const string JE = '/^JE\d{1}\s?\d[A-Z]{2}$/i';

    /**
     * Jamaica postal code pattern (2 digits).
     */
    public const string JM = '/^\d{2}$/';

    /**
     * Jordan postal code pattern (5 digits).
     */
    public const string JO = '/^\d{5}$/';

    /**
     * Japan postal code pattern (123-4567).
     */
    public const string JP = '/^\d{3}-?\d{4}$/';

    /**
     * Kenya postal code pattern (5 digits).
     */
    public const string KE = '/^\d{5}$/';

    /**
     * Kyrgyzstan postal code pattern (6 digits).
     */
    public const string KG = '/^\d{6}$/';

    /**
     * Cambodia postal code pattern (5 digits).
     */
    public const string KH = '/^\d{5}$/';

    /**
     * South Korea postal code pattern (5 digits).
     */
    public const string KR = '/^\d{5}$/';

    /**
     * Kuwait postal code pattern (5 digits).
     */
    public const string KW = '/^\d{5}$/';

    /**
     * Cayman Islands postal code pattern (KY1-1234).
     */
    public const string KY = '/^KY\d-\d{4}$/';

    /**
     * Kazakhstan postal code pattern (6 digits).
     */
    public const string KZ = '/^\d{6}$/';

    /**
     * Laos postal code pattern (5 digits).
     */
    public const string LA = '/^\d{5}$/';

    /**
     * Lebanon postal code pattern (4 or 8 digits).
     */
    public const string LB = '/^\d{4}(?:\s?\d{4})?$/';

    /**
     * Liechtenstein postal code pattern (4 digits, 9485-9498).
     */
    public const string LI = '/^948[5-9]|949[0-8]$/';

    /**
     * Sri Lanka postal code pattern (5 digits).
     */
    public const string LK = '/^\d{5}$/';

    /**
     * Liberia postal code pattern (4 digits).
     */
    public const string LR = '/^\d{4}$/';

    /**
     * Lesotho postal code pattern (3 digits).
     */
    public const string LS = '/^\d{3}$/';

    /**
     * Lithuania postal code pattern (LT-12345).
     */
    public const string LT = '/^LT-?\d{5}$/';

    /**
     * Luxembourg postal code pattern (4 digits).
     */
    public const string LU = '/^\d{4}$/';

    /**
     * Latvia postal code pattern (LV-1234).
     */
    public const string LV = '/^LV-?\d{4}$/';

    /**
     * Libya postal code pattern (5 digits).
     */
    public const string LY = '/^\d{5}$/';

    /**
     * Morocco postal code pattern (5 digits).
     */
    public const string MA = '/^\d{5}$/';

    /**
     * Monaco postal code pattern (980xx).
     */
    public const string MC = '/^980\d{2}$/';

    /**
     * Moldova postal code pattern (MD-1234 or 1234).
     */
    public const string MD = '/^(?:MD-?)?\d{4}$/';

    /**
     * Montenegro postal code pattern (5 digits).
     */
    public const string ME = '/^\d{5}$/';

    /**
     * Madagascar postal code pattern (3 digits).
     */
    public const string MG = '/^\d{3}$/';

    /**
     * Marshall Islands postal code pattern (96960-96970).
     */
    public const string MH = '/^969[6-7]\d$/';

    /**
     * North Macedonia postal code pattern (4 digits).
     */
    public const string MK = '/^\d{4}$/';

    /**
     * Myanmar postal code pattern (5 digits).
     */
    public const string MM = '/^\d{5}$/';

    /**
     * Mongolia postal code pattern (5 or 6 digits).
     */
    public const string MN = '/^\d{5,6}$/';

    /**
     * Martinique postal code pattern (972xx).
     */
    public const string MQ = '/^972\d{2}$/';

    /**
     * Malta postal code pattern (AAA 1234).
     */
    public const string MT = '/^[A-Z]{3}\s?\d{4}$/i';

    /**
     * Mauritius postal code pattern (5 digits, A1234).
     */
    public const string MU = '/^[A-Z]?\d{4}$/i';

    /**
     * Maldives postal code pattern (5 digits).
     */
    public const string MV = '/^\d{5}$/';

    /**
     * Mexico postal code pattern (5 digits).
     */
    public const string MX = '/^\d{5}$/';

    /**
     * Malaysia postal code pattern (5 digits).
     */
    public const string MY = '/^\d{5}$/';

    /**
     * Mozambique postal code pattern (4 digits).
     */
    public const string MZ = '/^\d{4}$/';

    /**
     * Namibia postal code pattern (5 digits).
     */
    public const string NA = '/^\d{5}$/';

    /**
     * New Caledonia postal code pattern (988xx).
     */
    public const string NC = '/^988\d{2}$/';

    /**
     * Niger postal code pattern (4 digits).
     */
    public const string NE = '/^\d{4}$/';

    /**
     * Nigeria postal code pattern (6 digits).
     */
    public const string NG = '/^\d{6}$/';

    /**
     * Nicaragua postal code pattern (5 digits).
     */
    public const string NI = '/^\d{5}$/';

    /**
     * Netherlands postal code pattern (1234 AB).
     */
    public const string NL = '/^\d{4}\s?[A-Z]{2}$/i';

    /**
     * Norway postal code pattern (4 digits).
     */
    public const string NO = '/^\d{4}$/';

    /**
     * Nepal postal code pattern (5 digits).
     */
    public const string NP = '/^\d{5}$/';

    /**
     * New Zealand postal code pattern (4 digits).
     */
    public const string NZ = '/^\d{4}$/';

    /**
     * Oman postal code pattern (3 digits).
     */
    public const string OM = '/^\d{3}$/';

    /**
     * Panama postal code pattern (4 digits).
     */
    public const string PA = '/^\d{4}$/';

    /**
     * Peru postal code pattern (5 digits).
     */
    public const string PE = '/^\d{5}$/';

    /**
     * French Polynesia postal code pattern (987xx).
     */
    public const string PF = '/^987\d{2}$/';

    /**
     * Papua New Guinea postal code pattern (3 digits).
     */
    public const string PG = '/^\d{3}$/';

    /**
     * Philippines postal code pattern (4 digits).
     */
    public const string PH = '/^\d{4}$/';

    /**
     * Pakistan postal code pattern (5 digits).
     */
    public const string PK = '/^\d{5}$/';

    /**
     * Poland postal code pattern (12-345).
     */
    public const string PL = '/^\d{2}-\d{3}$/';

    /**
     * Saint Pierre and Miquelon postal code pattern (97500).
     */
    public const string PM = '/^97500$/';

    /**
     * Puerto Rico postal code pattern (US ZIP format).
     */
    public const string PR = '/^00[679]\d{2}(?:-\d{4})?$/';

    /**
     * Palestine postal code pattern (3 digits).
     */
    public const string PS = '/^\d{3}$/';

    /**
     * Portugal postal code pattern (1234-567).
     */
    public const string PT = '/^\d{4}-\d{3}$/';

    /**
     * Palau postal code pattern (96940).
     */
    public const string PW = '/^96940$/';

    /**
     * Paraguay postal code pattern (4 digits).
     */
    public const string PY = '/^\d{4}$/';

    /**
     * Réunion postal code pattern (974xx).
     */
    public const string RE = '/^974\d{2}$/';

    /**
     * Romania postal code pattern (6 digits).
     */
    public const string RO = '/^\d{6}$/';

    /**
     * Serbia postal code pattern (5 digits).
     */
    public const string RS = '/^\d{5}$/';

    /**
     * Russia postal code pattern (6 digits).
     */
    public const string RU = '/^\d{6}$/';

    /**
     * Saudi Arabia postal code pattern (5 digits).
     */
    public const string SA = '/^\d{5}$/';

    /**
     * Sweden postal code pattern (123 45).
     */
    public const string SE = '/^\d{3}\s?\d{2}$/';

    /**
     * Singapore postal code pattern (6 digits).
     */
    public const string SG = '/^\d{6}$/';

    /**
     * Slovenia postal code pattern (4 digits).
     */
    public const string SI = '/^\d{4}$/';

    /**
     * Svalbard postal code pattern (9170-9179).
     */
    public const string SJ = '/^917[0-9]$/';

    /**
     * Slovakia postal code pattern (123 45).
     */
    public const string SK = '/^\d{3}\s?\d{2}$/';

    /**
     * San Marino postal code pattern (4789x).
     */
    public const string SM = '/^4789\d$/';

    /**
     * Senegal postal code pattern (5 digits).
     */
    public const string SN = '/^\d{5}$/';

    /**
     * Somalia postal code pattern (5 digits).
     */
    public const string SO = '/^\d{5}$/';

    /**
     * South Sudan postal code pattern (5 digits).
     */
    public const string SS = '/^\d{5}$/';

    /**
     * El Salvador postal code pattern (4 digits).
     */
    public const string SV = '/^\d{4}$/';

    /**
     * Eswatini postal code pattern (A100-H300).
     */
    public const string SZ = '/^[A-Z]\d{3}$/i';

    /**
     * Turks and Caicos Islands postal code pattern (TKCA 1ZZ).
     */
    public const string TC = '/^TKCA\s?1ZZ$/i';

    /**
     * Thailand postal code pattern (5 digits).
     */
    public const string TH = '/^\d{5}$/';

    /**
     * Tajikistan postal code pattern (6 digits).
     */
    public const string TJ = '/^\d{6}$/';

    /**
     * Turkmenistan postal code pattern (6 digits).
     */
    public const string TM = '/^\d{6}$/';

    /**
     * Tunisia postal code pattern (4 digits).
     */
    public const string TN = '/^\d{4}$/';

    /**
     * Turkey postal code pattern (5 digits).
     */
    public const string TR = '/^\d{5}$/';

    /**
     * Trinidad and Tobago postal code pattern (6 digits).
     */
    public const string TT = '/^\d{6}$/';

    /**
     * Taiwan postal code pattern (3 or 5 digits).
     */
    public const string TW = '/^\d{3}(?:\d{2})?$/';

    /**
     * Tanzania postal code pattern (5 digits).
     */
    public const string TZ = '/^\d{5}$/';

    /**
     * Ukraine postal code pattern (5 digits).
     */
    public const string UA = '/^\d{5}$/';

    /**
     * United States postal code pattern (5 or 9 digits).
     */
    public const string US = '/^\d{5}(?:-\d{4})?$/';

    /**
     * Uruguay postal code pattern (5 digits).
     */
    public const string UY = '/^\d{5}$/';

    /**
     * Uzbekistan postal code pattern (6 digits).
     */
    public const string UZ = '/^\d{6}$/';

    /**
     * Vatican City postal code pattern (00120).
     */
    public const string VA = '/^00120$/';

    /**
     * Venezuela postal code pattern (4 digits).
     */
    public const string VE = '/^\d{4}$/';

    /**
     * Virgin Islands (US) postal code pattern (008xx).
     */
    public const string VI = '/^008\d{2}(?:-\d{4})?$/';

    /**
     * Vietnam postal code pattern (6 digits).
     */
    public const string VN = '/^\d{6}$/';

    /**
     * Wallis and Futuna postal code pattern (98600).
     */
    public const string WF = '/^98600$/';

    /**
     * Mayotte postal code pattern (976xx).
     */
    public const string YT = '/^976\d{2}$/';

    /**
     * South Africa postal code pattern (4 digits).
     */
    public const string ZA = '/^\d{4}$/';

    /**
     * Zambia postal code pattern (5 digits).
     */
    public const string ZM = '/^\d{5}$/';

    /**
     * Throws an exception if the postal code is invalid for the country.
     *
     * @param string $code
     * @param string $country
     * @throws InvalidArgumentException
     */
    public static function assert(string $code, string $country): void
    {
        if (!static::isValid($code, $country))
        {
            throw new InvalidArgumentException(sprintf(
                "Invalid postal code '%s' for country '%s'.",
                $code,
                strtoupper($country)
            ));
        }
    }

    /**
     * Returns the regex pattern for the given country code, or null if unknown.
     *
     * @param string $country ISO 3166-1 alpha-2 code (case-insensitive)
     * @return string|null
     */
    public static function getPattern(string $country): ?string
    {
        $country = strtoupper($country);
        $constants = static::getAll();
        return $constants[$country] ?? null ;
    }

    /**
     * Returns true if a postal code is valid for a given ISO country code.
     *
     * @param string $code    The postal code to check.
     * @param string $country ISO 3166-1 alpha-2 code (e.g. "FR", "US").
     * @return bool
     */
    public static function isValid(string $code, string $country): bool
    {
        $pattern = static::getPattern($country);
        return $pattern !== null && preg_match($pattern, trim($code)) === 1 ;
    }
}