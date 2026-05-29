<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class UriSchemeTest extends TestCase
{
    public function testLowercaseValues(): void
    {
        $this->assertSame( 'http'  , UriScheme::HTTP  ) ;
        $this->assertSame( 'https' , UriScheme::HTTPS ) ;
        $this->assertSame( 'ws'    , UriScheme::WS    ) ;
        $this->assertSame( 'wss'   , UriScheme::WSS   ) ;
        $this->assertSame( 'ftp'   , UriScheme::FTP   ) ;
    }

    public function testDefaultPort(): void
    {
        $this->assertSame( 80  , UriScheme::defaultPort( UriScheme::HTTP  ) ) ;
        $this->assertSame( 443 , UriScheme::defaultPort( UriScheme::HTTPS ) ) ;
        $this->assertSame( 80  , UriScheme::defaultPort( UriScheme::WS    ) ) ;
        $this->assertSame( 443 , UriScheme::defaultPort( UriScheme::WSS   ) ) ;
        $this->assertSame( 21  , UriScheme::defaultPort( UriScheme::FTP   ) ) ;
        $this->assertNull( UriScheme::defaultPort( 'gopher' ) ) ;
    }

    public function testDefaultPortIsCaseInsensitive(): void
    {
        $this->assertSame( 443 , UriScheme::defaultPort( 'HTTPS' ) ) ;
    }
}