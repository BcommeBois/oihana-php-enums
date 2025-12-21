<?php

namespace tests\oihana\enums ;

use oihana\enums\Char;
use oihana\reflect\exceptions\ConstantException;
use PHPUnit\Framework\TestCase;

class CharTest extends TestCase
{
    public function testEnumsReturnsAllConstantsSorted(): void
    {
        $enums = Char::enums();

        $this->assertIsArray($enums);

        $this->assertContains('&', $enums);
        $this->assertContains('©', $enums);
        $this->assertContains('₀', $enums);  // subscript zero
        $this->assertContains('¹', $enums);  // superscript one

        $sorted = $enums;
        sort($sorted, SORT_STRING);
        $this->assertSame($sorted, $enums);
    }

    public function testIncludesReturnsTrueForKnownValue(): void
    {
        $values = [
            Char::AMPERSAND,
            Char::DOLLAR_SIGN,
            Char::PLUS,
            Char::SUPERSCRIPT_TWO,
            Char::SUBSCRIPT_FIVE,
            Char::DOT
        ];

        foreach ($values as $value) {
            $this->assertTrue(Char::includes($value), "Failed asserting Char::includes() for '$value'");
        }

        $this->assertFalse(Char::includes('🌟'));
        $this->assertFalse(Char::includes('A'));
    }

    public function testGetConstantReturnsConstantName(): void
    {
        $map = [
            Char::AMPERSAND => 'AMPERSAND',
            Char::SUPERSCRIPT_ONE => 'SUPERSCRIPT_ONE',
            Char::SUBSCRIPT_ZERO => 'SUBSCRIPT_ZERO',
            Char::DOT => 'DOT',
        ];

        foreach ($map as $value => $name) {
            $this->assertSame($name, Char::getConstant($value));
        }

        $this->assertNull(Char::getConstant('🌟'));
    }

    public function testValidateThrowsExceptionOnInvalidValue(): void
    {
        $this->expectException(ConstantException::class);
        Char::validate('🌟');
    }

    /**
     * @throws ConstantException
     */
    public function testValidateDoesNotThrowForValidValue(): void
    {
        // Test plusieurs catégories
        $validValues = [
            Char::AMPERSAND,
            Char::DOLLAR_SIGN,
            Char::PLUS,
            Char::SUPERSCRIPT_TWO,
            Char::SUBSCRIPT_FIVE,
            Char::DOT
        ];

        foreach ($validValues as $value) {
            $this->expectNotToPerformAssertions();
            Char::validate($value);
        }
    }

    public function testAliasesPointToSameValue(): void
    {
        $aliases = [
            'HYPHEN' => 'DASH',
            'NUMBER' => 'HASH',
            'PERCENT' => 'MODULUS',
            'QUOTATION_MARK' => 'DOUBLE_QUOTE',
            'SIMPLE_QUOTE' => 'APOSTROPHE',
            'TICK' => 'GRAVE_ACCENT',
        ];

        foreach ($aliases as $alias => $target)
        {
            $this->assertSame( Char::{$target}, Char::{$alias}, "Alias $alias should point to $target");
        }
    }

    public function testAllConstantsAreStrings(): void
    {
        foreach (Char::enums() as $value) {
            $this->assertIsString($value);
        }
    }
}