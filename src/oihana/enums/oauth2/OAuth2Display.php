<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard OpenID Connect `display` parameter values.
 *
 * Values used with the `display` parameter (see
 * {@see OAuth2Parameter}) as a hint to the authorization server about
 * how to render the authentication and consent UI to the End-User.
 *
 * Example:
 * ```php
 * $params[ 'display' ] = OAuth2Display::POPUP ;
 * ```
 *
 * References:
 * - OIDC Core 1.0 §3.1.2.1
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2Display
{
    use ConstantsTrait ;

    /**
     * `page` — Default. Full-page rendering in the User Agent window.
     */
    public const string PAGE = 'page' ;

    /**
     * `popup` — Render the UI in a popup User Agent window, sized
     * appropriately for a login-focused dialog (recommendation: 450 x 500 px).
     */
    public const string POPUP = 'popup' ;

    /**
     * `touch` — Render the UI with a device-appropriate touch interface
     * (smartphones, tablets).
     */
    public const string TOUCH = 'touch' ;

    /**
     * `wap` — Render the UI with a feature-phone "WAP"-style interface.
     */
    public const string WAP = 'wap' ;
}
