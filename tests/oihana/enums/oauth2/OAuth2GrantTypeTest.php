<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2GrantTypeTest extends TestCase
{
    public function testCoreGrants(): void
    {
        $this->assertSame( 'authorization_code' , OAuth2GrantType::AUTHORIZATION_CODE ) ;
        $this->assertSame( 'client_credentials' , OAuth2GrantType::CLIENT_CREDENTIALS ) ;
        $this->assertSame( 'refresh_token'      , OAuth2GrantType::REFRESH_TOKEN      ) ;
        $this->assertSame( 'password'           , OAuth2GrantType::PASSWORD           ) ;
        $this->assertSame( 'implicit'           , OAuth2GrantType::IMPLICIT           ) ;
    }

    public function testExtensionGrants(): void
    {
        $this->assertSame( 'urn:ietf:params:oauth:grant-type:jwt-bearer'     , OAuth2GrantType::JWT_BEARER     ) ;
        $this->assertSame( 'urn:ietf:params:oauth:grant-type:saml2-bearer'   , OAuth2GrantType::SAML2_BEARER   ) ;
        $this->assertSame( 'urn:ietf:params:oauth:grant-type:device_code'    , OAuth2GrantType::DEVICE_CODE    ) ;
        $this->assertSame( 'urn:ietf:params:oauth:grant-type:token-exchange' , OAuth2GrantType::TOKEN_EXCHANGE ) ;
        $this->assertSame( 'urn:ietf:params:oauth:grant-type:uma-ticket'     , OAuth2GrantType::UMA_TICKET     ) ;
    }

    public function testOpenIdConnectGrants(): void
    {
        $this->assertSame( 'urn:openid:params:grant-type:ciba' , OAuth2GrantType::CIBA ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2GrantType::includes( 'authorization_code'                              ) ) ;
        $this->assertTrue ( OAuth2GrantType::includes( 'client_credentials'                              ) ) ;
        $this->assertTrue ( OAuth2GrantType::includes( 'urn:ietf:params:oauth:grant-type:jwt-bearer'     ) ) ;
        $this->assertTrue ( OAuth2GrantType::includes( 'urn:ietf:params:oauth:grant-type:token-exchange' ) ) ;
        $this->assertTrue ( OAuth2GrantType::includes( 'urn:openid:params:grant-type:ciba'               ) ) ;
        $this->assertFalse( OAuth2GrantType::includes( 'AUTHORIZATION_CODE'                              ) ) ;
        $this->assertFalse( OAuth2GrantType::includes( 'unknown'                                         ) ) ;
    }
}
