<?php

namespace tests\oihana\enums ;

use oihana\enums\ServerParam;
use PHPUnit\Framework\TestCase;

class ServerParamTest extends TestCase
{
    public function testConstantsValues(): void
    {
        // Basic sampling of critical constants
        $this->assertSame('REQUEST_URI', ServerParam::REQUEST_URI);
        $this->assertSame('SERVER_ADDR', ServerParam::SERVER_ADDR);
        $this->assertSame('HTTP_USER_AGENT', ServerParam::HTTP_USER_AGENT);
        $this->assertSame('REMOTE_ADDR', ServerParam::REMOTE_ADDR);
        $this->assertSame('PHP_SELF', ServerParam::PHP_SELF);
        $this->assertSame('QUERY_STRING', ServerParam::QUERY_STRING);
    }

    public function testEnumsReturnsAllValues(): void
    {
        $enums = ServerParam::enums();

        $this->assertIsArray($enums);
        $this->assertContains('REQUEST_URI', $enums);
        $this->assertContains('SERVER_ADDR', $enums);
        $this->assertContains('HTTP_USER_AGENT', $enums);
    }

    public function testIncludes(): void
    {
        $this->assertTrue(ServerParam::includes('REQUEST_URI'));
        $this->assertTrue(ServerParam::includes('SERVER_PORT'));
        $this->assertFalse(ServerParam::includes('NON_EXISTENT_KEY'));
    }

    public function testGetConstant(): void
    {
        $this->assertSame('REQUEST_URI', ServerParam::getConstant('REQUEST_URI'));
        $this->assertSame('SERVER_PORT', ServerParam::getConstant('SERVER_PORT'));
        $this->assertNull(ServerParam::getConstant('FOOBAR'));
    }

    public function testAllConstantsAreStrings(): void
    {
        $reflection = new \ReflectionClass(ServerParam::class);
        foreach ($reflection->getConstants() as $value) {
            $this->assertIsString($value);
        }
    }
}