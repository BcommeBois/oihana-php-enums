<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class MediaTypeTest extends TestCase
{
    public function testApplicationValues(): void
    {
        $this->assertSame( 'application/json'                  , MediaType::JSON            ) ;
        $this->assertSame( 'application/problem+json'          , MediaType::PROBLEM_JSON    ) ;
        $this->assertSame( 'application/x-www-form-urlencoded' , MediaType::FORM_URLENCODED ) ;
        $this->assertSame( 'application/octet-stream'          , MediaType::OCTET_STREAM    ) ;
        $this->assertSame( 'application/jwt'                   , MediaType::JWT             ) ;
    }

    public function testTextAndMultipartValues(): void
    {
        $this->assertSame( 'text/plain'         , MediaType::TEXT                ) ;
        $this->assertSame( 'text/html'          , MediaType::HTML                ) ;
        $this->assertSame( 'text/event-stream'  , MediaType::EVENT_STREAM        ) ;
        $this->assertSame( 'multipart/form-data', MediaType::MULTIPART_FORM_DATA ) ;
        $this->assertSame( 'image/svg+xml'      , MediaType::SVG                 ) ;
    }

    public function testWithCharset(): void
    {
        $this->assertSame( 'application/json; charset=utf-8'   , MediaType::withCharset( MediaType::JSON ) ) ;
        $this->assertSame( 'text/html; charset=iso-8859-1'     , MediaType::withCharset( MediaType::HTML , Charset::ISO_8859_1 ) ) ;

        // The default charset is Charset::UTF_8, not a bare literal.
        $this->assertSame
        (
            MediaType::withCharset( MediaType::JSON , Charset::UTF_8 ) ,
            MediaType::withCharset( MediaType::JSON ) ,
        ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( MediaType::includes( 'application/json' ) ) ;
        $this->assertTrue ( MediaType::includes( 'image/svg+xml'    ) ) ;
        $this->assertFalse( MediaType::includes( 'application/JSON' ) ) ;
        $this->assertFalse( MediaType::includes( 'application/yaml' ) ) ;
    }
}
