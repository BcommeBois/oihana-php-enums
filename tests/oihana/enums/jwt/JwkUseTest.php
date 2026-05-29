<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwkUseTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'sig' , JwkUse::SIG ) ;
        $this->assertSame( 'enc' , JwkUse::ENC ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwkUse::includes( 'sig' ) ) ;
        $this->assertTrue ( JwkUse::includes( 'enc' ) ) ;
        $this->assertFalse( JwkUse::includes( 'SIG' ) ) ;
        $this->assertFalse( JwkUse::includes( 'use' ) ) ;
    }
}
