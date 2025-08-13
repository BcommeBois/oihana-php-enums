<?php

namespace tests\oihana\enums ;

use oihana\enums\Order;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('asc', Order::asc);
        $this->assertSame('ASC', Order::ASC);
        $this->assertSame('desc', Order::desc);
        $this->assertSame('DESC', Order::DESC);
    }

    public static function normalizeProvider(): array
    {
        return
        [
            [ 'asc'      , 'ASC'  ],
            [ 'ASC'      , 'ASC'  ],
            [ 'Asc'      , 'ASC'  ],
            [ ' aSc '    , 'ASC'  ],
            [ 'desc'     , 'DESC' ],
            [ 'DESC'     , 'DESC' ],
            [ 'DeSc'     , 'DESC' ],
            [ ' desc '   , 'DESC' ],
            [ '  '       , null   ],
            [ 'foo'      , null   ],
            [ 'ascending', null   ],
        ];
    }

    #[DataProvider('normalizeProvider')]
    public function testNormalize(string $input, ?string $expected)
    {
        $this->assertSame($expected, Order::normalize($input));
    }
}