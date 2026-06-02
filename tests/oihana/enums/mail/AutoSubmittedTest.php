<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\AutoSubmitted;

class AutoSubmittedTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 'auto-generated' , AutoSubmitted::AUTO_GENERATED ) ;
        $this->assertSame( 'auto-notified'  , AutoSubmitted::AUTO_NOTIFIED  ) ;
        $this->assertSame( 'auto-replied'   , AutoSubmitted::AUTO_REPLIED   ) ;
        $this->assertSame( 'no'             , AutoSubmitted::NO             ) ;
    }

    public function testEnums() :void
    {
        $this->assertSame
        (
            [ 'auto-generated' , 'auto-notified' , 'auto-replied' , 'no' ] ,
            AutoSubmitted::enums()
        ) ;
    }

    public function testIsAutomated() :void
    {
        $this->assertTrue ( AutoSubmitted::isAutomated( AutoSubmitted::AUTO_GENERATED ) ) ;
        $this->assertTrue ( AutoSubmitted::isAutomated( AutoSubmitted::AUTO_NOTIFIED  ) ) ;
        $this->assertTrue ( AutoSubmitted::isAutomated( AutoSubmitted::AUTO_REPLIED   ) ) ;
        $this->assertFalse( AutoSubmitted::isAutomated( AutoSubmitted::NO             ) ) ;
        $this->assertFalse( AutoSubmitted::isAutomated( ''                            ) ) ;
        $this->assertFalse( AutoSubmitted::isAutomated( 'whatever'                    ) ) ;
    }

    public function testIsAutomatedIsCaseInsensitive() :void
    {
        $this->assertTrue ( AutoSubmitted::isAutomated( 'AUTO-REPLIED' ) ) ;
        $this->assertFalse( AutoSubmitted::isAutomated( 'NO' ) ) ;
    }
}
