<?php

namespace tests\oihana\enums\http;

use oihana\enums\http\HttpHeader;
use PHPUnit\Framework\TestCase;

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
}
