<?php

namespace tests\oihana\enums ;

use PHPUnit\Framework\TestCase;

use InvalidArgumentException;

use oihana\enums\PostalCode;

class PostalCodeTest extends TestCase
{
    public function testValidFrenchCodes(): void
    {
        $this->assertTrue( PostalCode::isValid('75015', 'FR') );
        $this->assertTrue( PostalCode::isValid('13008', 'FR') ) ;
        $this->assertFalse( PostalCode::isValid('99999', 'FR') );
    }

    public function testValidUSCodes(): void
    {
        $this->assertTrue(PostalCode::isValid('90210', 'US'));
        $this->assertTrue(PostalCode::isValid('90210-1234', 'US'));
        $this->assertFalse(PostalCode::isValid('ABCDE', 'US'));
    }


    public function testGetPattern(): void
    {
        $this->assertNotNull(PostalCode::getPattern('FR'));
        $this->assertNull(PostalCode::getPattern('XX'));
    }

    public function testAssertValidThrows(): void
    {
        $this->expectException( InvalidArgumentException::class );
        PostalCode::assert('99999', 'FR');
    }
}