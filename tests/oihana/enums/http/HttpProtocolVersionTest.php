<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class HttpProtocolVersionTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'HTTP/1.0' , HttpProtocolVersion::HTTP_1_0 ) ;
        $this->assertSame( 'HTTP/1.1' , HttpProtocolVersion::HTTP_1_1 ) ;
        $this->assertSame( 'HTTP/2'   , HttpProtocolVersion::HTTP_2   ) ;
        $this->assertSame( 'HTTP/3'   , HttpProtocolVersion::HTTP_3   ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( HttpProtocolVersion::includes( 'HTTP/1.1' ) ) ;
        $this->assertTrue ( HttpProtocolVersion::includes( 'HTTP/2'   ) ) ;
        $this->assertFalse( HttpProtocolVersion::includes( 'HTTP/2.0' ) ) ;
        $this->assertFalse( HttpProtocolVersion::includes( 'h2'       ) ) ;
    }
}
