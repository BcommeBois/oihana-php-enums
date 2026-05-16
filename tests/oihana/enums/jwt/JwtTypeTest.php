<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwtTypeTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'JWT'                     , JwtType::JWT                     ) ;
        $this->assertSame( 'at+jwt'                  , JwtType::AT_JWT                  ) ;
        $this->assertSame( 'dpop+jwt'                , JwtType::DPOP_JWT                ) ;
        $this->assertSame( 'logout+jwt'              , JwtType::LOGOUT_JWT              ) ;
        $this->assertSame( 'secevent+jwt'            , JwtType::SECEVENT_JWT            ) ;
        $this->assertSame( 'token-introspection+jwt' , JwtType::TOKEN_INTROSPECTION_JWT ) ;
        $this->assertSame( 'it+jwt'                  , JwtType::IT_JWT                  ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwtType::includes( 'JWT'      ) ) ;
        $this->assertTrue ( JwtType::includes( 'at+jwt'   ) ) ;
        $this->assertTrue ( JwtType::includes( 'dpop+jwt' ) ) ;
        $this->assertFalse( JwtType::includes( 'jwt'      ) ) ;
        $this->assertFalse( JwtType::includes( 'unknown'  ) ) ;
    }
}
