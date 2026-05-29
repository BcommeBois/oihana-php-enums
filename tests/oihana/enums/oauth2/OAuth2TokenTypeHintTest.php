<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2TokenTypeHintTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'access_token'  , OAuth2TokenTypeHint::ACCESS_TOKEN  ) ;
        $this->assertSame( 'refresh_token' , OAuth2TokenTypeHint::REFRESH_TOKEN ) ;
        $this->assertSame( 'pct'           , OAuth2TokenTypeHint::PCT           ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2TokenTypeHint::includes( 'access_token'  ) ) ;
        $this->assertTrue ( OAuth2TokenTypeHint::includes( 'refresh_token' ) ) ;
        $this->assertTrue ( OAuth2TokenTypeHint::includes( 'pct'           ) ) ;
        $this->assertFalse( OAuth2TokenTypeHint::includes( 'ACCESS_TOKEN'  ) ) ;
        // id_token is NOT a token_type_hint (not in the IANA registry).
        $this->assertFalse( OAuth2TokenTypeHint::includes( 'id_token'      ) ) ;
    }
}
