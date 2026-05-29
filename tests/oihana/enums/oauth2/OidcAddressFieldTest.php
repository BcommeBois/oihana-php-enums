<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OidcAddressFieldTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'formatted'      , OidcAddressField::FORMATTED      ) ;
        $this->assertSame( 'street_address' , OidcAddressField::STREET_ADDRESS ) ;
        $this->assertSame( 'locality'       , OidcAddressField::LOCALITY       ) ;
        $this->assertSame( 'region'         , OidcAddressField::REGION         ) ;
        $this->assertSame( 'postal_code'    , OidcAddressField::POSTAL_CODE    ) ;
        $this->assertSame( 'country'        , OidcAddressField::COUNTRY        ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OidcAddressField::includes( 'locality'    ) ) ;
        $this->assertTrue ( OidcAddressField::includes( 'postal_code' ) ) ;
        $this->assertFalse( OidcAddressField::includes( 'Locality'    ) ) ;
        $this->assertFalse( OidcAddressField::includes( 'city'        ) ) ;
    }
}
