<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OidcDiscoveryFieldTest extends TestCase
{
    public function testCoreEndpoints(): void
    {
        $this->assertSame( 'issuer'                                , OidcDiscoveryField::ISSUER                                ) ;
        $this->assertSame( 'authorization_endpoint'                , OidcDiscoveryField::AUTHORIZATION_ENDPOINT                ) ;
        $this->assertSame( 'token_endpoint'                        , OidcDiscoveryField::TOKEN_ENDPOINT                        ) ;
        $this->assertSame( 'userinfo_endpoint'                     , OidcDiscoveryField::USERINFO_ENDPOINT                     ) ;
        $this->assertSame( 'jwks_uri'                              , OidcDiscoveryField::JWKS_URI                              ) ;
        $this->assertSame( 'registration_endpoint'                 , OidcDiscoveryField::REGISTRATION_ENDPOINT                 ) ;
        $this->assertSame( 'introspection_endpoint'                , OidcDiscoveryField::INTROSPECTION_ENDPOINT                ) ;
        $this->assertSame( 'revocation_endpoint'                   , OidcDiscoveryField::REVOCATION_ENDPOINT                   ) ;
        $this->assertSame( 'device_authorization_endpoint'         , OidcDiscoveryField::DEVICE_AUTHORIZATION_ENDPOINT         ) ;
        $this->assertSame( 'pushed_authorization_request_endpoint' , OidcDiscoveryField::PUSHED_AUTHORIZATION_REQUEST_ENDPOINT ) ;
        $this->assertSame( 'backchannel_authentication_endpoint'   , OidcDiscoveryField::BACKCHANNEL_AUTHENTICATION_ENDPOINT   ) ;
        $this->assertSame( 'end_session_endpoint'                  , OidcDiscoveryField::END_SESSION_ENDPOINT                  ) ;
        $this->assertSame( 'check_session_iframe'                  , OidcDiscoveryField::CHECK_SESSION_IFRAME                  ) ;
    }

    public function testSupportedCapabilities(): void
    {
        $this->assertSame( 'scopes_supported'                 , OidcDiscoveryField::SCOPES_SUPPORTED                 ) ;
        $this->assertSame( 'response_types_supported'         , OidcDiscoveryField::RESPONSE_TYPES_SUPPORTED         ) ;
        $this->assertSame( 'response_modes_supported'         , OidcDiscoveryField::RESPONSE_MODES_SUPPORTED         ) ;
        $this->assertSame( 'grant_types_supported'            , OidcDiscoveryField::GRANT_TYPES_SUPPORTED            ) ;
        $this->assertSame( 'acr_values_supported'             , OidcDiscoveryField::ACR_VALUES_SUPPORTED             ) ;
        $this->assertSame( 'subject_types_supported'          , OidcDiscoveryField::SUBJECT_TYPES_SUPPORTED          ) ;
        $this->assertSame( 'display_values_supported'         , OidcDiscoveryField::DISPLAY_VALUES_SUPPORTED         ) ;
        $this->assertSame( 'claim_types_supported'            , OidcDiscoveryField::CLAIM_TYPES_SUPPORTED            ) ;
        $this->assertSame( 'claims_supported'                 , OidcDiscoveryField::CLAIMS_SUPPORTED                 ) ;
        $this->assertSame( 'claims_locales_supported'         , OidcDiscoveryField::CLAIMS_LOCALES_SUPPORTED         ) ;
        $this->assertSame( 'ui_locales_supported'             , OidcDiscoveryField::UI_LOCALES_SUPPORTED             ) ;
        $this->assertSame( 'code_challenge_methods_supported' , OidcDiscoveryField::CODE_CHALLENGE_METHODS_SUPPORTED ) ;
    }

    public function testSigningAlgorithmFields(): void
    {
        $this->assertSame( 'id_token_signing_alg_values_supported'    , OidcDiscoveryField::ID_TOKEN_SIGNING_ALG_VALUES_SUPPORTED    ) ;
        $this->assertSame( 'id_token_encryption_alg_values_supported' , OidcDiscoveryField::ID_TOKEN_ENCRYPTION_ALG_VALUES_SUPPORTED ) ;
        $this->assertSame( 'id_token_encryption_enc_values_supported' , OidcDiscoveryField::ID_TOKEN_ENCRYPTION_ENC_VALUES_SUPPORTED ) ;
        $this->assertSame( 'dpop_signing_alg_values_supported'        , OidcDiscoveryField::DPOP_SIGNING_ALG_VALUES_SUPPORTED        ) ;
    }

    public function testAuthMethodFields(): void
    {
        $this->assertSame( 'token_endpoint_auth_methods_supported'         , OidcDiscoveryField::TOKEN_ENDPOINT_AUTH_METHODS_SUPPORTED         ) ;
        $this->assertSame( 'token_endpoint_auth_signing_alg_values_supported' , OidcDiscoveryField::TOKEN_ENDPOINT_AUTH_SIGNING_ALG_VALUES_SUPPORTED ) ;
    }

    public function testBooleanCapabilities(): void
    {
        $this->assertSame( 'claims_parameter_supported'                  , OidcDiscoveryField::CLAIMS_PARAMETER_SUPPORTED                  ) ;
        $this->assertSame( 'request_parameter_supported'                 , OidcDiscoveryField::REQUEST_PARAMETER_SUPPORTED                 ) ;
        $this->assertSame( 'request_uri_parameter_supported'             , OidcDiscoveryField::REQUEST_URI_PARAMETER_SUPPORTED             ) ;
        $this->assertSame( 'require_request_uri_registration'            , OidcDiscoveryField::REQUIRE_REQUEST_URI_REGISTRATION            ) ;
        $this->assertSame( 'require_pushed_authorization_requests'       , OidcDiscoveryField::REQUIRE_PUSHED_AUTHORIZATION_REQUESTS       ) ;
        $this->assertSame( 'tls_client_certificate_bound_access_tokens'  , OidcDiscoveryField::TLS_CLIENT_CERTIFICATE_BOUND_ACCESS_TOKENS  ) ;
        $this->assertSame( 'frontchannel_logout_supported'               , OidcDiscoveryField::FRONTCHANNEL_LOGOUT_SUPPORTED               ) ;
        $this->assertSame( 'frontchannel_logout_session_supported'       , OidcDiscoveryField::FRONTCHANNEL_LOGOUT_SESSION_SUPPORTED       ) ;
        $this->assertSame( 'backchannel_logout_supported'                , OidcDiscoveryField::BACKCHANNEL_LOGOUT_SUPPORTED                ) ;
        $this->assertSame( 'backchannel_logout_session_supported'        , OidcDiscoveryField::BACKCHANNEL_LOGOUT_SESSION_SUPPORTED        ) ;
    }

    public function testPolicyFields(): void
    {
        $this->assertSame( 'service_documentation' , OidcDiscoveryField::SERVICE_DOCUMENTATION ) ;
        $this->assertSame( 'op_policy_uri'         , OidcDiscoveryField::OP_POLICY_URI         ) ;
        $this->assertSame( 'op_tos_uri'            , OidcDiscoveryField::OP_TOS_URI            ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OidcDiscoveryField::includes( 'issuer'                  ) ) ;
        $this->assertTrue ( OidcDiscoveryField::includes( 'jwks_uri'                ) ) ;
        $this->assertTrue ( OidcDiscoveryField::includes( 'token_endpoint'          ) ) ;
        $this->assertFalse( OidcDiscoveryField::includes( 'ISSUER'                  ) ) ;
        $this->assertFalse( OidcDiscoveryField::includes( 'unknown_field'           ) ) ;
    }
}
