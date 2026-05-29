<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2ResponseModeTest extends TestCase
{
    public function testPlainModes(): void
    {
        $this->assertSame( 'query'       , OAuth2ResponseMode::QUERY       ) ;
        $this->assertSame( 'fragment'    , OAuth2ResponseMode::FRAGMENT    ) ;
        $this->assertSame( 'form_post'   , OAuth2ResponseMode::FORM_POST   ) ;
        $this->assertSame( 'web_message' , OAuth2ResponseMode::WEB_MESSAGE ) ;
    }

    public function testJarmModes(): void
    {
        $this->assertSame( 'jwt'           , OAuth2ResponseMode::JWT           ) ;
        $this->assertSame( 'query.jwt'     , OAuth2ResponseMode::QUERY_JWT     ) ;
        $this->assertSame( 'fragment.jwt'  , OAuth2ResponseMode::FRAGMENT_JWT  ) ;
        $this->assertSame( 'form_post.jwt' , OAuth2ResponseMode::FORM_POST_JWT ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2ResponseMode::includes( 'form_post'     ) ) ;
        $this->assertTrue ( OAuth2ResponseMode::includes( 'form_post.jwt' ) ) ;
        $this->assertFalse( OAuth2ResponseMode::includes( 'FORM_POST'     ) ) ;
        $this->assertFalse( OAuth2ResponseMode::includes( 'post'          ) ) ;
    }
}
