<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Defines constants representing valid option keys for PHP's filter functions
 * (e.g. {@see filter_var()}, {@see filter_input()}).
 *
 * This class provides a type-safe alternative to using raw string keys such as
 * `'flags'`, `'options'`, `'min_range'`, and `'max_range'` when specifying filter
 * options. Using constants reduces typos and improves code completion.
 *
 * The {@see ConstantsTrait} allows you to retrieve these constants dynamically,
 * for example to validate option names or iterate over all possible values.
 *
 * @example
 * ```php
 * use oihana\enums\FilterOption;
 *
 * $param = '42';
 * $options =
 * [
 *     FilterOption::MIN_RANGE => 10,
 *     FilterOption::MAX_RANGE => 100,
 * ];
 *
 * $result = filter_var
 * (
 *     $param ,
 *     FILTER_VALIDATE_INT ,
 *     [ FilterOption::OPTIONS => $options ]
 * );
 *
 * var_dump($result); // int(42) if within range, or false otherwise
 * ```
 *
 * @package oihana\enums
 */
class FilterOption
{
    use ConstantsTrait ;

    /**
     * @var string Default filter option (applies when no specific configuration is set).
     */
    public const string DEFAULT = 'default';

    /**
     * @var string Flags filter option (used for bitmask or special mode flags).
     */
    public const string FLAGS = 'flags';

    /**
     * @var string Maximum range filter option (upper bound for range-based filters).
     */
    public const string MAX_RANGE = 'max_range';

    /**
     * @var string Minimum range filter option (lower bound for range-based filters).
     */
    public const string MIN_RANGE = 'min_range';

    /**
     * @var string Options list filter option (represents a set of allowed values or a config array).
     */
    public const string OPTIONS   = 'options';
}