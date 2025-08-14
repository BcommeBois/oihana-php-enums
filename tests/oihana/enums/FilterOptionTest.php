<?php

namespace tests\oihana\enums ;

use oihana\enums\FilterOption;
use PHPUnit\Framework\TestCase;

class FilterOptionTest extends TestCase
{
    public function testConstantsExist()
    {
        $this->assertSame('default'   , FilterOption::DEFAULT   ) ;
        $this->assertSame('flags'     , FilterOption::FLAGS     ) ;
        $this->assertSame('max_range' , FilterOption::MAX_RANGE ) ;
        $this->assertSame('min_range' , FilterOption::MIN_RANGE ) ;
        $this->assertSame('options'   , FilterOption::OPTIONS   ) ;
    }

    public function testGetAllReturnsConstants()
    {
        $all = FilterOption::getAll();

        $this->assertArrayHasKey('DEFAULT'   , $all ) ;
        $this->assertArrayHasKey('FLAGS'     , $all ) ;
        $this->assertArrayHasKey('MAX_RANGE' , $all ) ;
        $this->assertArrayHasKey('MIN_RANGE' , $all ) ;
        $this->assertArrayHasKey('OPTIONS'   , $all ) ;

        $this->assertEquals('default' , $all[ 'DEFAULT'] ) ;
        $this->assertEquals('flags'   , $all[ 'FLAGS'  ] ) ;
    }

    public function testEnumsReturnsSortedUniqueValues()
    {
        $enums = FilterOption::enums();
        $this->assertSame(['default','flags','max_range','min_range','options'], $enums);
    }

    public function testGetConstant()
    {
        $constant = FilterOption::getConstant( 'default' );
        $this->assertEquals( 'DEFAULT', $constant);

        $constant = FilterOption::getConstant( 'max_range' );
        $this->assertEquals( 'MAX_RANGE', $constant);
    }
}