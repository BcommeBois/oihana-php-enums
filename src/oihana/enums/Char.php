<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * A comprehensive enumeration of commonly used single-character strings,
 * including punctuation marks, mathematical symbols, whitespace characters,
 * typographic signs, and Unicode superscript/subscript digits.
 *
 * This class is particularly useful when working with string manipulation,
 * formatting, code generation, or when symbolic constants are preferred
 * over raw string literals for better readability and maintainability.
 *
 * ### Features:
 * - All constants are strings, representing a wide range of characters.
 * - Includes ASCII, Unicode typographic, superscript, and subscript symbols.
 * - Helps reduce the use of "magic characters" in your codebase.
 * - Designed to be compatible with the `ConstantsTrait` for reflection or listing.
 *
 * ### Example:
 * ```php
 * use oihana\enums\Char;
 *
 * echo 'A' . Char::DOT . 'B' ; // Outputs: A.B
 * echo Char::SUPERSCRIPT_TWO ; // Outputs: ²
 *
 * echo implode( Char::COMMA . Char::SPACE, ['one', 'two', 'three'] ) ;
 * ```
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.0.0
 */
class Char
{
    use ConstantsTrait ;

    // ------------------------------------------- Control characters / Whitespace

    /**
     * Carriage Return (CR, ASCII 13)
     */
    public const string CR = "\r" ;

    /**
     * Carriage Return (CR, ASCII 13) - alias of {@see Char::CR}
     */
    public const string CARRIAGE_RETURN = self::CR ;

    /**
     * Carriage Return + Line Feed (CRLF)
     * Canonical Windows / network newline
     */
    public const string CRLF = "\r\n" ;

    /**
     * Line Feed (LF, ASCII 10)
     */
    public const string LF = "\n" ;

    /**
     * Carriage Return (CR, ASCII 13) - alias of {@see Char::LF}
     */
    public const string LINE_FEED = self::LF ;

    /**
     * System-dependent end-of-line (PHP_EOL)
     */
    public const string EOL = PHP_EOL ;

    /**
     * Horizontal Tab (HT, ASCII 9)
     */
    public const string TAB = "\t" ;

    /**
     * Vertical Tab (VT, ASCII 11)
     */
    public const string VT = "\v" ;

    /**
     * Form Feed (FF, ASCII 12)
     */
    public const string FF = "\f" ;

    /**
     * Line separator (U+2028)
     */
    public const string LINE_SEPARATOR = "\u{2028}" ;

    /**
     * Non-breaking space (U+00A0)
     */
    public const string NBSP = "\xC2\xA0" ;

    /**
     * Unicode next line (NEL, U+0085)
     */
    public const string NEL = "\xC2\x85" ;

    /**
     * Paragraph separator (U+2029)
     */
    public const string PARAGRAPH_SEPARATOR = "\u{2029}" ;

    /**
     * Space (ASCII 32)
     */
    public const string SPACE = ' ' ;


    // ------------------------------------------- Currency symbols

    /**
     * Bitcoin sign
     */
    public const string BITCOIN_SIGN = '₿' ;

    /**
     * Dollar sign
     */
    public const string DOLLAR_SIGN = '$' ;

    /**
     * Cent
     */
    public const string CENT_SIGN = '¢' ;

    /**
     * Euro sign
     */
    public const string EURO_SIGN = '€' ;

    /**
     * Pound sterling
     */
    public const string POUND_SIGN = '£' ;


    /**
     * Indian Rupee
     */
    public const string RUPEE_SIGN = '₹' ;

    /**
     * South Korean Won
     */
    public const string WON_SIGN = '₩' ;

    /**
     * Yen / Yuan
     */
    public const string YEN_SIGN = '¥' ;


    // ------------------------------------------- Mathematical operators

    /**
     * Approximately equal
     */
    public const string APPROXIMATELY = '≈' ;

    /**
     * Addition
     */
    public const string PLUS = '+' ;

