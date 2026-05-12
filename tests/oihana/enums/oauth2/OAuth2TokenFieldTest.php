<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2TokenFieldTest extends TestCase
{
    public function testSuccessResponseFields(): void
    {
        $this->assertSame( 'access_token'  , OAuth2TokenField::ACCESS_TOKEN  ) ;
        $this->assertSame( 'token_type'    , OAuth2TokenField::TOKEN_TYPE    ) ;
        $this->assertSame( 'expires_in'    , OAuth2TokenField::EXPIRES_IN    ) ;
        $this->assertSame( 'refresh_token' , OAuth2TokenField::REFRESH_TOKEN ) ;
        $this->assertSame( 'scope'         , OAuth2TokenField::SCOPE         ) ;
    }

    public function testOidcFields(): void
    {
        $this->assertSame( 'id_token' , OAuth2TokenField::ID_TOKEN ) ;
    }

    public function testIntrospectionFields(): void
    {
        $this->assertSame( 'active'    , OAuth2TokenField::ACTIVE    ) ;
        $this->assertSame( 'client_id' , OAuth2TokenField::CLIENT_ID ) ;
        $this->assertSame( 'username'  , OAuth2TokenField::USERNAME  ) ;
        $this->assertSame( 'sub'       , OAuth2TokenField::SUB       ) ;
        $this->assertSame( 'aud'       , OAuth2TokenField::AUD       ) ;
        $this->assertSame( 'iss'       , OAuth2TokenField::ISS       ) ;
        $this->assertSame( 'exp'       , OAuth2TokenField::EXP       ) ;
        $this->assertSame( 'iat'       , OAuth2TokenField::IAT       ) ;
        $this->assertSame( 'nbf'       , OAuth2TokenField::NBF       ) ;
        $this->assertSame( 'jti'       , OAuth2TokenField::JTI       ) ;
    }

    public function testErrorResponseFields(): void
    {
        $this->assertSame( 'error'             , OAuth2TokenField::ERROR             ) ;
        $this->assertSame( 'error_description' , OAuth2TokenField::ERROR_DESCRIPTION ) ;
        $this->assertSame( 'error_uri'         , OAuth2TokenField::ERROR_URI         ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2TokenField::includes( 'access_token' ) ) ;
        $this->assertTrue ( OAuth2TokenField::includes( 'error'        ) ) ;
        $this->assertFalse( OAuth2TokenField::includes( 'ACCESS_TOKEN' ) ) ;
        $this->assertFalse( OAuth2TokenField::includes( 'unknown'      ) ) ;
    }
}
