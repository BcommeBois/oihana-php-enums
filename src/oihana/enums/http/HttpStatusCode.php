<?php

namespace oihana\enums\http;

use oihana\enums\Output;
use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard HTTP status codes.
 *
 * This class provides a centralized, type-safe list of common HTTP status
 * codes, preserving the exact numeric values defined by the relevant
 * RFCs (notably RFC 7231 and RFC 9110).
 *
 * Usage examples:
 * - Access a status code: HttpStatusCode::OK
 * - Validate/inspect available codes with ConstantsTrait utilities:
 *   - HttpStatusCode::enums() returns all status code values
 *   - HttpStatusCode::includes(200) checks existence
 *   - HttpStatusCode::getConstant(200) returns the constant name
 *
 * Notes:
 * - Only widely used standardized status codes are listed.
 */
class HttpStatusCode
{
    use ConstantsTrait;

    // Default response
    const int DEFAULT = 0 ;

    // 1xx Informational
    const int CONTINUE               = 100 ;
    const int SWITCHING_PROTOCOLS    = 101 ;
    const int PROCESSING             = 102 ;
    const int EARLY_HINTS            = 103 ;

    // 2xx Success
    const int OK                               = 200 ;
    const int CREATED                          = 201 ;
    const int ACCEPTED                         = 202 ;
    const int NON_AUTHORITATIVE_INFORMATION    = 203 ;
    const int NO_CONTENT                       = 204 ;
    const int RESET_CONTENT                    = 205 ;
    const int PARTIAL_CONTENT                  = 206 ;
    const int MULTI_STATUS                     = 207 ;
    const int ALREADY_REPORTED                 = 208 ;
    const int IM_USED                          = 226 ;

    // 3xx Redirection
    const int MULTIPLE_CHOICES   = 300 ;
    const int MOVED_PERMANENTLY  = 301 ;
    const int FOUND              = 302 ;
    const int SEE_OTHER          = 303 ;
    const int NOT_MODIFIED       = 304 ;
    const int USE_PROXY          = 305 ;
    const int TEMPORARY_REDIRECT = 307 ;
    const int PERMANENT_REDIRECT = 308 ;

    // 4xx Client Error
    const int BAD_REQUEST                     = 400 ;
    const int UNAUTHORIZED                    = 401 ;
    const int PAYMENT_REQUIRED                = 402 ;
    const int FORBIDDEN                       = 403 ;
    const int NOT_FOUND                       = 404 ;
    const int METHOD_NOT_ALLOWED              = 405 ;
    const int NOT_ACCEPTABLE                  = 406 ;
    const int PROXY_AUTHENTICATION_REQUIRED   = 407 ;
    const int REQUEST_TIMEOUT                 = 408 ;
    const int CONFLICT                        = 409 ;
    const int GONE                            = 410 ;
    const int LENGTH_REQUIRED                 = 411 ;
    const int PRECONDITION_FAILED             = 412 ;
    const int PAYLOAD_TOO_LARGE               = 413 ;
    const int URI_TOO_LONG                    = 414 ;
    const int UNSUPPORTED_MEDIA_TYPE          = 415 ;
    const int RANGE_NOT_SATISFIABLE           = 416 ;
    const int EXPECTATION_FAILED              = 417 ;
    const int IM_A_TEAPOT                     = 418 ;
    const int MISDIRECTED_REQUEST             = 421 ;
    const int UNPROCESSABLE_ENTITY            = 422 ;
    const int LOCKED                          = 423 ;
    const int FAILED_DEPENDENCY               = 424 ;
    const int TOO_EARLY                       = 425 ;
    const int UPGRADE_REQUIRED                = 426 ;
    const int PRECONDITION_REQUIRED           = 428 ;
    const int TOO_MANY_REQUESTS               = 429 ;
    const int REQUEST_HEADER_FIELDS_TOO_LARGE = 431 ;
    const int UNAVAILABLE_FOR_LEGAL_REASONS   = 451 ;

