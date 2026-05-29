<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class UrlComponentTest extends TestCase
{
    public function testConstantsMatchParseUrlKeys(): void
    {
        $this->assertSame( 'scheme'   , UrlComponent::SCHEME   ) ;
        $this->assertSame( 'host'     , UrlComponent::HOST     ) ;
        $this->assertSame( 'port'     , UrlComponent::PORT     ) ;
        $this->assertSame( 'user'     , UrlComponent::USER     ) ;
        $this->assertSame( 'pass'     , UrlComponent::PASS     ) ;
        $this->assertSame( 'path'     , UrlComponent::PATH     ) ;
        $this->assertSame( 'query'    , UrlComponent::QUERY    ) ;
        $this->assertSame( 'fragment' , UrlComponent::FRAGMENT ) ;
    }

    public function testValuesAreRealParseUrlKeys(): void
    {
        $parts = parse_url( 'https://user:pass@host:8080/path?q=1#frag' ) ;

        $this->assertArrayHasKey( UrlComponent::SCHEME   , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::HOST     , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::PORT     , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::USER     , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::PASS     , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::PATH     , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::QUERY    , $parts ) ;
        $this->assertArrayHasKey( UrlComponent::FRAGMENT , $parts ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( UrlComponent::includes( 'query' ) ) ;
        $this->assertFalse( UrlComponent::includes( 'QUERY' ) ) ; // strict casing
    }
}