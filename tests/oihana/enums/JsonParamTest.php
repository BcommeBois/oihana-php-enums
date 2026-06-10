<?php

namespace tests\oihana\enums ;

use oihana\enums\JsonParam;
use PHPUnit\Framework\TestCase;

class JsonParamTest extends TestCase
{
    public function testGetDefaultValues() :void
    {
        $this->assertSame
        (
            [
                JsonParam::ASSOCIATIVE => false ,
                JsonParam::DEPTH       => 512 ,
                JsonParam::FLAGS       => 0 ,
            ],
            JsonParam::getDefaultValues()
        ) ;
    }

    public function testIsValidFlagsAcceptsKnownFlags() :void
    {
        $this->assertTrue( JsonParam::isValidFlags( JsonParam::JSON_NONE ) ) ;
        $this->assertTrue( JsonParam::isValidFlags( JSON_PRETTY_PRINT ) ) ;
        $this->assertTrue( JsonParam::isValidFlags( JSON_THROW_ON_ERROR ) ) ;
        $this->assertTrue( JsonParam::isValidFlags
        (
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        ) ) ;
    }

    public function testIsValidFlagsRejectsUnknownBits() :void
    {
        // A bit well outside the known JSON_* mask (highest known is 1 << 22).
        $this->assertFalse( JsonParam::isValidFlags( 1 << 30 ) ) ;
        $this->assertFalse( JsonParam::isValidFlags( JSON_PRETTY_PRINT | ( 1 << 30 ) ) ) ;
    }
}