    // 5xx Server Error
    const int INTERNAL_SERVER_ERROR            = 500 ;
    const int NOT_IMPLEMENTED                  = 501 ;
    const int BAD_GATEWAY                      = 502 ;
    const int SERVICE_UNAVAILABLE              = 503 ;
    const int GATEWAY_TIMEOUT                  = 504 ;
    const int HTTP_VERSION_NOT_SUPPORTED       = 505 ;
    const int VARIANT_ALSO_NEGOTIATES          = 506 ;
    const int INSUFFICIENT_STORAGE             = 507 ;
    const int LOOP_DETECTED                    = 508 ;
    const int BANDWIDTH_LIMIT_EXCEEDED         = 509 ;
    const int NOT_EXTENDED                     = 510 ;
    const int NETWORK_AUTHENTICATION_REQUIRED  = 511 ;

    // Custom Status Code

    const int RESPONSE_IS_STALE      = 110 ; // custom
    const int REVALIDATION_FAILED    = 111 ; // custom
    const int DISCONNECTED_OPERATION = 112 ; // custom
    const int HEURISTIC_EXPIRATION   = 113 ; // custom
    const int MISCELLANEOUS_WARNING  = 199 ; // custom

    const int TRANSFORMATION_APPLIED           = 214 ; // custom
    const int MISCELLANEOUS_PERSISTENT_WARNING = 299 ; // custom

    const int SWITCH_PROXY = 306 ; // custom

    const int LOGIN_TIMEOUT                   = 440 ; // custom
    const int HTTP_REQUEST_SENT_TO_HTTPS_PORT = 497 ; // custom
    const int INVALID_TOKEN                   = 498 ; // custom
    const int TOKEN_REQUIRED                  = 499 ; // custom

    const int NETWORK_CONNECTION_TIMEOUT_ERROR = 599 ;

    const int BUSY = 600 ;

