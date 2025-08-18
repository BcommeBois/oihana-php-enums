<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Output response constants enumeration.
 *
 * Provides standardized field names for API responses, JSON outputs,
 * and structured data formats. These constants ensure consistency
 * across different endpoints and response types.
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.0.0
 */
class Output
{
    use ConstantsTrait ;

    /**
     * Status or error code identifier.
     * Typically used for HTTP status codes or custom error codes.
     */
    public const string CODE = 'code' ;

    /**
     * Number of items in the current result set.
     * Represents the count of returned items, not the total available.
     */
    public const string COUNT = 'count' ;

    /**
     * Detailed information or nested data structure.
     * Used for additional context or breakdown of the main result.
     */
    public const string DETAILS = 'details' ;

    /**
     * Single error information.
     * Contains error details for a single error condition.
     */
    public const string ERROR = 'error' ;

    /**
     * Collection of error information.
     * Array or list containing multiple error details.
     */
    public const string ERRORS = 'errors' ;

    /**
     * Informational message or metadata.
     * Additional context or informational data about the response.
     */
    public const string INFO = 'info' ;

    /**
     * Maximum number of items requested.
     * Pagination parameter indicating the limit applied to the query.
     */
    public const string LIMIT = 'limit' ;

    /**
     * Human-readable message.
     * Descriptive text explaining the result, error, or status.
     */
    public const string MESSAGE = 'message' ;

    /**
     * Configuration options or parameters.
     * Settings or options that were applied during processing.
     */
    public const string OPTIONS = 'options' ;

    /**
     * Starting position for pagination.
     * Number of items skipped from the beginning of the result set.
     */
    public const string OFFSET = 'offset' ;

    /**
     * Owner or creator identifier.
     * User, system, or entity that owns or created the resource.
     */
    public const string OWNER = 'owner' ;

    /**
     * Input parameters or arguments.
     * Parameters that were passed to generate the response.
     */
    public const string PARAMS = 'params' ;

    /**
     * Current position or index.
     * Indicates the current position within a sequence or collection.
     */
    public const string POSITION = 'position' ;

    /**
     * Redirect URL or location.
     * URL where the client should be redirected after the operation.
     */
    public const string REDIRECT = 'redirect' ;

    /**
     * Main result data.
     * Primary data payload of the response.
     */
    public const string RESULT = 'result' ;

    /**
     * Operation status.
     * Indicates the current state or outcome of the operation.
     */
    public const string STATUS = 'status' ;

    /**
     * Success indicator.
     * Boolean flag indicating whether the operation was successful.
     */
    public const string SUCCESS = 'success' ;

    /**
     * Timestamp or duration.
     * Time-related information such as execution time or timestamp.
     */
    public const string TIME = 'time' ;

    /**
     * Total number of available items.
     * Complete count of items available, regardless of pagination limits.
     */
    public const string TOTAL = 'total' ;

    /**
     * URL or web address.
     * Web location or endpoint URL related to the response.
     */
    public const string URL = 'url' ;
}
