<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ParameterTest extends TestCase
{
    public function testAuthorizationRequestParameters(): void
    {
        $this->assertSame( 'client_id'     , OAuth2Parameter::CLIENT_ID     ) ;
        $this->assertSame( 'response_type' , OAuth2Parameter::RESPONSE_TYPE ) ;
        $this->assertSame( 'redirect_uri'  , OAuth2Parameter::REDIRECT_URI  ) ;
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
        $this->assertSame( 'grant_type'    , OAuth2Parameter::GRANT_TYPE    ) ;
        $this->assertSame( 'code'          , OAuth2Parameter::CODE          ) ;
        $this->assertSame( 'client_secret' , OAuth2Parameter::CLIENT_SECRET ) ;
        $this->assertSame( 'refresh_token' , OAuth2Parameter::REFRESH_TOKEN ) ;
        $this->assertSame( 'username'      , OAuth2Parameter::USERNAME      ) ;
        $this->assertSame( 'password'      , OAuth2Parameter::PASSWORD      ) ;
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
        $this->assertSame( 'nonce'         , OAuth2Parameter::NONCE         ) ;
        $this->assertSame( 'prompt'        , OAuth2Parameter::PROMPT        ) ;
        $this->assertSame( 'max_age'       , OAuth2Parameter::MAX_AGE       ) ;
        $this->assertSame( 'id_token_hint' , OAuth2Parameter::ID_TOKEN_HINT ) ;
        $this->assertSame( 'login_hint'    , OAuth2Parameter::LOGIN_HINT    ) ;
        $this->assertSame( 'acr_values'    , OAuth2Parameter::ACR_VALUES    ) ;
        $this->assertSame( 'audience'      , OAuth2Parameter::AUDIENCE      ) ;
        $this->assertSame( 'resource'      , OAuth2Parameter::RESOURCE      ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2Parameter::includes( 'grant_type'    ) ) ;
        $this->assertTrue ( OAuth2Parameter::includes( 'code_verifier' ) ) ;
        $this->assertFalse( OAuth2Parameter::includes( 'GRANT_TYPE'    ) ) ;
        $this->assertFalse( OAuth2Parameter::includes( 'unknown'       ) ) ;
    }
}
