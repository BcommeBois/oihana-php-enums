<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Pagination constants enumeration.
 *
 * Provides standardized constant names for pagination parameters used across
 * database queries, API responses, and data retrieval operations.
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 */
class Pagination
{
    use ConstantsTrait ;

    /**
     * The number of items to retrieve per page/request.
     * Used to limit the result set size.
     */
    public const string LIMIT = 'limit' ;

    /**
     * The maximum allowed limit value.
     * Prevents excessive resource consumption by capping the maximum
     * number of items that can be requested at once.
     */
    public const string MAX_LIMIT = 'maxLimit' ;

    /**
     * The minimum allowed limit value.
     * Ensures at least one item is requested when pagination is used.
     */
    public const string MIN_LIMIT = 'minLimit' ;

    /**
     * The number of items to skip from the beginning of the result set.
     * Used for pagination by specifying how many records to skip
     * before starting to return results.
     */
    public const string OFFSET  = 'offset' ;

    /**
     * The page number for page-based pagination.
     * Alternative to offset-based pagination, typically starting from 1.
     */
    public const string PAGE = 'page' ;
}