    /**
     * Subtraction
     */
    public const string MINUS = '-' ;

    /**
     * Multiplication
     */
    public const string MULTIPLY = '×' ;

    /**
     * Division
     */
    public const string DIVIDE = '÷' ;

    /**
     * Plus-minus
     */
    public const string PLUS_MINUS = '±' ;

    /**
     * Equal
     */
    public const string EQUAL = '=' ;

    /**
     * Not equal
     */
    public const string NOT_EQUAL = '≠' ;

    /**
     * Less than
     */
    public const string LESS_THAN = '<' ;

    /**
     * Greater than
     */
    public const string GREATER_THAN = '>' ;

    /**
     * Less than or equal
     */
    public const string LESS_EQUAL = '≤' ;

    /**
     * Greater than or equal
     */
    public const string GREATER_EQUAL = '≥' ;

    /**
     * Infinity
     */
    public const string INFINITY = '∞' ;

    /**
     * Pi
     */
    public const string PI = 'π' ;

    /**
     * Square root
     */
    public const string SQUARE_ROOT = '√' ;

    /**
     * Degree
     */
    public const string DEGREE = '°' ;

    /**
     * Per mille
     */
    public const string PER_MILLE = '‰' ;

    /**
     * Fraction slash
     */
    public const string FRACTION_SLASH = '⁄' ;

    // ------------------------------------------- Other mathematical symbols

    /**
     * Modulus / percent
     */
    public const string MODULUS = '%' ;

    /**
     * Left parenthesis
     */
    public const string LEFT_PARENTHESIS  = '(' ;

    /**
     * Right parenthesis
     */
    public const string RIGHT_PARENTHESIS = ')' ;

    /**
     * Left bracket
     */
    public const string LEFT_BRACKET = '[' ;

    /**
     * Right bracket
     */
    public const string RIGHT_BRACKET = ']' ;

    /**
     * Left brace
     */
    public const string LEFT_BRACE = '{' ;

    /**
     * Right brace
     */
    public const string RIGHT_BRACE = '}' ;

    /**
     * Vertical bar / pipe
     */
    public const string PIPE = '|' ;

    /**
     * Dot / period
     */
    public const string DOT = '.' ;

    /**
     * Comma
     */
    public const string COMMA = ',' ;

    /**
     * Colon
     */
    public const string COLON = ':' ;

    // ------------------------------------------- Main characters

    public const string AMPERSAND          = "&" ;
    public const string APOSTROPHE         = "'" ;
    public const string AT_SIGN            = '@' ;
    public const string ASTERISK           = '*' ;
    public const string BACK_SLASH         = '\\' ;
    public const string BULLET             = '•' ;
    public const string CHECK_MARK         = '✔' ;
    public const string CIRCUMFLEX         = '^' ;
    public const string COPYRIGHT          = '©' ;
    public const string CROSS_MARK         = '✘' ;
    public const string DASH               = '-' ;
    public const string DOLLAR             = '$' ;
    public const string DOUBLE_ACUTE       = '˝' ;
    public const string DOUBLE_QUOTE       = '"' ;
    public const string DOUBLE_QUOTE_LEFT  = '“' ;
    public const string DOUBLE_QUOTE_RIGHT = '”' ;
    public const string EM_DASH            = '—' ;
    public const string EN_DASH            = '–' ;
    public const string EMPTY              = ''  ;
    public const string EXCLAMATION_MARK   = '!' ;
    public const string GRAVE_ACCENT       = '`' ;
    public const string HASH               = '#' ;
    public const string HEART              = '♥' ;
    public const string MICRO_SIGN         = 'µ' ;
    public const string PILCROW            = '¶' ;
    public const string QUESTION_MARK      = '?' ;
    public const string QUOTE_LEFT         = '‘' ;
    public const string QUOTE_RIGHT        = '’' ;
    public const string REGISTERED         = '®' ;
    public const string SECTION_SIGN       = '§' ;
    public const string SEMI_COLON         = ';' ;
    public const string SLASH              = '/' ;
    public const string SNOWFLAKE          = '❄' ;
    public const string TILDE              = '~' ;
    public const string TRADEMARK          = '™' ;
    public const string UNDERLINE          = '_' ;

