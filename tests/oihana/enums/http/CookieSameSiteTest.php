<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class CookieSameSiteTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'Strict' , CookieSameSite::STRICT ) ;
        $this->assertSame( 'Lax'    , CookieSameSite::LAX    ) ;
        $this->assertSame( 'None'   , CookieSameSite::NONE   ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( CookieSameSite::includes( 'Strict' ) ) ;
        $this->assertTrue ( CookieSameSite::includes( 'None'   ) ) ;
        $this->assertFalse( CookieSameSite::includes( 'strict' ) ) ;
        $this->assertFalse( CookieSameSite::includes( 'lax'    ) ) ;
    }
}
