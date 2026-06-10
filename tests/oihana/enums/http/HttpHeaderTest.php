<?php

namespace tests\oihana\enums\http;

use PHPUnit\Framework\TestCase;

use oihana\enums\http\HttpHeader;
use oihana\reflect\exceptions\ConstantException;

class HttpHeaderTest extends TestCase
{
    public function testEnums(): void
    {
        $enums = HttpHeader::enums();
        $this->assertIsArray( $enums ) ;
        $expectedValues =
        [
            HttpHeader::ACCESS_CONTROL_ALLOW_CREDENTIALS ,
            HttpHeader::ACCESS_CONTROL_ALLOW_HEADERS     ,
            HttpHeader::ACCESS_CONTROL_ALLOW_METHODS     ,
            HttpHeader::ACCESS_CONTROL_ALLOW_ORIGIN      ,
            HttpHeader::ACCESS_CONTROL_EXPOSE_HEADERS    ,
            HttpHeader::ACCESS_CONTROL_MAX_AGE           ,
            HttpHeader::ACCESS_CONTROL_REQUEST_HEADERS   ,
            HttpHeader::ACCESS_CONTROL_REQUEST_METHOD    ,
            HttpHeader::ACCEPT                           ,
            HttpHeader::ACCEPT_CHARSET                   ,
            HttpHeader::ACCEPT_ENCODING                  ,
            HttpHeader::ACCEPT_LANGUAGE                  ,
            HttpHeader::AGE                              ,
            HttpHeader::CACHE_CONTROL                    ,
            HttpHeader::EXPIRES                          ,
            HttpHeader::PRAGMA                           ,
            HttpHeader::WARNING                          ,
            HttpHeader::ETAG                             ,
            HttpHeader::IF_MATCH                         ,
            HttpHeader::IF_NONE_MATCH                    ,
            HttpHeader::IF_MODIFIED_SINCE                ,
            HttpHeader::IF_UNMODIFIED_SINCE              ,
            HttpHeader::IF_RANGE                         ,
            HttpHeader::CONTENT_DISPOSITION              ,
            HttpHeader::CONTENT_ENCODING                 ,
            HttpHeader::CONTENT_LANGUAGE                 ,
            HttpHeader::CONTENT_LENGTH                   ,
            HttpHeader::CONTENT_LOCATION                 ,
            HttpHeader::CONTENT_RANGE                    ,
            HttpHeader::CONTENT_TYPE                     ,
            HttpHeader::LAST_MODIFIED                    ,
            HttpHeader::VARY                             ,
            HttpHeader::AUTHORIZATION                    ,
            HttpHeader::PROXY_AUTHENTICATE               ,
            HttpHeader::PROXY_AUTHORIZATION              ,
            HttpHeader::WWW_AUTHENTICATE                 ,
            HttpHeader::COOKIE                           ,
            HttpHeader::SET_COOKIE                       ,
            HttpHeader::ACCEPT_RANGES                    ,
            HttpHeader::RANGE                            ,
            HttpHeader::RETRY_AFTER                      ,
            HttpHeader::CONNECTION                       ,
            HttpHeader::DATE                             ,
            HttpHeader::FORWARDED                        ,
            HttpHeader::HOST                             ,
            HttpHeader::KEEP_ALIVE                       ,
            HttpHeader::LINK                             ,
            HttpHeader::LOCATION                         ,
            HttpHeader::SERVER                           ,
            HttpHeader::TE                               ,
            HttpHeader::TRAILER                          ,
            HttpHeader::TRANSFER_ENCODING                ,
            HttpHeader::UPGRADE                          ,
            HttpHeader::VIA                              ,
            HttpHeader::DNT                              ,
            HttpHeader::ORIGIN                           ,
            HttpHeader::REFERER                          ,
            HttpHeader::USER_AGENT                       ,
            HttpHeader::UPGRADE_INSECURE_REQUESTS        ,
            HttpHeader::STRICT_TRANSPORT_SECURITY        ,
            HttpHeader::X_CONTENT_TYPE_OPTIONS           ,
            HttpHeader::X_FRAME_OPTIONS                  ,
            HttpHeader::X_XSS_PROTECTION                 ,
        ];

        foreach ( $expectedValues as $value )
        {
            $this->assertContains($value, $enums);
        }
    }

