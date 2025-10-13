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
 * ```
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class PostalCode
{
    use ConstantsTrait ;

    /**
     * Switzerland postal code pattern (1000–9999).
     */
    public const string CH = '/^[1-9]\d{3}$/';

    /**
     * Germany postal code pattern (5 digits).
     */
    public const string DE = '/^\d{5}$/';

    /**
     * Spain postal code pattern (01000–52999).
     */
    public const string ES = '/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/';

    /**
     * France postal code pattern (01000–98999).
     */
    public const string FR = '/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/';

    /**
     * Great Britain postal code pattern (complex UK postcode).
     */
    public const string GB = '/^(?:GIR 0AA|(?:(?:(?:A[BL]|B[ABDHLNRSTX]?|C[ABFHMORTVW]|D[ADEGHLNTY]|E[HNX]?|F[KY]|G[LUY]?|H[ADGPRSUX]|I[GMPV]|JE|K[ATWY]|L[ADELNSU]?|M[EKL]?|N[EGNPRW]?|O[LX]|P[AEHLOR]|R[GHM]|S[AEGK-PRSTY]?|T[ADFNQRSW]|UB|W[ADFNRSV]|YO|ZE)[1-9]?\d|(?:(?:E|N|NW|SE|SW|W)1|EC[1-4]|WC[12])[A-HJKMNPR-Y]|(?:SW|W)(?:[2-9]|[1-9]\d)|EC[1-9]\d)\d[ABD-HJLNP-UW-Z]{2}))$/i';

    /**
     * Italy postal code pattern (5 digits).
     */
    public const string IT = '/^\d{5}$/';

    /**
     * United States ZIP code pattern (5 or 9 digits).
     */
    public const string US = '/^\d{5}(?:-\d{4})?$/';

    /**
     * Belgium postal code pattern (1000–9999).
     */
    public const string BE = '/^[1-9]\d{3}$/';

    /**
     * Canada postal code pattern (A1A 1A1).
     */
    public const string CA = '/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ ]?\d[ABCEGHJ-NPRSTV-Z]\d$/i';

    /**
     * Portugal postal code pattern (1234-567).
     */
    public const string PT = '/^\d{4}-\d{3}$/';

    /**
     * Luxembourg postal code pattern (4 digits).
     */
    public const string LU = '/^\d{4}$/';

    /**
     * Throws an exception if the postal code is invalid for the country.
     *
     * @param string $code
     * @param string $country
     * @throws InvalidArgumentException
     */
    public static function assert( string $code , string $country ) :void
    {
        if (!static::isValid( $code , $country ) )
        {
            throw new InvalidArgumentException( sprintf
            (
                "Invalid postal code '%s' for country '%s'.",
                $code ,
                strtoupper( $country )
            ));
        }
    }

    /**
     * Returns the regex pattern for the given country code, or null if unknown.
     *
     * @param string $country ISO 3166-1 alpha-2 code (case-insensitive)
     * @return string|null
     */
    public static function getPattern( string $country ): ?string
    {
        $country   = strtoupper($country);
        $constants = static::getAll();
        return $constants[ $country ] ?? null;
    }

    /**
     * Returns true if a postal code is valid for a given ISO country code.
     *
     * @param string $code    The postal code to check.
     * @param string $country ISO 3166-1 alpha-2 code (e.g. "FR", "US").
     * @return bool
     */
    public static function isValid( string $code , string $country ): bool
    {
        $pattern = static::getPattern($country);
        return $pattern !== null && preg_match( $pattern , trim( $code ) ) === 1;
    }
}