    // ------------------------------------------- Special multiple characters

    public const string DOUBLE_BACK_SLASH  = '\\\\' ;
    public const string DOUBLE_COLON       = '::' ;
    public const string DOUBLE_DOT         = '..' ;
    public const string DOUBLE_EQUAL       = '==' ;
    public const string DOUBLE_HYPHEN      = '--' ;
    public const string DOUBLE_PIPE        = '||' ;
    public const string DOUBLE_SLASH       = '//' ;
    public const string TRIPLE_DOT         = '...' ;

    // ------------------------------------------- Alias

    public const string HYPHEN             = self::DASH ;
    public const string NUMBER             = self::HASH ;
    public const string PERCENT            = self::MODULUS ;
    public const string QUOTATION_MARK     = self::DOUBLE_QUOTE ;
    public const string SIMPLE_QUOTE       = self::APOSTROPHE ;
    public const string TICK               = self::GRAVE_ACCENT ;

    // ------------------------------------------- Common Superscripts (digits and symbols)

    public const string SUPERSCRIPT_ZERO              = '⁰' ;  // U+2070
    public const string SUPERSCRIPT_ONE               = '¹' ;  // U+00B9
    public const string SUPERSCRIPT_TWO               = '²' ;  // U+00B2
    public const string SUPERSCRIPT_THREE             = '³' ;  // U+00B3
    public const string SUPERSCRIPT_FOUR              = '⁴' ;  // U+2074
    public const string SUPERSCRIPT_FIVE              = '⁵' ;  // U+2075
    public const string SUPERSCRIPT_SIX               = '⁶' ;  // U+2076
    public const string SUPERSCRIPT_SEVEN             = '⁷' ;  // U+2077
    public const string SUPERSCRIPT_EIGHT             = '⁸' ;  // U+2078
    public const string SUPERSCRIPT_NINE              = '⁹' ;  // U+2079
    public const string SUPERSCRIPT_PLUS              = '⁺' ;  // U+207A
    public const string SUPERSCRIPT_MINUS             = '⁻' ;  // U+207B
    public const string SUPERSCRIPT_EQUAL             = '⁼' ;  // U+207C
    public const string SUPERSCRIPT_LEFT_PARENTHESIS  = '⁽' ;  // U+207D
    public const string SUPERSCRIPT_RIGHT_PARENTHESIS = '⁾' ;

    // ------------------------------------------- Common Subscripts (digits and symbols)

    public const string SUBSCRIPT_ZERO              = '₀' ; // U+2080
    public const string SUBSCRIPT_ONE               = '₁' ; // U+2081
    public const string SUBSCRIPT_TWO               = '₂' ; // U+2082
    public const string SUBSCRIPT_THREE             = '₃' ; // U+2083
    public const string SUBSCRIPT_FOUR              = '₄' ; // U+2084
    public const string SUBSCRIPT_FIVE              = '₅' ; // U+2085
    public const string SUBSCRIPT_SIX               = '₆' ; // U+2086
    public const string SUBSCRIPT_SEVEN             = '₇' ; // U+2087
    public const string SUBSCRIPT_EIGHT             = '₈' ; // U+2088
    public const string SUBSCRIPT_NINE              = '₉' ; // U+2089
    public const string SUBSCRIPT_PLUS              = '₊' ; // U+208A
    public const string SUBSCRIPT_MINUS             = '₋' ; // U+208B
    public const string SUBSCRIPT_EQUAL             = '₌' ; // U+208C
    public const string SUBSCRIPT_LEFT_PARENTHESIS  = '₍' ; // U+208D
    public const string SUBSCRIPT_RIGHT_PARENTHESIS = '₎' ;
}