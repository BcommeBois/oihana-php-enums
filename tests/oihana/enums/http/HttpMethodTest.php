<?php

namespace tests\oihana\enums\http;

use oihana\enums\http\HttpMethod;
use PHPUnit\Framework\TestCase;

class HttpMethodTest extends TestCase
{
    public function testEnums(): void
    {
        $enums = HttpMethod::enums();
        $this->assertIsArray( $enums ) ;
        $expectedValues =
        [
            // ----------------- Standards
            HttpMethod::DELETE ,
            HttpMethod::delete ,
            HttpMethod::HEAD ,
            HttpMethod::head ,
            HttpMethod::GET ,
            HttpMethod::get ,
            HttpMethod::OPTIONS ,
            HttpMethod::options ,
            HttpMethod::PATCH ,
            HttpMethod::patch ,
            HttpMethod::POST ,
            HttpMethod::post ,
            HttpMethod::PURGE ,
            HttpMethod::purge ,
            HttpMethod::PUT ,
            HttpMethod::put ,
            HttpMethod::TRACE ,
            HttpMethod::trace ,
            // ----------------- Extras
            HttpMethod::ALL ,
            HttpMethod::CONNECT ,
            HttpMethod::all ,
            HttpMethod::connect ,
            HttpMethod::default ,
            HttpMethod::deleteAll ,
            HttpMethod::count ,
            HttpMethod::exist ,
            HttpMethod::flush ,
            HttpMethod::insert ,
            HttpMethod::list ,
            HttpMethod::replace ,
            HttpMethod::truncate ,
            HttpMethod::update ,
            HttpMethod::upsert ,
        ];

        foreach ( $expectedValues as $value )
        {
            $this->assertContains($value, $enums);
        }
    }


    public function testIsValidDefaultCaseInsensitive(): void
    {
        $this->assertTrue(HttpMethod::isValid('GET'));
        $this->assertTrue(HttpMethod::isValid('get'));
        $this->assertTrue(HttpMethod::isValid('Post'));
        $this->assertFalse(HttpMethod::isValid('flush'));
        $this->assertFalse(HttpMethod::isValid('invalid'));
    }

    public function testIsValidCaseSensitive(): void
    {
        $this->assertTrue(HttpMethod::isValid('GET', true));
        $this->assertFalse(HttpMethod::isValid('get', true));
        $this->assertTrue(HttpMethod::isValid('POST', true));
        $this->assertFalse(HttpMethod::isValid('Post', true));
        $this->assertFalse(HttpMethod::isValid('flush', true));
    }
}
