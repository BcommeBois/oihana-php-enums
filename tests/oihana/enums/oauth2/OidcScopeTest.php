<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OidcScopeTest extends TestCase
{
    public function testStandardScopes(): void
    {
        $this->assertSame( 'openid'         , OidcScope::OPENID         ) ;
        $this->assertSame( 'profile'        , OidcScope::PROFILE        ) ;
        $this->assertSame( 'email'          , OidcScope::EMAIL          ) ;
        $this->assertSame( 'address'        , OidcScope::ADDRESS        ) ;
        $this->assertSame( 'phone'          , OidcScope::PHONE          ) ;
        $this->assertSame( 'offline_access' , OidcScope::OFFLINE_ACCESS ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OidcScope::includes( 'openid'         ) ) ;
        $this->assertTrue ( OidcScope::includes( 'offline_access' ) ) ;
        $this->assertFalse( OidcScope::includes( 'OPENID'         ) ) ;
        $this->assertFalse( OidcScope::includes( 'unknown'        ) ) ;
    }
}
