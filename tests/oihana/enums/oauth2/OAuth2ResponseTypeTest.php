<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ResponseTypeTest extends TestCase
{
    public function testCoreResponseTypes(): void
    {
        $this->assertSame( 'code'  , OAuth2ResponseType::CODE  ) ;
        $this->assertSame( 'token' , OAuth2ResponseType::TOKEN ) ;
    }

    public function testOpenIdConnectResponseTypes(): void
    {
        $this->assertSame( 'id_token' , OAuth2ResponseType::ID_TOKEN ) ;
        $this->assertSame( 'none'     , OAuth2ResponseType::NONE     ) ;
    }

    public function testHybridResponseTypes(): void
    {
        $this->assertSame( 'code id_token'       , OAuth2ResponseType::CODE_ID_TOKEN       ) ;
        $this->assertSame( 'code token'          , OAuth2ResponseType::CODE_TOKEN          ) ;
        $this->assertSame( 'id_token token'      , OAuth2ResponseType::ID_TOKEN_TOKEN      ) ;
        $this->assertSame( 'code id_token token' , OAuth2ResponseType::CODE_ID_TOKEN_TOKEN ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2ResponseType::includes( 'code'                ) ) ;
        $this->assertTrue ( OAuth2ResponseType::includes( 'code id_token token' ) ) ;
        $this->assertFalse( OAuth2ResponseType::includes( 'CODE'                ) ) ;
        $this->assertFalse( OAuth2ResponseType::includes( 'unknown'             ) ) ;
    }
}
