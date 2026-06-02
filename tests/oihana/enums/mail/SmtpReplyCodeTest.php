<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\SmtpReplyCode;

class SmtpReplyCodeTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 220 , SmtpReplyCode::SERVICE_READY     ) ;
        $this->assertSame( 250 , SmtpReplyCode::OK                ) ;
        $this->assertSame( 354 , SmtpReplyCode::START_MAIL_INPUT  ) ;
        $this->assertSame( 421 , SmtpReplyCode::SERVICE_NOT_AVAILABLE ) ;
        $this->assertSame( 550 , SmtpReplyCode::MAILBOX_NOT_FOUND ) ;
    }

    public function testGetType() :void
    {
        $this->assertSame( 'Positive Completion'   , SmtpReplyCode::getType( 250 ) ) ;
        $this->assertSame( 'Positive Intermediate' , SmtpReplyCode::getType( 354 ) ) ;
        $this->assertSame( 'Transient Negative'    , SmtpReplyCode::getType( 451 ) ) ;
        $this->assertSame( 'Permanent Negative'    , SmtpReplyCode::getType( 550 ) ) ;
        $this->assertNull( SmtpReplyCode::getType( 199 ) ) ;
    }

    public function testGetDescription() :void
    {
        $this->assertSame( 'Requested mail action okay, completed' , SmtpReplyCode::getDescription( 250 ) ) ;
        $this->assertSame( 'Service ready' , SmtpReplyCode::getDescription( '220' ) ) ;
        $this->assertNull( SmtpReplyCode::getDescription( 999 ) ) ;
    }

    public function testIsPositive() :void
    {
        $this->assertTrue ( SmtpReplyCode::isPositive( 250 ) ) ;
        $this->assertTrue ( SmtpReplyCode::isPositive( 354 ) ) ;
        $this->assertFalse( SmtpReplyCode::isPositive( 451 ) ) ;
        $this->assertFalse( SmtpReplyCode::isPositive( 550 ) ) ;
    }

    public function testIsTransient() :void
    {
        $this->assertTrue ( SmtpReplyCode::isTransient( 451 ) ) ;
        $this->assertFalse( SmtpReplyCode::isTransient( 550 ) ) ;
        $this->assertFalse( SmtpReplyCode::isTransient( 250 ) ) ;
    }

    public function testIsPermanent() :void
    {
        $this->assertTrue ( SmtpReplyCode::isPermanent( 550 ) ) ;
        $this->assertTrue ( SmtpReplyCode::isPermanent( '535' ) ) ;
        $this->assertFalse( SmtpReplyCode::isPermanent( 451 ) ) ;
    }

    public function testIncludes() :void
    {
        $this->assertTrue ( SmtpReplyCode::includes( 250 ) ) ;
        $this->assertFalse( SmtpReplyCode::includes( 999 ) ) ;
    }
}
