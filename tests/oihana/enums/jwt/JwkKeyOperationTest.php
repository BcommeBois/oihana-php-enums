<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwkKeyOperationTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'sign'       , JwkKeyOperation::SIGN        ) ;
        $this->assertSame( 'verify'     , JwkKeyOperation::VERIFY      ) ;
        $this->assertSame( 'encrypt'    , JwkKeyOperation::ENCRYPT     ) ;
        $this->assertSame( 'decrypt'    , JwkKeyOperation::DECRYPT     ) ;
        $this->assertSame( 'wrapKey'    , JwkKeyOperation::WRAP_KEY    ) ;
        $this->assertSame( 'unwrapKey'  , JwkKeyOperation::UNWRAP_KEY  ) ;
        $this->assertSame( 'deriveKey'  , JwkKeyOperation::DERIVE_KEY  ) ;
        $this->assertSame( 'deriveBits' , JwkKeyOperation::DERIVE_BITS ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwkKeyOperation::includes( 'sign'    ) ) ;
        $this->assertTrue ( JwkKeyOperation::includes( 'wrapKey' ) ) ;
        $this->assertFalse( JwkKeyOperation::includes( 'Sign'    ) ) ;
        $this->assertFalse( JwkKeyOperation::includes( 'wrap_key' ) ) ;
    }
}
