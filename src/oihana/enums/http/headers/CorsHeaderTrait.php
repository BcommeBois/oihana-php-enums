<?php

namespace oihana\enums\http\headers;

/**
 * CORS (Cross-Origin Resource Sharing) header names.
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait CorsHeaderTrait
{
    /**
     * `Access-Control-Allow-Credentials` — Whether the response may be exposed when credentials are sent.
     */
    public const string ACCESS_CONTROL_ALLOW_CREDENTIALS = 'Access-Control-Allow-Credentials' ;

    /**
     * `Access-Control-Allow-Headers` — Request headers allowed during the actual cross-origin request.
     */
    public const string ACCESS_CONTROL_ALLOW_HEADERS = 'Access-Control-Allow-Headers' ;

    /**
     * `Access-Control-Allow-Methods` — Methods allowed when accessing the resource cross-origin.
     */
    public const string ACCESS_CONTROL_ALLOW_METHODS = 'Access-Control-Allow-Methods' ;

    /**
     * `Access-Control-Allow-Origin` — Origin(s) allowed to access the resource.
     */
    public const string ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin' ;

    /**
     * `Access-Control-Allow-Private-Network` — Grants access to a resource on a private network (Private Network Access).
     */
    public const string ACCESS_CONTROL_ALLOW_PRIVATE_NETWORK = 'Access-Control-Allow-Private-Network' ;

    /**
     * `Access-Control-Expose-Headers` — Response headers exposed to client-side script.
     */
    public const string ACCESS_CONTROL_EXPOSE_HEADERS = 'Access-Control-Expose-Headers' ;

    /**
     * `Access-Control-Max-Age` — How long (seconds) the preflight result may be cached.
     */
    public const string ACCESS_CONTROL_MAX_AGE = 'Access-Control-Max-Age' ;

    /**
     * `Access-Control-Request-Headers` — Preflight: headers the actual request will use.
     */
    public const string ACCESS_CONTROL_REQUEST_HEADERS = 'Access-Control-Request-Headers' ;

    /**
     * `Access-Control-Request-Method` — Preflight: method the actual request will use.
     */
    public const string ACCESS_CONTROL_REQUEST_METHOD = 'Access-Control-Request-Method' ;

    /**
     * `Access-Control-Request-Private-Network` — Preflight: actual request targets a private network (Private Network Access).
     */
    public const string ACCESS_CONTROL_REQUEST_PRIVATE_NETWORK = 'Access-Control-Request-Private-Network' ;
}
