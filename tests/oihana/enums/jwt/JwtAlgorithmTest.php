<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwtAlgorithmTest extends TestCase
{
    public function testHmacAlgorithms(): void
    {
        $this->assertSame( 'HS256' , JwtAlgorithm::HS256 ) ;
        $this->assertSame( 'HS384' , JwtAlgorithm::HS384 ) ;
        $this->assertSame( 'HS512' , JwtAlgorithm::HS512 ) ;
    }

    public function testRsaAlgorithms(): void
    {
        $this->assertSame( 'RS256' , JwtAlgorithm::RS256 ) ;
        $this->assertSame( 'RS384' , JwtAlgorithm::RS384 ) ;
        $this->assertSame( 'RS512' , JwtAlgorithm::RS512 ) ;
        $this->assertSame( 'PS256' , JwtAlgorithm::PS256 ) ;
        $this->assertSame( 'PS384' , JwtAlgorithm::PS384 ) ;
        $this->assertSame( 'PS512' , JwtAlgorithm::PS512 ) ;
    }

    public function testEcdsaAlgorithms(): void
    {
        $this->assertSame( 'ES256'  , JwtAlgorithm::ES256  ) ;
        $this->assertSame( 'ES384'  , JwtAlgorithm::ES384  ) ;
        $this->assertSame( 'ES512'  , JwtAlgorithm::ES512  ) ;
        $this->assertSame( 'ES256K' , JwtAlgorithm::ES256K ) ;
    }

    public function testEddsaAndNone(): void
    {
        $this->assertSame( 'EdDSA' , JwtAlgorithm::EDDSA ) ;
        $this->assertSame( 'none'  , JwtAlgorithm::NONE  ) ;
    }

    public function testJweKeyManagementAlgorithms(): void
    {
        $this->assertSame( 'RSA1_5'             , JwtAlgorithm::RSA1_5             ) ;
        $this->assertSame( 'RSA-OAEP'           , JwtAlgorithm::RSA_OAEP           ) ;
        $this->assertSame( 'RSA-OAEP-256'       , JwtAlgorithm::RSA_OAEP_256       ) ;
        $this->assertSame( 'A128KW'             , JwtAlgorithm::A128KW             ) ;
        $this->assertSame( 'A192KW'             , JwtAlgorithm::A192KW             ) ;
        $this->assertSame( 'A256KW'             , JwtAlgorithm::A256KW             ) ;
        $this->assertSame( 'dir'                , JwtAlgorithm::DIR                ) ;
        $this->assertSame( 'ECDH-ES'            , JwtAlgorithm::ECDH_ES            ) ;
        $this->assertSame( 'ECDH-ES+A128KW'     , JwtAlgorithm::ECDH_ES_A128KW     ) ;
        $this->assertSame( 'ECDH-ES+A192KW'     , JwtAlgorithm::ECDH_ES_A192KW     ) ;
        $this->assertSame( 'ECDH-ES+A256KW'     , JwtAlgorithm::ECDH_ES_A256KW     ) ;
        $this->assertSame( 'A128GCMKW'          , JwtAlgorithm::A128GCMKW          ) ;
        $this->assertSame( 'A192GCMKW'          , JwtAlgorithm::A192GCMKW          ) ;
        $this->assertSame( 'A256GCMKW'          , JwtAlgorithm::A256GCMKW          ) ;
        $this->assertSame( 'PBES2-HS256+A128KW' , JwtAlgorithm::PBES2_HS256_A128KW ) ;
        $this->assertSame( 'PBES2-HS384+A192KW' , JwtAlgorithm::PBES2_HS384_A192KW ) ;
        $this->assertSame( 'PBES2-HS512+A256KW' , JwtAlgorithm::PBES2_HS512_A256KW ) ;
    }

    public function testJweContentEncryptionAlgorithms(): void
    {
        $this->assertSame( 'A128CBC-HS256' , JwtAlgorithm::A128CBC_HS256 ) ;
        $this->assertSame( 'A192CBC-HS384' , JwtAlgorithm::A192CBC_HS384 ) ;
        $this->assertSame( 'A256CBC-HS512' , JwtAlgorithm::A256CBC_HS512 ) ;
        $this->assertSame( 'A128GCM'       , JwtAlgorithm::A128GCM       ) ;
        $this->assertSame( 'A192GCM'       , JwtAlgorithm::A192GCM       ) ;
        $this->assertSame( 'A256GCM'       , JwtAlgorithm::A256GCM       ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwtAlgorithm::includes( 'RS256'         ) ) ;
        $this->assertTrue ( JwtAlgorithm::includes( 'EdDSA'         ) ) ;
        $this->assertTrue ( JwtAlgorithm::includes( 'A128CBC-HS256' ) ) ;
        $this->assertFalse( JwtAlgorithm::includes( 'rs256'         ) ) ;
        $this->assertFalse( JwtAlgorithm::includes( 'unknown'       ) ) ;
    }
}
