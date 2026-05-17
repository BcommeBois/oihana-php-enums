<?php

namespace tests\oihana\enums\http;

use PHPUnit\Framework\TestCase;

use oihana\enums\http\RequestAttribute;

class RequestAttributeTest extends TestCase
{
    public function testCamelCaseValues(): void
    {
        $this->assertSame( 'accessToken'    , RequestAttribute::ACCESS_TOKEN    ) ;
        $this->assertSame( 'authScheme'     , RequestAttribute::AUTH_SCHEME     ) ;
        $this->assertSame( 'tokenType'      , RequestAttribute::TOKEN_TYPE      ) ;
        $this->assertSame( 'userClaims'     , RequestAttribute::USER_CLAIMS     ) ;
        $this->assertSame( 'userId'         , RequestAttribute::USER_ID         ) ;
        $this->assertSame( 'userRoles'      , RequestAttribute::USER_ROLES      ) ;
        $this->assertSame( 'userScopes'     , RequestAttribute::USER_SCOPES     ) ;
        $this->assertSame( 'correlationId'  , RequestAttribute::CORRELATION_ID  ) ;
        $this->assertSame( 'requestId'      , RequestAttribute::REQUEST_ID      ) ;
        $this->assertSame( 'traceId'        , RequestAttribute::TRACE_ID        ) ;
        $this->assertSame( 'organizationId' , RequestAttribute::ORGANIZATION_ID ) ;
        $this->assertSame( 'tenantId'       , RequestAttribute::TENANT_ID       ) ;
        $this->assertSame( 'route'          , RequestAttribute::ROUTE           ) ;
        $this->assertSame( 'routeParams'    , RequestAttribute::ROUTE_PARAMS    ) ;
        $this->assertSame( 'locale'         , RequestAttribute::LOCALE          ) ;
    }

    public function testEnums(): void
    {
        $enums = RequestAttribute::enums() ;

        $this->assertIsArray( $enums ) ;

        $expectedValues =
        [
            RequestAttribute::ACCESS_TOKEN    ,
            RequestAttribute::AUTH_SCHEME     ,
            RequestAttribute::TOKEN_TYPE      ,
            RequestAttribute::USER_CLAIMS     ,
            RequestAttribute::USER_ID         ,
            RequestAttribute::USER_ROLES      ,
            RequestAttribute::USER_SCOPES     ,
            RequestAttribute::CORRELATION_ID  ,
            RequestAttribute::REQUEST_ID      ,
            RequestAttribute::TRACE_ID        ,
            RequestAttribute::ORGANIZATION_ID ,
            RequestAttribute::TENANT_ID       ,
            RequestAttribute::ROUTE           ,
            RequestAttribute::ROUTE_PARAMS    ,
            RequestAttribute::LOCALE          ,
        ];

        foreach ( $expectedValues as $value )
        {
            $this->assertContains( $value , $enums ) ;
        }
    }

    public function testValuesAreUnique(): void
    {
        $enums = RequestAttribute::enums() ;
        $this->assertSame( array_values( $enums ) , array_values( array_unique( $enums ) ) ) ;
    }

    public function testIncludesIsStrict(): void
    {
        $this->assertTrue ( RequestAttribute::includes( 'userId' ) ) ;
        $this->assertFalse( RequestAttribute::includes( 'UserId' ) ) ; // strict casing
        $this->assertFalse( RequestAttribute::includes( 'user_id' ) ) ;
        $this->assertFalse( RequestAttribute::includes( 'unknownAttribute' ) ) ;
    }
}
