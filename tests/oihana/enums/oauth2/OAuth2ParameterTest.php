<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ParameterTest extends TestCase
{
    public function testAuthorizationRequestParameters(): void
    {
        $this->assertSame( 'client_id'     , OAuth2Parameter::CLIENT_ID     ) ;
        $this->assertSame( 'redirect_uri'  , OAuth2Parameter::REDIRECT_URI  ) ;
        $this->assertSame( 'response_type' , OAuth2Parameter::RESPONSE_TYPE ) ;
        $this->assertSame( 'scope'         , OAuth2Parameter::SCOPE         ) ;
        $this->assertSame( 'state'         , OAuth2Parameter::STATE         ) ;
    }

    public function testPkceParameters(): void
    {
        $this->assertSame( 'code_challenge'        , OAuth2Parameter::CODE_CHALLENGE        ) ;
        $this->assertSame( 'code_challenge_method' , OAuth2Parameter::CODE_CHALLENGE_METHOD ) ;
        $this->assertSame( 'code_verifier'         , OAuth2Parameter::CODE_VERIFIER         ) ;
    }

    public function testTokenRequestParameters(): void
    {
        $this->assertSame( 'client_secret' , OAuth2Parameter::CLIENT_SECRET ) ;
        $this->assertSame( 'code'          , OAuth2Parameter::CODE          ) ;
        $this->assertSame( 'grant_type'    , OAuth2Parameter::GRANT_TYPE    ) ;
        $this->assertSame( 'password'      , OAuth2Parameter::PASSWORD      ) ;
        $this->assertSame( 'refresh_token' , OAuth2Parameter::REFRESH_TOKEN ) ;
        $this->assertSame( 'username'      , OAuth2Parameter::USERNAME      ) ;
    }

    public function testAssertionParameters(): void
    {
        $this->assertSame( 'assertion'             , OAuth2Parameter::ASSERTION             ) ;
        $this->assertSame( 'client_assertion'      , OAuth2Parameter::CLIENT_ASSERTION      ) ;
        $this->assertSame( 'client_assertion_type' , OAuth2Parameter::CLIENT_ASSERTION_TYPE ) ;
    }

    public function testIntrospectionParameters(): void
    {
        $this->assertSame( 'token'           , OAuth2Parameter::TOKEN           ) ;
        $this->assertSame( 'token_type_hint' , OAuth2Parameter::TOKEN_TYPE_HINT ) ;
    }

    public function testOidcParameters(): void
    {
        $this->assertSame( 'acr_values'     , OAuth2Parameter::ACR_VALUES     ) ;
        $this->assertSame( 'claims'         , OAuth2Parameter::CLAIMS         ) ;
        $this->assertSame( 'claims_locales' , OAuth2Parameter::CLAIMS_LOCALES ) ;
        $this->assertSame( 'display'        , OAuth2Parameter::DISPLAY        ) ;
        $this->assertSame( 'id_token_hint'  , OAuth2Parameter::ID_TOKEN_HINT  ) ;
        $this->assertSame( 'login_hint'     , OAuth2Parameter::LOGIN_HINT     ) ;
        $this->assertSame( 'max_age'        , OAuth2Parameter::MAX_AGE        ) ;
        $this->assertSame( 'nonce'          , OAuth2Parameter::NONCE          ) ;
        $this->assertSame( 'prompt'         , OAuth2Parameter::PROMPT         ) ;
        $this->assertSame( 'registration'   , OAuth2Parameter::REGISTRATION   ) ;
        $this->assertSame( 'request'        , OAuth2Parameter::REQUEST        ) ;
        $this->assertSame( 'request_uri'    , OAuth2Parameter::REQUEST_URI    ) ;
        $this->assertSame( 'response_mode'  , OAuth2Parameter::RESPONSE_MODE  ) ;
        $this->assertSame( 'ui_locales'     , OAuth2Parameter::UI_LOCALES     ) ;
    }

    public function testLogoutParameters(): void
    {
        $this->assertSame( 'logout_hint'              , OAuth2Parameter::LOGOUT_HINT              ) ;
        $this->assertSame( 'post_logout_redirect_uri' , OAuth2Parameter::POST_LOGOUT_REDIRECT_URI ) ;
    }

    public function testDeviceAuthorizationParameters(): void
    {
        $this->assertSame( 'device_code' , OAuth2Parameter::DEVICE_CODE ) ;
        $this->assertSame( 'user_code'   , OAuth2Parameter::USER_CODE   ) ;
    }

    public function testTokenExchangeParameters(): void
    {
        $this->assertSame( 'actor_token'          , OAuth2Parameter::ACTOR_TOKEN          ) ;
        $this->assertSame( 'actor_token_type'     , OAuth2Parameter::ACTOR_TOKEN_TYPE     ) ;
        $this->assertSame( 'audience'             , OAuth2Parameter::AUDIENCE             ) ;
        $this->assertSame( 'requested_token_type' , OAuth2Parameter::REQUESTED_TOKEN_TYPE ) ;
        $this->assertSame( 'subject_token'        , OAuth2Parameter::SUBJECT_TOKEN        ) ;
        $this->assertSame( 'subject_token_type'   , OAuth2Parameter::SUBJECT_TOKEN_TYPE   ) ;
    }

    public function testResourceIndicatorsParameters(): void
    {
        $this->assertSame( 'resource' , OAuth2Parameter::RESOURCE ) ;
    }

    public function testDpopParameters(): void
    {
        $this->assertSame( 'dpop_jkt' , OAuth2Parameter::DPOP_JKT ) ;
    }

    public function testRichAuthorizationRequestsParameters(): void
    {
        $this->assertSame( 'authorization_details' , OAuth2Parameter::AUTHORIZATION_DETAILS ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2Parameter::includes( 'grant_type'               ) ) ;
        $this->assertTrue ( OAuth2Parameter::includes( 'code_verifier'            ) ) ;
        $this->assertTrue ( OAuth2Parameter::includes( 'post_logout_redirect_uri' ) ) ;
        $this->assertTrue ( OAuth2Parameter::includes( 'dpop_jkt'                 ) ) ;
        $this->assertFalse( OAuth2Parameter::includes( 'GRANT_TYPE'               ) ) ;
        $this->assertFalse( OAuth2Parameter::includes( 'unknown'                  ) ) ;
    }
}
