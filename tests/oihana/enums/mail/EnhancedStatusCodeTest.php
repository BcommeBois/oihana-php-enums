<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\EnhancedStatusCode;

class EnhancedStatusCodeTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( '2' , EnhancedStatusCode::SUCCESS   ) ;
        $this->assertSame( '4' , EnhancedStatusCode::TRANSIENT ) ;
        $this->assertSame( '5' , EnhancedStatusCode::PERMANENT ) ;
    }

    public function testIsValid() :void
    {
        $this->assertTrue ( EnhancedStatusCode::isValid( '5.1.1'   ) ) ;
        $this->assertTrue ( EnhancedStatusCode::isValid( '2.0.0'   ) ) ;
        $this->assertTrue ( EnhancedStatusCode::isValid( '4.2.2'   ) ) ;
        $this->assertFalse( EnhancedStatusCode::isValid( '3.1.1'   ) ) ; // class 3 not enhanced
        $this->assertFalse( EnhancedStatusCode::isValid( '5.1'     ) ) ;
        $this->assertFalse( EnhancedStatusCode::isValid( '5.1.1.1' ) ) ;
        $this->assertFalse( EnhancedStatusCode::isValid( 'x.y.z'   ) ) ;
    }

    public function testClassOf() :void
    {
        $this->assertSame( '5' , EnhancedStatusCode::classOf( '5.1.1' ) ) ;
        $this->assertSame( '2' , EnhancedStatusCode::classOf( '2.0.0' ) ) ;
        $this->assertNull( EnhancedStatusCode::classOf( 'nope' ) ) ;
    }

    public function testSubjectOf() :void
    {
        $this->assertSame( 1 , EnhancedStatusCode::subjectOf( '5.1.1' ) ) ;
        $this->assertSame( 7 , EnhancedStatusCode::subjectOf( '5.7.1' ) ) ;
        $this->assertNull( EnhancedStatusCode::subjectOf( 'bad' ) ) ;
    }

    public function testDetailOf() :void
    {
        $this->assertSame( 1  , EnhancedStatusCode::detailOf( '5.1.1'  ) ) ;
        $this->assertSame( 23 , EnhancedStatusCode::detailOf( '5.7.23' ) ) ;
        $this->assertNull( EnhancedStatusCode::detailOf( 'bad' ) ) ;
    }

    public function testIsSuccessTransientPermanent() :void
    {
        $this->assertTrue ( EnhancedStatusCode::isSuccess  ( '2.0.0' ) ) ;
        $this->assertTrue ( EnhancedStatusCode::isTransient( '4.2.2' ) ) ;
        $this->assertTrue ( EnhancedStatusCode::isPermanent( '5.1.1' ) ) ;
        $this->assertFalse( EnhancedStatusCode::isPermanent( '4.2.2' ) ) ;
        $this->assertFalse( EnhancedStatusCode::isSuccess  ( 'bad'   ) ) ;
    }
}
