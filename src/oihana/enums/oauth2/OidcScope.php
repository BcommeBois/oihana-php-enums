<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard OpenID Connect scope values.
 *
 * Values used with the {@see OAuth2Parameter::SCOPE} parameter to
 * request authentication and a subset of the standard OIDC claims.
 *
 * The {@see self::OPENID} scope MUST be present for any OIDC request
 * (Core §3.1.2.1). The other scopes are optional and trigger the
 * inclusion of the matching profile claims in the UserInfo response
 * and/or the ID Token (Core §5.4).
 *
 * Example:
 * ```php
 * $scope = implode( ' ' ,
 * [
 *     OidcScope::OPENID ,
 *     OidcScope::PROFILE ,
 *     OidcScope::EMAIL ,
 *     OidcScope::OFFLINE_ACCESS ,
 * ]) ;
 * ```
 *
 * References:
 * - OIDC Core 1.0 §5.4 (Requesting Claims using Scope Values)
 * - OIDC Core 1.0 §11  (Offline Access)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OidcScope
{
    use ConstantsTrait ;

    /**
     * `openid` — Mandatory scope identifying the request as an OIDC
     * authentication request. Without it, the request is a plain
     * OAuth 2.0 authorization request.
     */
    public const string OPENID = 'openid' ;

    /**
     * `profile` — Requests access to the End-User's default profile
     * claims: `name`, `family_name`, `given_name`, `middle_name`,
     * `nickname`, `preferred_username`, `profile`, `picture`,
     * `website`, `gender`, `birthdate`, `zoneinfo`, `locale`, and
     * `updated_at`.
     */
    public const string PROFILE = 'profile' ;

    /**
     * `email` — Requests access to the `email` and `email_verified`
     * claims.
     */
    public const string EMAIL = 'email' ;

    /**
     * `address` — Requests access to the `address` claim.
     */
    public const string ADDRESS = 'address' ;

    /**
     * `phone` — Requests access to the `phone_number` and
     * `phone_number_verified` claims.
     */
    public const string PHONE = 'phone' ;

    /**
     * `offline_access` — Requests that a refresh token be issued so
     * the client can obtain new access tokens without further user
     * interaction (OIDC Core §11).
     *
     * Usually requires the use of `prompt=consent` so the user
     * explicitly approves long-lived access.
     */
    public const string OFFLINE_ACCESS = 'offline_access' ;
}
