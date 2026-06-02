<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\Sensitivity;

class SensitivityTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 'Company-Confidential' , Sensitivity::COMPANY_CONFIDENTIAL ) ;
        $this->assertSame( 'Personal'             , Sensitivity::PERSONAL             ) ;
        $this->assertSame( 'Private'              , Sensitivity::PRIVATE              ) ;
    }

    public function testEnums() :void
    {
        $this->assertSame
        (
            [ 'Company-Confidential' , 'Personal' , 'Private' ] ,
            Sensitivity::enums()
        ) ;
    }

    public function testIncludes() :void
    {
        $this->assertTrue ( Sensitivity::includes( 'Private' ) ) ;
        $this->assertFalse( Sensitivity::includes( 'private' ) ) ;
        $this->assertFalse( Sensitivity::includes( 'Public'  ) ) ;
    }
}
