<?php

namespace tests\oihana\enums;

use PHPUnit\Framework\TestCase;

use oihana\enums\HashAlgorithm;
use oihana\reflect\exceptions\ConstantException;

class HashAlgorithmTest extends TestCase
{
    public function testEnums() :void
    {
        $enums = HashAlgorithm::enums() ;
        $this->assertIsArray( $enums ) ;

        $expectedValues =
        [
            // MD family
            HashAlgorithm::MD2 ,
            HashAlgorithm::MD4 ,
            HashAlgorithm::MD5 ,

            // SHA-1
            HashAlgorithm::SHA1 ,

            // SHA-2 family
            HashAlgorithm::SHA224 ,
            HashAlgorithm::SHA256 ,
            HashAlgorithm::SHA384 ,
            HashAlgorithm::SHA512 ,
            HashAlgorithm::SHA512_224 ,
            HashAlgorithm::SHA512_256 ,

            // SHA-3 family
            HashAlgorithm::SHA3_224 ,
            HashAlgorithm::SHA3_256 ,
            HashAlgorithm::SHA3_384 ,
            HashAlgorithm::SHA3_512 ,

            // RIPEMD family
            HashAlgorithm::RIPEMD128 ,
            HashAlgorithm::RIPEMD160 ,
            HashAlgorithm::RIPEMD256 ,
            HashAlgorithm::RIPEMD320 ,

            // Whirlpool
            HashAlgorithm::WHIRLPOOL ,

            // Tiger family
            HashAlgorithm::TIGER128_3 ,
            HashAlgorithm::TIGER160_3 ,
            HashAlgorithm::TIGER192_3 ,
            HashAlgorithm::TIGER128_4 ,
            HashAlgorithm::TIGER160_4 ,
            HashAlgorithm::TIGER192_4 ,

            // Snefru
            HashAlgorithm::SNEFRU ,
            HashAlgorithm::SNEFRU256 ,

            // GOST family
            HashAlgorithm::GOST ,
            HashAlgorithm::GOST_CRYPTO ,

            // HAVAL family
            HashAlgorithm::HAVAL128_3 ,
            HashAlgorithm::HAVAL160_3 ,
            HashAlgorithm::HAVAL192_3 ,
            HashAlgorithm::HAVAL224_3 ,
            HashAlgorithm::HAVAL256_3 ,
            HashAlgorithm::HAVAL128_4 ,
            HashAlgorithm::HAVAL160_4 ,
            HashAlgorithm::HAVAL192_4 ,
            HashAlgorithm::HAVAL224_4 ,
            HashAlgorithm::HAVAL256_4 ,
            HashAlgorithm::HAVAL128_5 ,
            HashAlgorithm::HAVAL160_5 ,
            HashAlgorithm::HAVAL192_5 ,
            HashAlgorithm::HAVAL224_5 ,
            HashAlgorithm::HAVAL256_5 ,

            // Non-cryptographic
            HashAlgorithm::ADLER32 ,
            HashAlgorithm::CRC32 ,
            HashAlgorithm::CRC32B ,
            HashAlgorithm::CRC32C ,
            HashAlgorithm::FNV132 ,
            HashAlgorithm::FNV1A32 ,
            HashAlgorithm::FNV164 ,
            HashAlgorithm::FNV1A64 ,
            HashAlgorithm::JOAAT ,
            HashAlgorithm::MURMUR3A ,
            HashAlgorithm::MURMUR3C ,
            HashAlgorithm::MURMUR3F ,
            HashAlgorithm::XXH32 ,
            HashAlgorithm::XXH64 ,
            HashAlgorithm::XXH3 ,
            HashAlgorithm::XXH128 ,
        ] ;

        foreach( $expectedValues as $value )
        {
            $this->assertContains( $value , $enums ) ;
        }
    }

    public function testSha256ConstantMatchesPhpIdentifier() :void
    {
        $this->assertSame( 'sha256' , HashAlgorithm::SHA256 ) ;
    }

    public function testSha512Slash256UsesCanonicalSlashSeparator() :void
    {
        $this->assertSame( 'sha512/256' , HashAlgorithm::SHA512_256 ) ;
    }

    public function testSha3DashedNameIsPreserved() :void
    {
        $this->assertSame( 'sha3-256' , HashAlgorithm::SHA3_256 ) ;
    }

    public function testTigerUsesCommaSeparator() :void
    {
        $this->assertSame( 'tiger192,4' , HashAlgorithm::TIGER192_4 ) ;
    }

    public function testAllConstantsAreLowercase() :void
    {
        foreach( HashAlgorithm::enums() as $value )
        {
            $this->assertSame
            (
                strtolower( $value ) ,
                $value ,
                "Algorithm identifier '$value' must be lowercase (PHP hash()/hash_algos() convention)."
            ) ;
        }
    }

    public function testIncludesReturnsTrueForSha256() :void
    {
        $this->assertTrue( HashAlgorithm::includes( HashAlgorithm::SHA256 ) ) ;
    }

    public function testIncludesReturnsFalseForUnknownAlgorithm() :void
    {
        $this->assertFalse( HashAlgorithm::includes( 'bogus-algo' ) ) ;
    }

    public function testSupportedIsSubsetOfEnums() :void
    {
        $supported = HashAlgorithm::supported() ;
        $enums     = HashAlgorithm::enums() ;

        $this->assertIsArray( $supported ) ;

        foreach( $supported as $value )
        {
            $this->assertContains
            (
                $value ,
                $enums ,
                "supported() must only return values declared as constants on HashAlgorithm."
            ) ;
        }
    }

    public function testSupportedContainsSha256OnStandardPhpBuilds() :void
    {
        if( !in_array( 'sha256' , hash_algos() , true ) )
        {
            $this->markTestSkipped( 'sha256 is not available on this PHP runtime' ) ;
        }

        $this->assertContains( HashAlgorithm::SHA256 , HashAlgorithm::supported() ) ;
    }

    public function testIsAvailableReturnsTrueForSha256() :void
    {
        if( !in_array( 'sha256' , hash_algos() , true ) )
        {
            $this->markTestSkipped( 'sha256 is not available on this PHP runtime' ) ;
        }

        $this->assertTrue( HashAlgorithm::isAvailable( HashAlgorithm::SHA256 ) ) ;
    }

    public function testIsAvailableReturnsFalseForUnknown() :void
    {
        $this->assertFalse( HashAlgorithm::isAvailable( 'not-a-real-algo' ) ) ;
    }

    /**
     * @return void
     * @throws ConstantException
     */
    public function testEnsureAvailablePassesForSha256() :void
    {
        if( !in_array( 'sha256' , hash_algos() , true ) )
        {
            $this->markTestSkipped( 'sha256 is not available on this PHP runtime' ) ;
        }

        // Should not throw.
        HashAlgorithm::ensureAvailable( HashAlgorithm::SHA256 ) ;
        $this->addToAssertionCount( 1 ) ;
    }

    public function testEnsureAvailableThrowsForUnknownConstant() :void
    {
        $this->expectException( ConstantException::class ) ;
        HashAlgorithm::ensureAvailable( 'not-a-real-algo' ) ;
    }

    public function testHashSha256ProducesExpectedDigest() :void
    {
        if( !in_array( 'sha256' , hash_algos() , true ) )
        {
            $this->markTestSkipped( 'sha256 is not available on this PHP runtime' ) ;
        }

        $this->assertSame
        (
            hash( 'sha256' , 'oihana' ) ,
            hash( HashAlgorithm::SHA256 , 'oihana' ) ,
            "Using the enum constant must produce the same digest as the raw string."
        ) ;
    }
}