<?php

namespace oihana\enums;

use oihana\reflect\exceptions\ConstantException;
use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of hash algorithm identifiers recognised by PHP's `hash()`,
 * `hash_hmac()`, `hash_pbkdf2()` and `hash_hkdf()` families of functions.
 *
 * Values correspond to the lowercase algorithm names returned by
 * `hash_algos()` on a standard PHP 8.4+ build. Keeping them in a single
 * enum avoids magic strings like `'sha256'` sprinkled through callers
 * (token hashing, file integrity checks, HMAC signing, etc.).
 *
 * Usage:
 *
 * ```php
 * $digest = hash( HashAlgorithm::SHA256 , $clearCode ) ;
 * $hmac   = hash_hmac( HashAlgorithm::SHA512 , $payload , $secret ) ;
 * HashAlgorithm::validate( 'sha256' ) ;
 * ```
 *
 * Notes:
 * - Constant names follow the historic "family + bit length" convention
 *   (SHA256, SHA3_512). Dashes and slashes from the raw PHP names are
 *   normalised to underscores so the names stay valid PHP identifiers.
 * - Deprecated algorithms (MD5, SHA1) are included for interop but should
 *   not be used for new security-sensitive code.
 * - Non-cryptographic algorithms (CRC32, ADLER32, FNV) are grouped at
 *   the bottom and clearly labelled — useful for checksums, not secrets.
 *
 * @package oihana\enums
 * @author  Marc Alcaraz
 * @since   1.1.0
 */
class HashAlgorithm
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // MD family (legacy, do NOT use for new cryptographic code)
    // -------------------------------------------------------------------------

    const string MD2  = 'md2'  ;
    const string MD4  = 'md4'  ;
    const string MD5  = 'md5'  ;

    // -------------------------------------------------------------------------
    // SHA-1 (legacy, do NOT use for new cryptographic code)
    // -------------------------------------------------------------------------

    const string SHA1 = 'sha1' ;

    // -------------------------------------------------------------------------
    // SHA-2 family
    // -------------------------------------------------------------------------

    const string SHA224 = 'sha224' ;
    const string SHA256 = 'sha256' ;
    const string SHA384 = 'sha384' ;
    const string SHA512 = 'sha512' ;

    const string SHA512_224 = 'sha512/224' ;
    const string SHA512_256 = 'sha512/256' ;

    // -------------------------------------------------------------------------
    // SHA-3 family (Keccak-based)
    // -------------------------------------------------------------------------

    const string SHA3_224 = 'sha3-224' ;
    const string SHA3_256 = 'sha3-256' ;
    const string SHA3_384 = 'sha3-384' ;
    const string SHA3_512 = 'sha3-512' ;

    // -------------------------------------------------------------------------
    // RIPEMD family
    // -------------------------------------------------------------------------

    const string RIPEMD128 = 'ripemd128' ;
    const string RIPEMD160 = 'ripemd160' ;
    const string RIPEMD256 = 'ripemd256' ;
    const string RIPEMD320 = 'ripemd320' ;

    // -------------------------------------------------------------------------
    // Whirlpool
    // -------------------------------------------------------------------------

    const string WHIRLPOOL = 'whirlpool' ;

    // -------------------------------------------------------------------------
    // Tiger family
    // -------------------------------------------------------------------------

    const string TIGER128_3 = 'tiger128,3' ;
    const string TIGER160_3 = 'tiger160,3' ;
    const string TIGER192_3 = 'tiger192,3' ;
    const string TIGER128_4 = 'tiger128,4' ;
    const string TIGER160_4 = 'tiger160,4' ;
    const string TIGER192_4 = 'tiger192,4' ;

    // -------------------------------------------------------------------------
    // Snefru
    // -------------------------------------------------------------------------

    const string SNEFRU     = 'snefru'     ;
    const string SNEFRU256  = 'snefru256'  ;

    // -------------------------------------------------------------------------
    // GOST family
    // -------------------------------------------------------------------------

    const string GOST        = 'gost'        ;
    const string GOST_CRYPTO = 'gost-crypto' ;

    // -------------------------------------------------------------------------
    // HAVAL family (128/160/192/224/256 × 3/4/5 rounds)
    // -------------------------------------------------------------------------

    const string HAVAL128_3 = 'haval128,3' ;
    const string HAVAL160_3 = 'haval160,3' ;
    const string HAVAL192_3 = 'haval192,3' ;
    const string HAVAL224_3 = 'haval224,3' ;
    const string HAVAL256_3 = 'haval256,3' ;
    const string HAVAL128_4 = 'haval128,4' ;
    const string HAVAL160_4 = 'haval160,4' ;
    const string HAVAL192_4 = 'haval192,4' ;
    const string HAVAL224_4 = 'haval224,4' ;
    const string HAVAL256_4 = 'haval256,4' ;
    const string HAVAL128_5 = 'haval128,5' ;
    const string HAVAL160_5 = 'haval160,5' ;
    const string HAVAL192_5 = 'haval192,5' ;
    const string HAVAL224_5 = 'haval224,5' ;
    const string HAVAL256_5 = 'haval256,5' ;

    // -------------------------------------------------------------------------
    // Non-cryptographic (checksums, fast hashing — NOT suitable for secrets)
    // -------------------------------------------------------------------------

    const string ADLER32   = 'adler32'   ;
    const string CRC32     = 'crc32'     ;
    const string CRC32B    = 'crc32b'    ;
    const string CRC32C    = 'crc32c'    ;
    const string FNV132    = 'fnv132'    ;
    const string FNV1A32   = 'fnv1a32'   ;
    const string FNV164    = 'fnv164'    ;
    const string FNV1A64   = 'fnv1a64'   ;
    const string JOAAT     = 'joaat'     ;
    const string MURMUR3A  = 'murmur3a'  ;
    const string MURMUR3C  = 'murmur3c'  ;
    const string MURMUR3F  = 'murmur3f'  ;
    const string XXH32     = 'xxh32'     ;
    const string XXH64     = 'xxh64'     ;
    const string XXH3      = 'xxh3'      ;
    const string XXH128    = 'xxh128'    ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Ensures an algorithm is supported by the runtime, throwing otherwise.
     *
     * @param string                 $algorithm The algorithm identifier to validate.
     * @param array<int,string>|null $available The list of algorithms supported by the runtime.
     *                                          Defaults to {@see hash_algos()}; injectable to test
     *                                          the runtime guard.
     *
     * @return void
     *
     * @throws ConstantException If the algorithm is unknown to this enum
     *                           or disabled at runtime.
     */
    public static function ensureAvailable( string $algorithm , ?array $available = null ) :void
    {
        self::validate( $algorithm ) ;

        if( !in_array( $algorithm , $available ?? hash_algos() , true ) )
        {
            throw new ConstantException
            (
                sprintf( "Hash algorithm '%s' is defined but not enabled on this PHP runtime." , $algorithm )
            );
        }
    }

    /**
     * Returns true when the given algorithm identifier is both defined on
     * this enum AND supported by the runtime.
     *
     * @param string $algorithm The algorithm identifier to check.
     *
     * @return bool
     */
    public static function isAvailable( string $algorithm ) :bool
    {
        return self::includes( $algorithm ) && in_array( $algorithm , hash_algos() , true ) ;
    }

    /**
     * Returns the list of algorithms actually supported by the current
     * PHP runtime (intersection of {@see self::enums()} and
     * {@see hash_algos()}).
     *
     * @return array<int,string>
     */
    public static function supported() :array
    {
        return array_values( array_intersect( self::enums() , hash_algos() ) ) ;
    }
}