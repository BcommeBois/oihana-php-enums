<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class GuzzleOptionTest extends TestCase
{
    public function testTransportConstants(): void
    {
        $this->assertSame( 'base_uri'        , GuzzleOption::BASE_URI        ) ;
        $this->assertSame( 'timeout'         , GuzzleOption::TIMEOUT         ) ;
        $this->assertSame( 'connect_timeout' , GuzzleOption::CONNECT_TIMEOUT ) ;
        $this->assertSame( 'verify'          , GuzzleOption::VERIFY          ) ;
    }

    public function testBodyConstants(): void
    {
        $this->assertSame( 'body'        , GuzzleOption::BODY        ) ;
        $this->assertSame( 'json'        , GuzzleOption::JSON        ) ;
        $this->assertSame( 'form_params' , GuzzleOption::FORM_PARAMS ) ;
        $this->assertSame( 'multipart'   , GuzzleOption::MULTIPART   ) ;
        $this->assertSame( 'query'       , GuzzleOption::QUERY       ) ;
    }

    public function testHeadersAndAuthConstants(): void
    {
        $this->assertSame( 'headers' , GuzzleOption::HEADERS ) ;
        $this->assertSame( 'auth'    , GuzzleOption::AUTH    ) ;
        $this->assertSame( 'cookies' , GuzzleOption::COOKIES ) ;
    }

    public function testBehaviourConstants(): void
    {
        $this->assertSame( 'allow_redirects' , GuzzleOption::ALLOW_REDIRECTS ) ;
        $this->assertSame( 'http_errors'     , GuzzleOption::HTTP_ERRORS     ) ;
        $this->assertSame( 'stream'          , GuzzleOption::STREAM          ) ;
        $this->assertSame( 'sink'            , GuzzleOption::SINK            ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( GuzzleOption::includes( 'base_uri' ) ) ;
        $this->assertTrue ( GuzzleOption::includes( 'headers'  ) ) ;
        $this->assertFalse( GuzzleOption::includes( 'BASE_URI' ) ) ;
        $this->assertFalse( GuzzleOption::includes( 'unknown'  ) ) ;
    }

    public function testValuesAreAllLowerSnakeCase(): void
    {
        foreach ( GuzzleOption::enums() as $value )
        {
            $this->assertMatchesRegularExpression( '/^[a-z][a-z0-9_]*$/' , $value ,
                "GuzzleOption value '{$value}' must be lower_snake_case" ) ;
        }
    }
}
