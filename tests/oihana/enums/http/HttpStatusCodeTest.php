<?php

namespace tests\oihana\enums\http;

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
    }

    public function testGetType(): void
    {
        $this->assertSame(Output::INFO, HttpStatusCode::getType(HttpStatusCode::CONTINUE));
        $this->assertSame(Output::SUCCESS, HttpStatusCode::getType(HttpStatusCode::OK));
        $this->assertSame(Output::REDIRECT, HttpStatusCode::getType(HttpStatusCode::MOVED_PERMANENTLY));
        $this->assertSame(Output::ERROR, HttpStatusCode::getType(HttpStatusCode::NOT_FOUND));
        $this->assertSame(Output::ERROR, HttpStatusCode::getType(HttpStatusCode::INTERNAL_SERVER_ERROR));
        $this->assertNull(HttpStatusCode::getType(999));
    }
}
