<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwtHeaderTest extends TestCase
{
    public function testJwsCommonHeaders(): void
    {
        $this->assertSame( 'alg'      , JwtHeader::ALG      ) ;
        $this->assertSame( 'jku'      , JwtHeader::JKU      ) ;
        $this->assertSame( 'jwk'      , JwtHeader::JWK      ) ;
        $this->assertSame( 'kid'      , JwtHeader::KID      ) ;
        $this->assertSame( 'x5u'      , JwtHeader::X5U      ) ;
        $this->assertSame( 'x5c'      , JwtHeader::X5C      ) ;
        $this->assertSame( 'x5t'      , JwtHeader::X5T      ) ;
        $this->assertSame( 'x5t#S256' , JwtHeader::X5T_S256 ) ;
        $this->assertSame( 'typ'      , JwtHeader::TYP      ) ;
        $this->assertSame( 'cty'      , JwtHeader::CTY      ) ;
        $this->assertSame( 'crit'     , JwtHeader::CRIT     ) ;
    }

    public function testJweHeaders(): void
    {
        $this->assertSame( 'enc' , JwtHeader::ENC ) ;
        $this->assertSame( 'zip' , JwtHeader::ZIP ) ;
    }

    public function testExtensionHeaders(): void
    {
        $this->assertSame( 'b64'   , JwtHeader::B64   ) ;
        $this->assertSame( 'url'   , JwtHeader::URL   ) ;
        $this->assertSame( 'nonce' , JwtHeader::NONCE ) ;
        $this->assertSame( 'ppt'   , JwtHeader::PPT   ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwtHeader::includes( 'alg'      ) ) ;
        $this->assertTrue ( JwtHeader::includes( 'x5t#S256' ) ) ;
        $this->assertFalse( JwtHeader::includes( 'ALG'      ) ) ;
        $this->assertFalse( JwtHeader::includes( 'unknown'  ) ) ;
    }
}
