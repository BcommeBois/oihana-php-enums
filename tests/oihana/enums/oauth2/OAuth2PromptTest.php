<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2PromptTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'none'           , OAuth2Prompt::NONE           ) ;
        $this->assertSame( 'login'          , OAuth2Prompt::LOGIN          ) ;
        $this->assertSame( 'consent'        , OAuth2Prompt::CONSENT        ) ;
        $this->assertSame( 'select_account' , OAuth2Prompt::SELECT_ACCOUNT ) ;
        $this->assertSame( 'create'         , OAuth2Prompt::CREATE         ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2Prompt::includes( 'consent'        ) ) ;
        $this->assertTrue ( OAuth2Prompt::includes( 'select_account' ) ) ;
        $this->assertFalse( OAuth2Prompt::includes( 'CONSENT'        ) ) ;
        $this->assertFalse( OAuth2Prompt::includes( 'unknown'        ) ) ;
    }
}
