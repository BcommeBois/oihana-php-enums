<?php

namespace oihana\enums\http\headers;

/**
 * Error / network reporting HTTP header names (W3C Reporting).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ReportingHeaderTrait
{
    /**
     * `NEL` — Network Error Logging policy for the origin (W3C).
     */
    public const string NEL = 'NEL' ;

    /**
     * `Report-To` — Named reporting endpoint groups (legacy Reporting API).
     */
    public const string REPORT_TO = 'Report-To' ;

    /**
     * `Reporting-Endpoints` — Named reporting endpoints (Reporting API v1, replaces `Report-To`).
     */
    public const string REPORTING_ENDPOINTS = 'Reporting-Endpoints' ;
}
