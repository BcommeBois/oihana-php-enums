<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OidcClaimTypeTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'normal'      , OidcClaimType::NORMAL      ) ;
        $this->assertSame( 'aggregated'  , OidcClaimType::AGGREGATED  ) ;
        $this->assertSame( 'distributed' , OidcClaimType::DISTRIBUTED ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OidcClaimType::includes( 'normal'      ) ) ;
        $this->assertTrue ( OidcClaimType::includes( 'distributed' ) ) ;
        $this->assertFalse( OidcClaimType::includes( 'Normal'      ) ) ;
        $this->assertFalse( OidcClaimType::includes( 'remote'      ) ) ;
    }
}
