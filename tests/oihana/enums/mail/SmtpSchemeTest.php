<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\SmtpScheme;

class SmtpSchemeTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 'smtp'  , SmtpScheme::SMTP  ) ;
        $this->assertSame( 'smtps' , SmtpScheme::SMTPS ) ;
    }

    public function testEnums() :void
    {
        $this->assertSame( [ 'smtp' , 'smtps' ] , SmtpScheme::enums() ) ;
    }

    public function testIncludes() :void
    {
        $this->assertTrue ( SmtpScheme::includes( 'smtp'  ) ) ;
        $this->assertTrue ( SmtpScheme::includes( 'smtps' ) ) ;
        $this->assertFalse( SmtpScheme::includes( 'imap'  ) ) ;
    }

    public function testDefaultPort() :void
    {
        $this->assertSame( 587 , SmtpScheme::defaultPort( SmtpScheme::SMTP  ) ) ;
        $this->assertSame( 465 , SmtpScheme::defaultPort( SmtpScheme::SMTPS ) ) ;
    }

    public function testDefaultPortIsCaseInsensitive() :void
    {
        $this->assertSame( 465 , SmtpScheme::defaultPort( 'SMTPS' ) ) ;
        $this->assertSame( 587 , SmtpScheme::defaultPort( 'Smtp'  ) ) ;
    }

    public function testDefaultPortReturnsNullForUnknownScheme() :void
    {
        $this->assertNull( SmtpScheme::defaultPort( 'imap' ) ) ;
    }
}
