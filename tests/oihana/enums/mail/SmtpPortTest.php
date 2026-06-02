<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\SmtpPort;

class SmtpPortTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 25   , SmtpPort::SMTP         ) ;
        $this->assertSame( 465  , SmtpPort::IMPLICIT_TLS ) ;
        $this->assertSame( 587  , SmtpPort::SUBMISSION   ) ;
        $this->assertSame( 2525 , SmtpPort::ALTERNATE    ) ;
    }

    public function testEnums() :void
    {
        $this->assertSame( [ 25 , 465 , 587 , 2525 ] , SmtpPort::enums( SORT_NUMERIC ) ) ;
    }

    public function testIncludes() :void
    {
        $this->assertTrue ( SmtpPort::includes( 587 ) ) ;
        $this->assertFalse( SmtpPort::includes( 80  ) ) ;
    }
}
