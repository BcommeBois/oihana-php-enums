<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ClientMetadataTest extends TestCase
{
    public function testClientMetadataFields(): void
    {
        $this->assertSame( 'redirect_uris'              , OAuth2ClientMetadata::REDIRECT_URIS              ) ;
        $this->assertSame( 'token_endpoint_auth_method' , OAuth2ClientMetadata::TOKEN_ENDPOINT_AUTH_METHOD ) ;
        $this->assertSame( 'grant_types'                , OAuth2ClientMetadata::GRANT_TYPES                ) ;
        $this->assertSame( 'jwks_uri'                   , OAuth2ClientMetadata::JWKS_URI                   ) ;
        $this->assertSame( 'software_statement'         , OAuth2ClientMetadata::SOFTWARE_STATEMENT         ) ;
    }

    public function testRegistrationResponseFields(): void
    {
        $this->assertSame( 'client_id'                 , OAuth2ClientMetadata::CLIENT_ID                 ) ;
        $this->assertSame( 'client_secret_expires_at'  , OAuth2ClientMetadata::CLIENT_SECRET_EXPIRES_AT  ) ;
        $this->assertSame( 'registration_access_token' , OAuth2ClientMetadata::REGISTRATION_ACCESS_TOKEN ) ;
        $this->assertSame( 'registration_client_uri'   , OAuth2ClientMetadata::REGISTRATION_CLIENT_URI   ) ;
    }

    public function testOidcFields(): void
    {
        $this->assertSame( 'application_type'              , OAuth2ClientMetadata::APPLICATION_TYPE              ) ;
        $this->assertSame( 'subject_type'                  , OAuth2ClientMetadata::SUBJECT_TYPE                  ) ;
        $this->assertSame( 'id_token_signed_response_alg'  , OAuth2ClientMetadata::ID_TOKEN_SIGNED_RESPONSE_ALG  ) ;
        $this->assertSame( 'request_object_encryption_enc' , OAuth2ClientMetadata::REQUEST_OBJECT_ENCRYPTION_ENC ) ;
        $this->assertSame( 'backchannel_logout_uri'        , OAuth2ClientMetadata::BACKCHANNEL_LOGOUT_URI        ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2ClientMetadata::includes( 'redirect_uris' ) ) ;
        $this->assertTrue ( OAuth2ClientMetadata::includes( 'subject_type'  ) ) ;
        $this->assertFalse( OAuth2ClientMetadata::includes( 'Redirect_Uris' ) ) ;
        $this->assertFalse( OAuth2ClientMetadata::includes( 'client_email'  ) ) ;
    }
}
