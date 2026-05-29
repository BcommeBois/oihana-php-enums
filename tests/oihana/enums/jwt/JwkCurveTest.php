<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwkCurveTest extends TestCase
{
    public function testEllipticCurveValues(): void
    {
        $this->assertSame( 'P-256'     , JwkCurve::P_256     ) ;
        $this->assertSame( 'P-384'     , JwkCurve::P_384     ) ;
        $this->assertSame( 'P-521'     , JwkCurve::P_521     ) ;
        $this->assertSame( 'secp256k1' , JwkCurve::SECP256K1 ) ;
    }

    public function testOctetKeyPairValues(): void
    {
        $this->assertSame( 'Ed25519' , JwkCurve::ED25519 ) ;
        $this->assertSame( 'Ed448'   , JwkCurve::ED448   ) ;
        $this->assertSame( 'X25519'  , JwkCurve::X25519  ) ;
        $this->assertSame( 'X448'    , JwkCurve::X448    ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwkCurve::includes( 'P-256'   ) ) ;
        $this->assertTrue ( JwkCurve::includes( 'Ed25519' ) ) ;
        $this->assertFalse( JwkCurve::includes( 'p-256'   ) ) ;
        $this->assertFalse( JwkCurve::includes( 'P256'    ) ) ;
    }
}
