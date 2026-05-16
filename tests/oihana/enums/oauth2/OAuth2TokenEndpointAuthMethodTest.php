<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2TokenEndpointAuthMethodTest extends TestCase
{
    public function testSecretBasedMethods(): void
    {
        $this->assertSame( 'client_secret_basic' , OAuth2TokenEndpointAuthMethod::CLIENT_SECRET_BASIC ) ;
        $this->assertSame( 'client_secret_post'  , OAuth2TokenEndpointAuthMethod::CLIENT_SECRET_POST  ) ;
        $this->assertSame( 'client_secret_jwt'   , OAuth2TokenEndpointAuthMethod::CLIENT_SECRET_JWT   ) ;
    }

    public function testAssertionBasedMethods(): void
    {
        $this->assertSame( 'private_key_jwt' , OAuth2TokenEndpointAuthMethod::PRIVATE_KEY_JWT ) ;
    }

    public function testPublicClient(): void
    {
        $this->assertSame( 'none' , OAuth2TokenEndpointAuthMethod::NONE ) ;
    }

    public function testMtlsMethods(): void
    {
        $this->assertSame( 'tls_client_auth'             , OAuth2TokenEndpointAuthMethod::TLS_CLIENT_AUTH             ) ;
        $this->assertSame( 'self_signed_tls_client_auth' , OAuth2TokenEndpointAuthMethod::SELF_SIGNED_TLS_CLIENT_AUTH ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2TokenEndpointAuthMethod::includes( 'private_key_jwt'     ) ) ;
        $this->assertTrue ( OAuth2TokenEndpointAuthMethod::includes( 'tls_client_auth'     ) ) ;
        $this->assertFalse( OAuth2TokenEndpointAuthMethod::includes( 'PRIVATE_KEY_JWT'     ) ) ;
        $this->assertFalse( OAuth2TokenEndpointAuthMethod::includes( 'unknown'             ) ) ;
    }
}
