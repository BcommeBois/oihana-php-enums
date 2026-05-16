<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ClientAssertionTypeTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer'   , OAuth2ClientAssertionType::JWT_BEARER   ) ;
        $this->assertSame( 'urn:ietf:params:oauth:client-assertion-type:saml2-bearer' , OAuth2ClientAssertionType::SAML2_BEARER ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2ClientAssertionType::includes( 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer'   ) ) ;
        $this->assertTrue ( OAuth2ClientAssertionType::includes( 'urn:ietf:params:oauth:client-assertion-type:saml2-bearer' ) ) ;
        $this->assertFalse( OAuth2ClientAssertionType::includes( 'jwt-bearer'                                                ) ) ;
        $this->assertFalse( OAuth2ClientAssertionType::includes( 'unknown'                                                   ) ) ;
    }
}
