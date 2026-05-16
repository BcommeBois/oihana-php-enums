<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2DisplayTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'page'  , OAuth2Display::PAGE  ) ;
        $this->assertSame( 'popup' , OAuth2Display::POPUP ) ;
        $this->assertSame( 'touch' , OAuth2Display::TOUCH ) ;
        $this->assertSame( 'wap'   , OAuth2Display::WAP   ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2Display::includes( 'page'  ) ) ;
        $this->assertTrue ( OAuth2Display::includes( 'wap'   ) ) ;
        $this->assertFalse( OAuth2Display::includes( 'PAGE'  ) ) ;
        $this->assertFalse( OAuth2Display::includes( 'mobile') ) ;
    }
}
