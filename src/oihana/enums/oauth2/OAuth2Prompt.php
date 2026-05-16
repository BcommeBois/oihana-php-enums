<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard OpenID Connect `prompt` parameter values.
 *
 * Values used with the {@see OAuth2Parameter::PROMPT} parameter to
 * control whether the authorization server prompts the End-User for
 * re-authentication or consent.
 *
 * Multiple values may be combined as a space-separated list, with the
 * exception of {@see self::NONE} which MUST appear alone.
 *
 * Example:
 * ```php
 * $params[ OAuth2Parameter::PROMPT ] = OAuth2Prompt::CONSENT ;
 * ```
 *
 * References:
 * - OIDC Core 1.0 §3.1.2.1
 * - OpenID Connect Initiating User Registration via OpenID Connect 1.0 (`create`)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2Prompt
{
    use ConstantsTrait ;

    /**
     * `none` — The authorization server MUST NOT display any
     * authentication or consent user interface pages. If the End-User
     * is not already authenticated or has not pre-configured consent,
     * an error such as {@see OAuth2Error::LOGIN_REQUIRED} or
     * {@see OAuth2Error::CONSENT_REQUIRED} is returned.
     *
     * MUST be used as the sole value when present.
     */
    public const string NONE = 'none' ;

    /**
     * `login` — The authorization server SHOULD prompt the End-User
     * for re-authentication, even if an active session exists.
     */
    public const string LOGIN = 'login' ;

    /**
     * `consent` — The authorization server SHOULD prompt the End-User
     * for consent before returning information to the client.
     *
     * Required by some providers in conjunction with `offline_access`
     * to issue a refresh token.
     */
    public const string CONSENT = 'consent' ;

    /**
     * `select_account` — The authorization server SHOULD prompt the
     * End-User to select a user account, enabling them to choose
     * between multiple sessions.
     */
    public const string SELECT_ACCOUNT = 'select_account' ;

    /**
     * `create` — The authorization server SHOULD direct the End-User
     * to a sign-up flow rather than a sign-in flow.
     *
     * Defined by "OpenID Connect Initiating User Registration via
     * OpenID Connect 1.0".
     */
    public const string CREATE = 'create' ;
}
