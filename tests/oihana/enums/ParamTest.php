<?php

namespace tests\oihana\enums ;

use oihana\enums\Param;
use PHPUnit\Framework\TestCase;

class ParamTest extends TestCase
{
    public function testGroupByPrefixReturnsMatchingConstants() :void
    {
        $group = Param::groupByPrefix( 'ACTION' ) ;

        $this->assertArrayHasKey( 'ACTION'  , $group ) ;
        $this->assertArrayHasKey( 'ACTIONS' , $group ) ;
        $this->assertSame( 'action'  , $group[ 'ACTION'  ] ) ;
        $this->assertSame( 'actions' , $group[ 'ACTIONS' ] ) ;

        // Keys are constant NAMES; every returned name starts with the prefix.
        foreach ( array_keys( $group ) as $name )
        {
            $this->assertStringStartsWith( 'ACTION' , $name ) ;
        }
    }

    public function testGroupByPrefixReturnsEmptyForUnknownPrefix() :void
    {
        $this->assertSame( [] , Param::groupByPrefix( 'NO_SUCH_PREFIX_' ) ) ;
    }
}
