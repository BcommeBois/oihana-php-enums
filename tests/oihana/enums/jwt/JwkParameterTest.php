<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwkParameterTest extends TestCase
{
    public function testCommonMetadata(): void
    {
        $this->assertSame( 'kty'      , JwkParameter::KTY      ) ;
        $this->assertSame( 'use'      , JwkParameter::USE      ) ;
        $this->assertSame( 'key_ops'  , JwkParameter::KEY_OPS  ) ;
        $this->assertSame( 'alg'      , JwkParameter::ALG      ) ;
        $this->assertSame( 'kid'      , JwkParameter::KID      ) ;
        $this->assertSame( 'x5u'      , JwkParameter::X5U      ) ;
        $this->assertSame( 'x5c'      , JwkParameter::X5C      ) ;
        $this->assertSame( 'x5t'      , JwkParameter::X5T      ) ;
        $this->assertSame( 'x5t#S256' , JwkParameter::X5T_S256 ) ;
        $this->assertSame( 'keys'     , JwkParameter::KEYS     ) ;
    }

    public function testEcAndOkpValues(): void
    {
        $this->assertSame( 'crv' , JwkParameter::CRV ) ;
        $this->assertSame( 'x'   , JwkParameter::X   ) ;
        $this->assertSame( 'y'   , JwkParameter::Y   ) ;
        $this->assertSame( 'd'   , JwkParameter::D   ) ;
    }

    public function testRsaValues(): void
    {
        $this->assertSame( 'n'   , JwkParameter::N   ) ;
        $this->assertSame( 'e'   , JwkParameter::E   ) ;
        $this->assertSame( 'p'   , JwkParameter::P   ) ;
        $this->assertSame( 'q'   , JwkParameter::Q   ) ;
        $this->assertSame( 'dp'  , JwkParameter::DP  ) ;
        $this->assertSame( 'dq'  , JwkParameter::DQ  ) ;
        $this->assertSame( 'qi'  , JwkParameter::QI  ) ;
        $this->assertSame( 'oth' , JwkParameter::OTH ) ;
    }

    public function testSymmetricValue(): void
    {
        $this->assertSame( 'k' , JwkParameter::K ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwkParameter::includes( 'kty'      ) ) ;
        $this->assertTrue ( JwkParameter::includes( 'x5t#S256' ) ) ;
        $this->assertTrue ( JwkParameter::includes( 'n'        ) ) ;
        $this->assertFalse( JwkParameter::includes( 'KTY'      ) ) ;
        $this->assertFalse( JwkParameter::includes( 'unknown'  ) ) ;
    }
}
