<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2CodeChallengeMethodTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'plain' , OAuth2CodeChallengeMethod::PLAIN ) ;
        $this->assertSame( 'S256'  , OAuth2CodeChallengeMethod::S256  ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2CodeChallengeMethod::includes( 'plain' ) ) ;
        $this->assertTrue ( OAuth2CodeChallengeMethod::includes( 'S256'  ) ) ;
        $this->assertFalse( OAuth2CodeChallengeMethod::includes( 's256'  ) ) ;
        $this->assertFalse( OAuth2CodeChallengeMethod::includes( 'PLAIN' ) ) ;
    }
}
