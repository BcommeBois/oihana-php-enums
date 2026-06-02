<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\ContentTransferEncoding;

class ContentTransferEncodingTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( '7bit'             , ContentTransferEncoding::SEVEN_BIT        ) ;
        $this->assertSame( '8bit'             , ContentTransferEncoding::EIGHT_BIT        ) ;
        $this->assertSame( 'binary'           , ContentTransferEncoding::BINARY           ) ;
        $this->assertSame( 'quoted-printable' , ContentTransferEncoding::QUOTED_PRINTABLE ) ;
        $this->assertSame( 'base64'           , ContentTransferEncoding::BASE64           ) ;
    }

    public function testEnums() :void
    {
        $this->assertSame
        (
            [ '7bit' , '8bit' , 'base64' , 'binary' , 'quoted-printable' ] ,
            ContentTransferEncoding::enums()
        ) ;
    }

    public function testIsIdentity() :void
    {
        $this->assertTrue ( ContentTransferEncoding::isIdentity( ContentTransferEncoding::SEVEN_BIT        ) ) ;
        $this->assertTrue ( ContentTransferEncoding::isIdentity( ContentTransferEncoding::EIGHT_BIT        ) ) ;
        $this->assertTrue ( ContentTransferEncoding::isIdentity( ContentTransferEncoding::BINARY           ) ) ;
        $this->assertFalse( ContentTransferEncoding::isIdentity( ContentTransferEncoding::QUOTED_PRINTABLE ) ) ;
        $this->assertFalse( ContentTransferEncoding::isIdentity( ContentTransferEncoding::BASE64           ) ) ;
    }

    public function testIsIdentityIsCaseInsensitive() :void
    {
        $this->assertTrue ( ContentTransferEncoding::isIdentity( '7BIT'   ) ) ;
        $this->assertFalse( ContentTransferEncoding::isIdentity( 'BASE64' ) ) ;
    }
}
