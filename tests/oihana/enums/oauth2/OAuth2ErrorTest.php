<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ErrorTest extends TestCase
{
    public function testAuthorizationEndpointErrors(): void
    {
        $this->assertSame( 'invalid_request'           , OAuth2Error::INVALID_REQUEST           ) ;
        $this->assertSame( 'unauthorized_client'       , OAuth2Error::UNAUTHORIZED_CLIENT       ) ;
        $this->assertSame( 'access_denied'             , OAuth2Error::ACCESS_DENIED             ) ;
        $this->assertSame( 'unsupported_response_type' , OAuth2Error::UNSUPPORTED_RESPONSE_TYPE ) ;
        $this->assertSame( 'invalid_scope'             , OAuth2Error::INVALID_SCOPE             ) ;
        $this->assertSame( 'server_error'              , OAuth2Error::SERVER_ERROR              ) ;
        $this->assertSame( 'temporarily_unavailable'   , OAuth2Error::TEMPORARILY_UNAVAILABLE   ) ;
    }

    public function testTokenEndpointErrors(): void
    {
        $this->assertSame( 'invalid_client'         , OAuth2Error::INVALID_CLIENT         ) ;
        $this->assertSame( 'invalid_grant'          , OAuth2Error::INVALID_GRANT          ) ;
        $this->assertSame( 'unsupported_grant_type' , OAuth2Error::UNSUPPORTED_GRANT_TYPE ) ;
    }

    public function testOpenIdConnectErrors(): void
    {
        $this->assertSame( 'interaction_required'       , OAuth2Error::INTERACTION_REQUIRED       ) ;
        $this->assertSame( 'login_required'             , OAuth2Error::LOGIN_REQUIRED             ) ;
        $this->assertSame( 'account_selection_required' , OAuth2Error::ACCOUNT_SELECTION_REQUIRED ) ;
        $this->assertSame( 'consent_required'           , OAuth2Error::CONSENT_REQUIRED           ) ;
        $this->assertSame( 'invalid_request_uri'        , OAuth2Error::INVALID_REQUEST_URI        ) ;
        $this->assertSame( 'invalid_request_object'     , OAuth2Error::INVALID_REQUEST_OBJECT     ) ;
        $this->assertSame( 'request_not_supported'      , OAuth2Error::REQUEST_NOT_SUPPORTED      ) ;
        $this->assertSame( 'request_uri_not_supported'  , OAuth2Error::REQUEST_URI_NOT_SUPPORTED  ) ;
        $this->assertSame( 'registration_not_supported' , OAuth2Error::REGISTRATION_NOT_SUPPORTED ) ;
    }

    public function testDeviceFlowErrors(): void
    {
        $this->assertSame( 'authorization_pending' , OAuth2Error::AUTHORIZATION_PENDING ) ;
        $this->assertSame( 'slow_down'             , OAuth2Error::SLOW_DOWN             ) ;
        $this->assertSame( 'expired_token'         , OAuth2Error::EXPIRED_TOKEN         ) ;
    }

    public function testExtensionErrors(): void
    {
        $this->assertSame( 'invalid_target'     , OAuth2Error::INVALID_TARGET     ) ;
        $this->assertSame( 'invalid_dpop_proof' , OAuth2Error::INVALID_DPOP_PROOF ) ;
        $this->assertSame( 'use_dpop_nonce'     , OAuth2Error::USE_DPOP_NONCE     ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2Error::includes( 'invalid_grant'         ) ) ;
        $this->assertTrue ( OAuth2Error::includes( 'authorization_pending' ) ) ;
        $this->assertFalse( OAuth2Error::includes( 'INVALID_GRANT'         ) ) ;
        $this->assertFalse( OAuth2Error::includes( 'unknown'               ) ) ;
    }
}
