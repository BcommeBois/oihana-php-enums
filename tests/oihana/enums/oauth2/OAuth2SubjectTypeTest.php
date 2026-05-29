<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OAuth2SubjectTypeTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'public'   , OAuth2SubjectType::PUBLIC   ) ;
        $this->assertSame( 'pairwise' , OAuth2SubjectType::PAIRWISE ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OAuth2SubjectType::includes( 'public'   ) ) ;
        $this->assertTrue ( OAuth2SubjectType::includes( 'pairwise' ) ) ;
        $this->assertFalse( OAuth2SubjectType::includes( 'Public'   ) ) ;
        $this->assertFalse( OAuth2SubjectType::includes( 'private'  ) ) ;
    }
}
