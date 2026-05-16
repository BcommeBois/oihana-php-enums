<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2TokenTypeTest extends TestCase
{
    public function testHttpTokenTypes(): void
    {
        $this->assertSame( 'Bearer' , OAuth2TokenType::BEARER ) ;
        $this->assertSame( 'DPoP'   , OAuth2TokenType::DPOP   ) ;
        $this->assertSame( 'MAC'    , OAuth2TokenType::MAC    ) ;
        $this->assertSame( 'N_A'    , OAuth2TokenType::N_A    ) ;
    }

    public function testTokenExchangeUris(): void
    {
        $this->assertSame( 'urn:ietf:params:oauth:token-type:access_token'  , OAuth2TokenType::URI_ACCESS_TOKEN  ) ;
        $this->assertSame( 'urn:ietf:params:oauth:token-type:refresh_token' , OAuth2TokenType::URI_REFRESH_TOKEN ) ;
        $this->assertSame( 'urn:ietf:params:oauth:token-type:id_token'      , OAuth2TokenType::URI_ID_TOKEN      ) ;
        $this->assertSame( 'urn:ietf:params:oauth:token-type:saml1'         , OAuth2TokenType::URI_SAML1         ) ;
        $this->assertSame( 'urn:ietf:params:oauth:token-type:saml2'         , OAuth2TokenType::URI_SAML2         ) ;
        $this->assertSame( 'urn:ietf:params:oauth:token-type:jwt'           , OAuth2TokenType::URI_JWT           ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2TokenType::includes( 'Bearer'                                          ) ) ;
        $this->assertTrue ( OAuth2TokenType::includes( 'urn:ietf:params:oauth:token-type:access_token'   ) ) ;
        $this->assertFalse( OAuth2TokenType::includes( 'bearer'                                          ) ) ;
        $this->assertFalse( OAuth2TokenType::includes( 'unknown'                                         ) ) ;
    }
}
