<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class AuthSchemeTest extends TestCase
{
    public function testCanonicalCasing(): void
    {
        $this->assertSame( 'Basic'  , AuthScheme::BASIC  ) ;
        $this->assertSame( 'Bearer' , AuthScheme::BEARER ) ;
        $this->assertSame( 'OAuth'  , AuthScheme::OAUTH  ) ;
        $this->assertSame( 'vapid'  , AuthScheme::VAPID  ) ; // intentionally lowercase per RFC 8292
    }

    public function testPrefixAddsSingleSpace(): void
    {
        $this->assertSame( 'Bearer ' , AuthScheme::prefix( AuthScheme::BEARER ) ) ;
        $this->assertSame( 'OAuth '  , AuthScheme::prefix( AuthScheme::OAUTH  ) ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( AuthScheme::includes( 'Bearer' ) ) ;
        $this->assertFalse( AuthScheme::includes( 'bearer' ) ) ; // strict casing
    }
}