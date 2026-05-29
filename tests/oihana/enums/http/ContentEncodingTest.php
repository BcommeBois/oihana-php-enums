<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class ContentEncodingTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'gzip'     , ContentEncoding::GZIP     ) ;
        $this->assertSame( 'compress' , ContentEncoding::COMPRESS ) ;
        $this->assertSame( 'deflate'  , ContentEncoding::DEFLATE  ) ;
        $this->assertSame( 'br'       , ContentEncoding::BR       ) ;
        $this->assertSame( 'zstd'     , ContentEncoding::ZSTD     ) ;
        $this->assertSame( 'identity' , ContentEncoding::IDENTITY ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( ContentEncoding::includes( 'gzip' ) ) ;
        $this->assertTrue ( ContentEncoding::includes( 'br'   ) ) ;
        $this->assertFalse( ContentEncoding::includes( 'GZIP' ) ) ;
        $this->assertFalse( ContentEncoding::includes( 'lz4'  ) ) ;
    }
}