    /**
     * Returns the status type of the specific code.
     * @param int|string $code
     * @return ?string
     */
    public static function getDescription( int|string $code ):?string
    {
        return match( $code )
        {
            self::DEFAULT => "An exception occurred" ,

            // Informational responses

            self::CONTINUE => "Continue" ,
            self::SWITCHING_PROTOCOLS => "Switching Protocols" ,
            self::PROCESSING => "Processing" ,
            self::EARLY_HINTS => "Early Hints" ,
            self::RESPONSE_IS_STALE => "Response is Stale" ,
            self::REVALIDATION_FAILED => "Revalidation Failed" ,
            self::DISCONNECTED_OPERATION => "Disconnected Operation" ,
            self::HEURISTIC_EXPIRATION => "Heuristic Expiration" ,
            self::MISCELLANEOUS_WARNING => "Miscellaneous Warning" ,

            // Successful responses

            self::OK => "OK" ,
            self::CREATED => "Created" ,
            self::ACCEPTED => "Accepted" ,
            self::NON_AUTHORITATIVE_INFORMATION => "Non-Authoritative Information" ,
            self::NO_CONTENT => "No Content" ,
            self::RESET_CONTENT => "Reset Content" ,
            self::PARTIAL_CONTENT => "Partial Content" ,
            self::MULTI_STATUS => "Multi-Status" ,
            self::ALREADY_REPORTED => "Already Reported" ,
            self::TRANSFORMATION_APPLIED => "Transformation Applied" ,
            self::IM_USED => "IM Used" ,
            self::MISCELLANEOUS_PERSISTENT_WARNING => "Miscellaneous Persistent Warning" ,

            // Redirection messages

            self::MULTIPLE_CHOICES => "Multiple Choices" ,
            self::MOVED_PERMANENTLY => "Moved Permanently" ,
            self::FOUND => "Found" ,
            self::SEE_OTHER => "See Other" ,
            self::NOT_MODIFIED => "Not Modified" ,
            self::USE_PROXY => "Use Proxy" ,
            self::SWITCH_PROXY => "Switch Proxy" ,
            self::TEMPORARY_REDIRECT => "Temporary Redirect" ,
            self::PERMANENT_REDIRECT => "Permanent Redirect" ,

            // Client error responses

            self::BAD_REQUEST => "Bad Request" ,
            self::UNAUTHORIZED => "Unauthorized" ,
            self::PAYMENT_REQUIRED => "Payment Required" ,
            self::FORBIDDEN => "Forbidden" ,
            self::NOT_FOUND => "Not found" ,
            self::METHOD_NOT_ALLOWED => "Method Not Allowed" ,
            self::NOT_ACCEPTABLE => "Not Acceptable" ,
            self::PROXY_AUTHENTICATION_REQUIRED => "Proxy Authentication Required" ,
            self::REQUEST_TIMEOUT => "Request Timeout" ,
            self::CONFLICT => "Conflict" ,
            self::GONE => "Gone" ,
            self::LENGTH_REQUIRED => "Length Required" ,
            self::PRECONDITION_FAILED => "Precondition Failed" ,
            self::PAYLOAD_TOO_LARGE => "Payload Too Large" ,
            self::URI_TOO_LONG => "Request-URI Too Long" ,
            self::UNSUPPORTED_MEDIA_TYPE => "Unsupported Media Type" ,
            self::RANGE_NOT_SATISFIABLE => "Range Not Satisfiable" ,
            self::EXPECTATION_FAILED => "Expectation Failed" ,
            self::IM_A_TEAPOT => "I'm a teapot" ,
            self::MISDIRECTED_REQUEST => "Misdirected Request" ,
            self::UNPROCESSABLE_ENTITY => "Unprocessable Entity" ,
            self::LOCKED => "Locked" ,
            self::FAILED_DEPENDENCY => "Failed Dependency" ,
            self::TOO_EARLY => "Too Early" ,
            self::UPGRADE_REQUIRED => "Upgrade Required" ,
            self::PRECONDITION_REQUIRED => "Precondition Required" ,
            self::TOO_MANY_REQUESTS => "Too Many Requests" ,
            self::REQUEST_HEADER_FIELDS_TOO_LARGE => "Request Header Fields Too Large" ,
            self::LOGIN_TIMEOUT => "Login Timeout" ,
            self::UNAVAILABLE_FOR_LEGAL_REASONS => "Unavailable For Legal Reasons" ,
            self::HTTP_REQUEST_SENT_TO_HTTPS_PORT => "HTTP Request Sent to HTTPS Port" ,
            self::INVALID_TOKEN => "Invalid Token" ,
            self::TOKEN_REQUIRED => "Token Required" ,

            // Server error responses

            self::INTERNAL_SERVER_ERROR => "Internal Server Error" ,
            self::NOT_IMPLEMENTED => "Not implemented" ,
            self::BAD_GATEWAY => "Bad Gateway" ,
            self::SERVICE_UNAVAILABLE => "Service Unavailable" ,
            self::GATEWAY_TIMEOUT => "Gateway Timeout" ,
            self::HTTP_VERSION_NOT_SUPPORTED => "HTTP Version Not Supported" ,
            self::VARIANT_ALSO_NEGOTIATES => "Variant Also Negotiates" ,
            self::INSUFFICIENT_STORAGE => "Insufficient Storage" ,
            self::LOOP_DETECTED => "Loop Detected" ,
            self::BANDWIDTH_LIMIT_EXCEEDED => "Bandwidth Limit Exceeded" ,
            self::NOT_EXTENDED => "Not Extended" ,
            self::NETWORK_AUTHENTICATION_REQUIRED => "Network Authentication Required" ,
            self::NETWORK_CONNECTION_TIMEOUT_ERROR => "Network Connect Timeout Error" ,

            // Custom Status Code

            self::BUSY => "Busy" ,
        };
    }

    /**
     * Returns the status type of the specific code.
     * @param int|string $code
     * @return ?string
     */
    public static function getType( int|string $code ):?string
    {
        if( $code >= 100 && $code < 200 ) // 1xx informational response
        {
            return Output::INFO ;
        }
        elseif( $code >= 200 && $code < 300 ) // 2xx successful
        {
            return Output::SUCCESS ;
        }
        elseif( $code >= 300 && $code < 400 ) // 3xx redirection
        {
            return Output::REDIRECT ;
        }
        elseif( $code >= 400 && $code < 600 ) // 4xx client error | 5xx server error
        {
            return Output::ERROR ;
        }
        return null ;
    }
}
