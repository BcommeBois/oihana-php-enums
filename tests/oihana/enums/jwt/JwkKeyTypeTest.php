<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwkKeyTypeTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'EC'  , JwkKeyType::EC  ) ;
        $this->assertSame( 'RSA' , JwkKeyType::RSA ) ;
        $this->assertSame( 'oct' , JwkKeyType::OCT ) ;
        $this->assertSame( 'OKP' , JwkKeyType::OKP ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwkKeyType::includes( 'EC'  ) ) ;
        $this->assertTrue ( JwkKeyType::includes( 'oct' ) ) ;
        $this->assertFalse( JwkKeyType::includes( 'ec'  ) ) ;
        $this->assertFalse( JwkKeyType::includes( 'DSA' ) ) ;
    }
}
