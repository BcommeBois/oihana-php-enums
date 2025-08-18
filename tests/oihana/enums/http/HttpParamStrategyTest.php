<?php

namespace tests\oihana\enums\http;

use oihana\enums\http\HttpParamStrategy;
use PHPUnit\Framework\TestCase;

class HttpParamStrategyTest extends TestCase
{
    public function testEnums(): void
    {
        $enums = HttpParamStrategy::enums();
        $this->assertIsArray( $enums ) ;
        $expectedValues =
        [
            HttpParamStrategy::BODY ,
            HttpParamStrategy::BOTH ,
            HttpParamStrategy::QUERY ,
        ];

        foreach ( $expectedValues as $value )
        {
            $this->assertContains($value, $enums);
        }
    }
}
