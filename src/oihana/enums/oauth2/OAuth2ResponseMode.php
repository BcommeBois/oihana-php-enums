<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OpenID Connect `response_mode` values.
 *
 * The `response_mode` parameter tells the authorization server how to return
 * the authorization response parameters to the client. Only the *name* of the
 * parameter is provided by {@see OAuth2Parameter::RESPONSE_MODE}; this class
 * provides the values it can take.
 *
 * Three families are exposed here:
 *
 * 1. **Plain modes** — `query`, `fragment` (OAuth 2.0 Multiple Response Type
 *    Encoding Practices) and `form_post` (OAuth 2.0 Form Post Response Mode).
 * 2. **JARM** — `jwt`, `query.jwt`, `fragment.jwt`, `form_post.jwt`, where the
 *    response parameters are wrapped in a signed/encrypted JWT (JWT Secured
 *    Authorization Response Mode).
 * 3. **Web message** — `web_message`, used for silent authentication in SPAs
 *    (draft, but widely deployed).
 *
 * Example:
 * ```php
 * $params =
 * [
 *     OAuth2Parameter::RESPONSE_TYPE => OAuth2ResponseType::CODE ,
 *     OAuth2Parameter::RESPONSE_MODE => OAuth2ResponseMode::FORM_POST ,
 * ] ;
 * ```
 *
 * References:
 * - OAuth 2.0 Multiple Response Type Encoding Practices (`query`, `fragment`)
 * - OAuth 2.0 Form Post Response Mode (`form_post`)
 * - JWT Secured Authorization Response Mode for OAuth 2.0 (JARM)
 * - OAuth 2.0 Web Message Response Mode (`web_message`, draft)
 *
 * @see OAuth2Parameter::RESPONSE_MODE
 * @see OidcDiscoveryField::RESPONSE_MODES_SUPPORTED
 * @see OAuth2ResponseType
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2ResponseMode
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Plain response modes
    // -------------------------------------------------------------------------

    /**
     * `query` — Parameters returned in the query component of the redirect URI. Default for `code`.
     */
    public const string QUERY = 'query' ;

    /**
     * `fragment` — Parameters returned in the fragment of the redirect URI. Default for `token` / `id_token`.
     */
    public const string FRAGMENT = 'fragment' ;

    /**
     * `form_post` — Parameters returned via an auto-submitting HTML form using HTTP POST.
     */
    public const string FORM_POST = 'form_post' ;

    /**
     * `web_message` — Parameters returned via HTML5 Web Messaging, for SPA silent auth (draft).
     */
    public const string WEB_MESSAGE = 'web_message' ;

    // -------------------------------------------------------------------------
    // JARM — JWT Secured Authorization Response Mode
    // -------------------------------------------------------------------------

    /**
     * `jwt` — Response wrapped in a JWT, using the default mode for the response type.
     */
    public const string JWT = 'jwt' ;

    /**
     * `query.jwt` — JWT-wrapped response returned in the query component.
     */
    public const string QUERY_JWT = 'query.jwt' ;

    /**
     * `fragment.jwt` — JWT-wrapped response returned in the fragment.
     */
    public const string FRAGMENT_JWT = 'fragment.jwt' ;

    /**
     * `form_post.jwt` — JWT-wrapped response returned via form POST.
     */
    public const string FORM_POST_JWT = 'form_post.jwt' ;
}
