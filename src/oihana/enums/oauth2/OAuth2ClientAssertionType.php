<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 `client_assertion_type` values (RFC 7521).
 *
 * Values used with the {@see OAuth2Parameter::CLIENT_ASSERTION_TYPE}
 * parameter to indicate the format of the assertion carried in
 * {@see OAuth2Parameter::CLIENT_ASSERTION}.
 *
 * Used for the `client_secret_jwt` and `private_key_jwt` client
 * authentication methods (see {@see OAuth2TokenEndpointAuthMethod}).
 *
 * Example:
 * ```php
 * $params =
 * [
 *     OAuth2Parameter::GRANT_TYPE            => OAuth2GrantType::CLIENT_CREDENTIALS ,
 *     OAuth2Parameter::CLIENT_ASSERTION_TYPE => OAuth2ClientAssertionType::JWT_BEARER ,
 *     OAuth2Parameter::CLIENT_ASSERTION      => $signedJwt ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7521  §4.2 (Assertion-based client authentication)
 * - RFC 7522  §2.2 (SAML 2.0 bearer client authentication)
 * - RFC 7523  §2.2 (JWT bearer client authentication)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2ClientAssertionType
{
    use ConstantsTrait ;

    /**
     * `urn:ietf:params:oauth:client-assertion-type:jwt-bearer` —
     * The `client_assertion` is a JWT signed either with the client's
     * shared secret (`client_secret_jwt`) or with the client's private
     * key (`private_key_jwt`).
     *
     * Defined by RFC 7523 §2.2.
     */
    public const string JWT_BEARER = 'urn:ietf:params:oauth:client-assertion-type:jwt-bearer' ;

    /**
     * `urn:ietf:params:oauth:client-assertion-type:saml2-bearer` —
     * The `client_assertion` is a SAML 2.0 bearer assertion.
     *
     * Defined by RFC 7522 §2.2.
     */
    public const string SAML2_BEARER = 'urn:ietf:params:oauth:client-assertion-type:saml2-bearer' ;
}
