<?php

namespace tests\oihana\enums ;

use PHPUnit\Framework\TestCase;

use InvalidArgumentException;

use oihana\enums\PostalCodePattern;

class PostalCodePatternTest extends TestCase
{
    public function testValidFrenchCodes(): void
    {
        $this->assertTrue( PostalCodePattern::isValid('75015', 'FR') );
        $this->assertTrue( PostalCodePattern::isValid('13008', 'FR') ) ;
        $this->assertFalse( PostalCodePattern::isValid('99999', 'FR') );
    }

    public function testValidUSCodes(): void
    {
        $this->assertTrue  ( PostalCodePattern::isValid( '90210'      , 'US' ) ) ;
        $this->assertTrue  ( PostalCodePattern::isValid( '90210-1234' , 'US' ) ) ;
        $this->assertFalse ( PostalCodePattern::isValid( 'ABCDE'      , 'US' ) ) ;
    }


    public function testGetPattern(): void
    {
        $this->assertNotNull ( PostalCodePattern::getPattern('FR' ) ) ;
        $this->assertNull    ( PostalCodePattern::getPattern('XX' ) ) ;
    }

    public function testAssertValidThrows(): void
    {
        $this->expectException( InvalidArgumentException::class );
        PostalCodePattern::assert('99999' , 'FR' ) ;
    }
}