    public function testComposedTraitHeaders(): void
    {
        // Headers contributed by the per-category traits resolve through HttpHeader.
        $this->assertSame( 'Allow'               , HttpHeader::ALLOW               ) ;
        $this->assertSame( 'Expect'              , HttpHeader::EXPECT              ) ;
        $this->assertSame( 'Max-Forwards'        , HttpHeader::MAX_FORWARDS        ) ;
        $this->assertSame( 'Sec-Fetch-Site'      , HttpHeader::SEC_FETCH_SITE      ) ;
        $this->assertSame( 'Sec-CH-UA'           , HttpHeader::SEC_CH_UA           ) ;
        $this->assertSame( 'Clear-Site-Data'     , HttpHeader::CLEAR_SITE_DATA     ) ;
        $this->assertSame( 'Timing-Allow-Origin' , HttpHeader::TIMING_ALLOW_ORIGIN ) ;
        $this->assertSame( 'Reporting-Endpoints' , HttpHeader::REPORTING_ENDPOINTS ) ;
        $this->assertSame( 'Content-Digest'      , HttpHeader::CONTENT_DIGEST      ) ;
        $this->assertSame( 'Sec-WebSocket-Key'   , HttpHeader::SEC_WEBSOCKET_KEY   ) ;
        $this->assertSame( 'Idempotency-Key'     , HttpHeader::IDEMPOTENCY_KEY     ) ;
        $this->assertSame( 'Access-Control-Allow-Private-Network' , HttpHeader::ACCESS_CONTROL_ALLOW_PRIVATE_NETWORK ) ;

        // All trait constants are surfaced through ConstantsTrait reflection.
        $this->assertContains( HttpHeader::SEC_FETCH_SITE , HttpHeader::enums() ) ;
        $this->assertTrue( HttpHeader::includes( 'X-Requested-With' ) ) ;
    }

    /**
     * @throws ConstantException
     */
    public function testSendAndHasAndAll(): void
    {
        if ( !function_exists('xdebug_get_headers') )
        {
            $this->markTestSkipped('xdebug required to test header sending');
        }

        HttpHeader::send(HttpHeader::CONTENT_TYPE  , 'application/json' ) ;
        HttpHeader::send(HttpHeader::CACHE_CONTROL , 'no-cache'         ) ;

        // With an explicit response code (covers the header(..., $responseCode) path).
        HttpHeader::send(HttpHeader::VARY , 'Accept' , true , 200 ) ;

        // Name only, no value.
        HttpHeader::send(HttpHeader::CONNECTION ) ;

        $headers = xdebug_get_headers();

        $this->assertTrue(
            in_array(HttpHeader::CONTENT_TYPE . ': application/json', $headers),
            'Expected Content-Type header not found'
        );

        $this->assertTrue(
            in_array(HttpHeader::CACHE_CONTROL . ': no-cache', $headers),
            'Expected Cache-Control header not found'
        );

        $this->assertTrue(
            in_array(HttpHeader::VARY . ': Accept', $headers),
            'Expected Vary header not found'
        );
    }

    public function testAllReturnsHeadersList(): void
    {
        $this->assertIsArray( HttpHeader::all() ) ;
    }

    public function testHasReturnsFalseForUnsentHeader(): void
    {
        $this->assertFalse( HttpHeader::has( 'X-Never-Sent-Header' ) ) ;
    }

    public function testRemoveDoesNotThrowAndClearsHeader(): void
    {
        HttpHeader::remove( HttpHeader::CONTENT_TYPE ) ;
        $this->assertFalse( HttpHeader::has( HttpHeader::CONTENT_TYPE ) ) ;
    }

    public function testSendInvalidHeaderThrowsException(): void
    {
        $this->expectException(ConstantException::class);
        HttpHeader::send('X-Invalid-Header', 'oops');
    }
}
