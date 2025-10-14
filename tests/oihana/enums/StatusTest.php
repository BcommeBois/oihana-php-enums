<?php

namespace tests\oihana\enums ;

use oihana\enums\Status;
use oihana\reflect\exceptions\ConstantException;
use PHPUnit\Framework\TestCase;

final class StatusTest extends TestCase
{
    public function testGetAllReturnsAllConstants(): void
    {
        $all = Status::getAll();
        $this->assertIsArray($all);
        $this->assertArrayHasKey('ANONYMIZED', $all);
        $this->assertSame('anonymized', $all['ANONYMIZED']);
        $this->assertCount(8, $all);
    }

    public function testGetConstantValuesAndKeys(): void
    {
        $values = Status::getConstantValues();
        $keys   = Status::getConstantKeys();

        $this->assertContains('draft', $values);
        $this->assertContains('UNDER_REVIEW', $keys);
        $this->assertCount(8, $values);
        $this->assertCount(8, $keys);
    }

    public function testEnumsReturnsSortedUniqueValues(): void
    {
        $enums = Status::enums();
        $this->assertEquals(
            ['anonymized','archived','default','draft','published','rejected','under_review','unpublished'],
            $enums
        );
    }

    public function testIncludesReturnsTrueForValidValue(): void
    {
        $this->assertTrue(Status::includes('draft'));
        $this->assertTrue(Status::includes('published'));
    }

    public function testIncludesReturnsFalseForInvalidValue(): void
    {
        $this->assertFalse(Status::includes('not_a_status'));
    }

    public function testGetConstantReturnsNameForValue(): void
    {
        $this->assertSame('DRAFT', Status::getConstant('draft'));
        $this->assertSame('UNDER_REVIEW', Status::getConstant('under_review'));
    }

    public function testGetConstantReturnsNullForInvalidValue(): void
    {
        $this->assertNull(Status::getConstant('invalid'));
    }

    public function testValidatePassesForValidValue(): void
    {
        $this->expectNotToPerformAssertions();
        Status::validate('draft');
        Status::validate('published');
    }

    public function testValidateThrowsExceptionForInvalidValue(): void
    {
        $this->expectException(ConstantException::class);
        Status::validate('invalid_status');
    }
}