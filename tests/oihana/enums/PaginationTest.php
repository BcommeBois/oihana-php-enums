<?php

namespace oihana\enums ;

use PHPUnit\Framework\TestCase;

class PaginationTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('limit'    , Pagination::LIMIT      ) ;
        $this->assertSame('maxLimit' , Pagination::MAX_LIMIT  ) ;
        $this->assertSame('minLimit' , Pagination::MIN_LIMIT  ) ;
        $this->assertSame('offset'   , Pagination::OFFSET     ) ;
        $this->assertSame('page'     , Pagination::PAGE       ) ;
    }
}