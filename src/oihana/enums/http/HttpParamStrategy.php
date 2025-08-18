<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Defines the strategy used to retrieve parameters from an HTTP request.
 *
 * This class provides three strategies:
 *
 * - {@see HttpParamStrategy::BODY}  → Retrieve parameters from the request body only.
 * - {@see HttpParamStrategy::QUERY} → Retrieve parameters from the query string only.
 * - {@see HttpParamStrategy::BOTH}  → Retrieve parameters from both the body and the query string.
 *
 * The {@see ConstantsTrait} can be used to enumerate or validate these strategies.
 *
 * Example:
 * ```php
 * if ($strategy === HttpParamStrategy::BODY)
 * {
 *     // Retrieve parameters only from the body
 * }
 * ```
 */
class HttpParamStrategy
{
    use ConstantsTrait;

    /**
     * Retrieve parameters from the request body only.
     */
    public const string BODY  = 'body';

    /**
     * Retrieve parameters from both the request body and the query string.
     */
    public const string BOTH  = 'both';

    /**
     * Retrieve parameters from the query string only.
     */
    public const string QUERY = 'query';
}