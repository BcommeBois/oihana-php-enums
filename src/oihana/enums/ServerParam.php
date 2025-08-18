<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard PHP $_SERVER keys.
 *
 * This class provides a centralized, type-safe list of server and execution
 * environment parameters that PHP exposes via the `$_SERVER` superglobal.
 *
 * Usage examples:
 * - Access a parameter name: HttpServerParam::REQUEST_URI
 * - Validate/inspect available names with ConstantsTrait utilities:
 *   - HttpServerParam::enums() returns all parameter names
 *   - HttpServerParam::includes('REQUEST_URI') checks existence
 *   - HttpServerParam::getConstant('REQUEST_URI') returns the constant name
 *
 * Notes:
 * - This list is based on common CGI/HTTP server variables available in PHP.
 * - Some values are optional and may not exist depending on SAPIs or context (CLI vs. web).
 * - Values are case-sensitive as per PHP convention.
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.0.0
 */
class ServerParam
{
    use ConstantsTrait ;

    // Execution environment
    const string PHP_SELF            = 'PHP_SELF';
    const string ARGUMENTS           = 'argv';
    const string ARGUMENT_COUNT      = 'argc';
    const string GATEWAY_INTERFACE   = 'GATEWAY_INTERFACE';

    // Server identity
    const string SERVER_ADDR         = 'SERVER_ADDR';
    const string SERVER_NAME         = 'SERVER_NAME';
    const string SERVER_SOFTWARE     = 'SERVER_SOFTWARE';
    const string SERVER_PROTOCOL     = 'SERVER_PROTOCOL';
    const string SERVER_PORT         = 'SERVER_PORT';
    const string SERVER_SIGNATURE    = 'SERVER_SIGNATURE';
    const string SERVER_ADMIN        = 'SERVER_ADMIN';

    // Request details
    const string REQUEST_METHOD      = 'REQUEST_METHOD';
    const string REQUEST_TIME        = 'REQUEST_TIME';
    const string REQUEST_TIME_FLOAT  = 'REQUEST_TIME_FLOAT';
    const string REQUEST_URI         = 'REQUEST_URI';
    const string QUERY_STRING        = 'QUERY_STRING';
    const string PATH_INFO           = 'PATH_INFO';
    const string ORIG_PATH_INFO      = 'ORIG_PATH_INFO';
    const string PATH_TRANSLATED     = 'PATH_TRANSLATED';
    const string SCRIPT_NAME         = 'SCRIPT_NAME';
    const string SCRIPT_FILENAME     = 'SCRIPT_FILENAME';
    const string DOCUMENT_ROOT       = 'DOCUMENT_ROOT';

    // Client identity
    const string REMOTE_ADDR          = 'REMOTE_ADDR';
    const string REMOTE_HOST          = 'REMOTE_HOST';
    const string REMOTE_PORT          = 'REMOTE_PORT';
    const string REMOTE_USER          = 'REMOTE_USER';
    const string REDIRECT_REMOTE_USER = 'REDIRECT_REMOTE_USER';

    // HTTP headers (mapped into $_SERVER)
    const string HTTP_ACCEPT          = 'HTTP_ACCEPT';
    const string HTTP_ACCEPT_CHARSET  = 'HTTP_ACCEPT_CHARSET';
    const string HTTP_ACCEPT_ENCODING = 'HTTP_ACCEPT_ENCODING';
    const string HTTP_ACCEPT_LANGUAGE = 'HTTP_ACCEPT_LANGUAGE';
    const string HTTP_CONNECTION      = 'HTTP_CONNECTION';
    const string HTTP_HOST            = 'HTTP_HOST';
    const string HTTP_REFERER         = 'HTTP_REFERER';
    const string HTTP_USER_AGENT      = 'HTTP_USER_AGENT';

    // Security & HTTPS
    const string HTTPS = 'HTTPS';

    // Authentication
    const string PHP_AUTH_DIGEST = 'PHP_AUTH_DIGEST';
    const string PHP_AUTH_USER   = 'PHP_AUTH_USER';
    const string PHP_AUTH_PW     = 'PHP_AUTH_PW';
    const string AUTH_TYPE       = 'AUTH_TYPE';
}