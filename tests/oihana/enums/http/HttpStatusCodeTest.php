<?php

namespace tests\oihana\enums\http;

use Exception;
use RuntimeException;

use oihana\enums\http\HttpStatusCode;
use oihana\enums\Output;
use PHPUnit\Framework\TestCase;

class HttpStatusCodeTest extends TestCase
{
    public function testEnumsReturnsAllStatusCodes(): void
    {
        $this->assertIsArray(HttpStatusCode::enums());
    }

    public function testIncludesReturnsTrueForKnownStatusCode(): void
    {
        $this->assertTrue(HttpStatusCode::includes(200));
        $this->assertTrue(HttpStatusCode::includes(404));
        $this->assertFalse(HttpStatusCode::includes(999));
    }

    public function testGetConstantReturnsNameForValue(): void
    {
        $this->assertSame('OK', HttpStatusCode::getConstant(200));
        $this->assertSame('NOT_FOUND', HttpStatusCode::getConstant(404));
        $this->assertNull(HttpStatusCode::getConstant(999));
    }

    public function testGetDescription(): void
    {
        $this->assertSame('OK', HttpStatusCode::getDescription(HttpStatusCode::OK));
        $this->assertSame('Not found', HttpStatusCode::getDescription(HttpStatusCode::NOT_FOUND));
        $this->assertSame('An exception occurred', HttpStatusCode::getDescription(HttpStatusCode::DEFAULT));
        $this->assertSame('Multiple Choices', HttpStatusCode::getDescription(300));
        $this->assertSame('Bandwidth Limit Exceeded', HttpStatusCode::getDescription(509));

        $this->assertSame('Bandwidth Limit Exceeded', HttpStatusCode::getDescription('509'));
    }

    public function testGetDescriptionCoversEveryConstant(): void
    {
        foreach ( HttpStatusCode::getAll() as $name => $code )
        {
            $description = HttpStatusCode::getDescription( $code ) ;
            $this->assertIsString( $description , "Missing description for {$name} ({$code})" ) ;
            $this->assertNotSame( '' , $description , "Empty description for {$name} ({$code})" ) ;
        }
    }

    public function testGetType(): void
    {
        $this->assertSame(Output::INFO, HttpStatusCode::getType(HttpStatusCode::CONTINUE));
        $this->assertSame(Output::SUCCESS, HttpStatusCode::getType(HttpStatusCode::OK));
        $this->assertSame(Output::REDIRECT, HttpStatusCode::getType(HttpStatusCode::MOVED_PERMANENTLY));
        $this->assertSame(Output::ERROR, HttpStatusCode::getType(HttpStatusCode::NOT_FOUND));
        $this->assertSame(Output::ERROR, HttpStatusCode::getType(HttpStatusCode::INTERNAL_SERVER_ERROR));
        $this->assertSame(Output::ERROR, HttpStatusCode::getType(500));
        $this->assertNull(HttpStatusCode::getType(999));
    }

    public function testFromExceptionReturnsCodeWhenIn4xxRange(): void
    {
        $this->assertSame(HttpStatusCode::BAD_REQUEST  , HttpStatusCode::fromException( new Exception( 'bad'       , 400 ) ) );
        $this->assertSame(HttpStatusCode::UNAUTHORIZED , HttpStatusCode::fromException( new Exception( 'auth'      , 401 ) ) );
        $this->assertSame(HttpStatusCode::FORBIDDEN    , HttpStatusCode::fromException( new Exception( 'forbidden' , 403 ) ) );
        $this->assertSame(HttpStatusCode::NOT_FOUND    , HttpStatusCode::fromException( new Exception( 'missing'   , 404 ) ) );
        $this->assertSame(HttpStatusCode::CONFLICT     , HttpStatusCode::fromException( new Exception( 'conflict'  , 409 ) ) );
        $this->assertSame(422                          , HttpStatusCode::fromException( new Exception( 'invalid'   , 422 ) ) );
    }

    public function testFromExceptionReturnsCodeWhenIn5xxRange(): void
    {
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'boom' , 500 ) ) );
        $this->assertSame(HttpStatusCode::BAD_GATEWAY           , HttpStatusCode::fromException( new Exception( 'gw'   , 502 ) ) );
        $this->assertSame(HttpStatusCode::SERVICE_UNAVAILABLE   , HttpStatusCode::fromException( new Exception( 'down' , 503 ) ) );
        $this->assertSame(HttpStatusCode::GATEWAY_TIMEOUT       , HttpStatusCode::fromException( new Exception( 'slow' , 504 ) ) );
    }

    public function testFromExceptionReturnsBoundaryCodes(): void
    {
        $this->assertSame(HttpStatusCode::BAD_REQUEST , HttpStatusCode::fromException( new Exception( 'lower bound' , 400 ) ) );
        $this->assertSame(599                         , HttpStatusCode::fromException( new Exception( 'upper bound' , 599 ) ) );
    }

    public function testFromExceptionFallsBackTo500ForOutOfRangeCodes(): void
    {
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'no code'   , 0   ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'negative'  , -1  ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'info'      , 100 ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'success'   , 200 ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'redirect'  , 302 ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'busy'      , 600 ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'driver'    , 1234 ) ) );
    }

    public function testFromExceptionFallsBackTo500ForDefaultExceptionCode(): void
    {
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new Exception( 'oops' ) ) );
        $this->assertSame(HttpStatusCode::INTERNAL_SERVER_ERROR , HttpStatusCode::fromException( new RuntimeException( 'crash' ) ) );
    }
}
