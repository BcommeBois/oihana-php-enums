<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 2.0 / OpenID Connect client metadata field names.
 *
 * These are the members of the JSON object sent to (and returned by) the
 * Dynamic Client Registration endpoint. Three layers are exposed here:
 *
 * 1. **Client metadata** — RFC 7591 §2 (the registration request).
 * 2. **Registration response / management** — RFC 7591 §3.2.1 and the client
 *    configuration endpoint of RFC 7592.
 * 3. **OpenID Connect** — additional metadata from OpenID Connect Dynamic
 *    Client Registration 1.0 and the OIDC logout specifications.
 *
 * This is the client-side counterpart of {@see OidcDiscoveryField}, which
 * describes the authorization server's own metadata.
 *
 * Example:
 * ```php
 * $registration =
 * [
 *     OAuth2ClientMetadata::CLIENT_NAME                => 'My App' ,
 *     OAuth2ClientMetadata::REDIRECT_URIS              => [ 'https://app.example/cb' ] ,
 *     OAuth2ClientMetadata::GRANT_TYPES                => [ OAuth2GrantType::AUTHORIZATION_CODE ] ,
 *     OAuth2ClientMetadata::RESPONSE_TYPES             => [ OAuth2ResponseType::CODE ] ,
 *     OAuth2ClientMetadata::TOKEN_ENDPOINT_AUTH_METHOD => OAuth2TokenEndpointAuthMethod::PRIVATE_KEY_JWT ,
 *     OAuth2ClientMetadata::SCOPE                      => 'openid profile email' ,
 *     OAuth2ClientMetadata::JWKS_URI                   => 'https://app.example/jwks.json' ,
 * ] ;
 * ```
 *
 * References:
 * - RFC 7591 (OAuth 2.0 Dynamic Client Registration Protocol)
 * - RFC 7592 (OAuth 2.0 Dynamic Client Registration Management Protocol)
 * - OpenID Connect Dynamic Client Registration 1.0
 * - OpenID Connect RP-Initiated Logout / Front-Channel / Back-Channel Logout 1.0
 * - IANA OAuth Dynamic Client Registration Metadata registry
 *
 * @see OidcDiscoveryField
 * @see OAuth2GrantType
 * @see OAuth2ResponseType
 * @see OAuth2TokenEndpointAuthMethod
 * @see OAuth2SubjectType
 * @see JwtAlgorithm
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OAuth2ClientMetadata
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Client metadata (RFC 7591 §2)
    // -------------------------------------------------------------------------

    /**
     * `redirect_uris` — Array of redirection URIs used by the client (RFC 7591 §2).
     */
    public const string REDIRECT_URIS = 'redirect_uris' ;

    /**
     * `token_endpoint_auth_method` — Client authentication method for the token
     * endpoint (RFC 7591 §2). See {@see OAuth2TokenEndpointAuthMethod}.
     */
    public const string TOKEN_ENDPOINT_AUTH_METHOD = 'token_endpoint_auth_method' ;

    /**
     * `grant_types` — Array of grant types the client may use (RFC 7591 §2).
     * See {@see OAuth2GrantType}.
     */
    public const string GRANT_TYPES = 'grant_types' ;

    /**
     * `response_types` — Array of response types the client may use (RFC 7591 §2).
     * See {@see OAuth2ResponseType}.
     */
    public const string RESPONSE_TYPES = 'response_types' ;

    /**
     * `client_name` — Human-readable name of the client (RFC 7591 §2).
     */
    public const string CLIENT_NAME = 'client_name' ;

    /**
     * `client_uri` — URL of the client's home page (RFC 7591 §2).
     */
    public const string CLIENT_URI = 'client_uri' ;

    /**
     * `logo_uri` — URL of the client's logo (RFC 7591 §2).
     */
    public const string LOGO_URI = 'logo_uri' ;

    /**
     * `scope` — Space-separated list of scopes the client may request (RFC 7591 §2).
     */
    public const string SCOPE = 'scope' ;

    /**
     * `contacts` — Array of e-mail addresses of people responsible for the client (RFC 7591 §2).
     */
    public const string CONTACTS = 'contacts' ;

    /**
     * `tos_uri` — URL of the client's terms of service (RFC 7591 §2).
     */
    public const string TOS_URI = 'tos_uri' ;

    /**
     * `policy_uri` — URL of the client's privacy policy (RFC 7591 §2).
     */
    public const string POLICY_URI = 'policy_uri' ;

    /**
     * `jwks_uri` — URL of the client's JSON Web Key Set document (RFC 7591 §2).
     */
    public const string JWKS_URI = 'jwks_uri' ;

    /**
     * `jwks` — Client's JSON Web Key Set by value (RFC 7591 §2). Mutually
     * exclusive with {@see self::JWKS_URI}.
     */
    public const string JWKS = 'jwks' ;

    /**
     * `software_id` — Unique identifier for the client software (RFC 7591 §2).
     */
    public const string SOFTWARE_ID = 'software_id' ;

    /**
     * `software_version` — Version of the client software (RFC 7591 §2).
     */
    public const string SOFTWARE_VERSION = 'software_version' ;

    /**
     * `software_statement` — Signed JWT asserting client metadata (RFC 7591 §2.3).
     */
    public const string SOFTWARE_STATEMENT = 'software_statement' ;

    // -------------------------------------------------------------------------
    // Registration response / management (RFC 7591 §3.2.1, RFC 7592)
    // -------------------------------------------------------------------------

    /**
     * `client_id` — Issued client identifier (RFC 7591 §3.2.1).
     */
    public const string CLIENT_ID = 'client_id' ;

    /**
     * `client_secret` — Issued client secret, when applicable (RFC 7591 §3.2.1).
     */
    public const string CLIENT_SECRET = 'client_secret' ;

    /**
     * `client_id_issued_at` — Time the `client_id` was issued, as a NumericDate (RFC 7591 §3.2.1).
     */
    public const string CLIENT_ID_ISSUED_AT = 'client_id_issued_at' ;

    /**
     * `client_secret_expires_at` — Expiration time of the `client_secret`, or `0` if it
     * never expires, as a NumericDate (RFC 7591 §3.2.1).
     */
    public const string CLIENT_SECRET_EXPIRES_AT = 'client_secret_expires_at' ;

    /**
     * `registration_access_token` — Bearer token to access the client configuration
     * endpoint (RFC 7592 §3).
     */
    public const string REGISTRATION_ACCESS_TOKEN = 'registration_access_token' ;

    /**
     * `registration_client_uri` — URL of the client configuration endpoint (RFC 7592 §3).
     */
    public const string REGISTRATION_CLIENT_URI = 'registration_client_uri' ;

    // -------------------------------------------------------------------------
    // OpenID Connect Dynamic Client Registration 1.0 (§2)
    // -------------------------------------------------------------------------

    /**
     * `application_type` — Kind of the application, `web` or `native` (OIDC DCR §2).
     */
    public const string APPLICATION_TYPE = 'application_type' ;

    /**
     * `sector_identifier_uri` — URL providing the redirect URIs used to compute a
     * pairwise `sub` value (OIDC DCR §2).
     */
    public const string SECTOR_IDENTIFIER_URI = 'sector_identifier_uri' ;

    /**
     * `subject_type` — Requested subject identifier type (OIDC DCR §2).
     * See {@see OAuth2SubjectType}.
     */
    public const string SUBJECT_TYPE = 'subject_type' ;

    /**
     * `id_token_signed_response_alg` — JWS `alg` for signing the ID Token (OIDC DCR §2).
     * See {@see JwtAlgorithm}.
     */
    public const string ID_TOKEN_SIGNED_RESPONSE_ALG = 'id_token_signed_response_alg' ;

    /**
     * `id_token_encrypted_response_alg` — JWE `alg` for encrypting the ID Token (OIDC DCR §2).
     */
    public const string ID_TOKEN_ENCRYPTED_RESPONSE_ALG = 'id_token_encrypted_response_alg' ;

    /**
     * `id_token_encrypted_response_enc` — JWE `enc` for encrypting the ID Token (OIDC DCR §2).
     */
    public const string ID_TOKEN_ENCRYPTED_RESPONSE_ENC = 'id_token_encrypted_response_enc' ;

    /**
     * `userinfo_signed_response_alg` — JWS `alg` for signing UserInfo responses (OIDC DCR §2).
     */
    public const string USERINFO_SIGNED_RESPONSE_ALG = 'userinfo_signed_response_alg' ;

    /**
     * `userinfo_encrypted_response_alg` — JWE `alg` for encrypting UserInfo responses (OIDC DCR §2).
     */
    public const string USERINFO_ENCRYPTED_RESPONSE_ALG = 'userinfo_encrypted_response_alg' ;

    /**
     * `userinfo_encrypted_response_enc` — JWE `enc` for encrypting UserInfo responses (OIDC DCR §2).
     */
    public const string USERINFO_ENCRYPTED_RESPONSE_ENC = 'userinfo_encrypted_response_enc' ;

    /**
     * `request_object_signing_alg` — JWS `alg` for signing Request Objects (OIDC DCR §2).
     */
    public const string REQUEST_OBJECT_SIGNING_ALG = 'request_object_signing_alg' ;

    /**
     * `request_object_encryption_alg` — JWE `alg` for encrypting Request Objects (OIDC DCR §2).
     */
    public const string REQUEST_OBJECT_ENCRYPTION_ALG = 'request_object_encryption_alg' ;

    /**
     * `request_object_encryption_enc` — JWE `enc` for encrypting Request Objects (OIDC DCR §2).
     */
    public const string REQUEST_OBJECT_ENCRYPTION_ENC = 'request_object_encryption_enc' ;

    /**
     * `token_endpoint_auth_signing_alg` — JWS `alg` for client assertions at the token
     * endpoint (OIDC DCR §2).
     */
    public const string TOKEN_ENDPOINT_AUTH_SIGNING_ALG = 'token_endpoint_auth_signing_alg' ;

    /**
     * `default_max_age` — Default Maximum Authentication Age, in seconds (OIDC DCR §2).
     */
    public const string DEFAULT_MAX_AGE = 'default_max_age' ;

    /**
     * `require_auth_time` — Whether the `auth_time` claim is always required (OIDC DCR §2).
     */
    public const string REQUIRE_AUTH_TIME = 'require_auth_time' ;

    /**
     * `default_acr_values` — Default requested Authentication Context Class Reference
     * values (OIDC DCR §2).
     */
    public const string DEFAULT_ACR_VALUES = 'default_acr_values' ;

    /**
     * `initiate_login_uri` — URI a third party can use to initiate login at the client
     * (OIDC DCR §2).
     */
    public const string INITIATE_LOGIN_URI = 'initiate_login_uri' ;

    /**
     * `request_uris` — Array of pre-registered `request_uri` values (OIDC DCR §2).
     */
    public const string REQUEST_URIS = 'request_uris' ;

    // -------------------------------------------------------------------------
    // OpenID Connect logout metadata
    // -------------------------------------------------------------------------

    /**
     * `post_logout_redirect_uris` — Array of redirect URIs allowed after logout
     * (OIDC RP-Initiated Logout 1.0).
     */
    public const string POST_LOGOUT_REDIRECT_URIS = 'post_logout_redirect_uris' ;

    /**
     * `frontchannel_logout_uri` — URI invoked for front-channel logout
     * (OIDC Front-Channel Logout 1.0).
     */
    public const string FRONTCHANNEL_LOGOUT_URI = 'frontchannel_logout_uri' ;

    /**
     * `frontchannel_logout_session_required` — Whether a `sid` is required at the
     * front-channel logout URI (OIDC Front-Channel Logout 1.0).
     */
    public const string FRONTCHANNEL_LOGOUT_SESSION_REQUIRED = 'frontchannel_logout_session_required' ;

    /**
     * `backchannel_logout_uri` — URI invoked for back-channel logout
     * (OIDC Back-Channel Logout 1.0).
     */
    public const string BACKCHANNEL_LOGOUT_URI = 'backchannel_logout_uri' ;

    /**
     * `backchannel_logout_session_required` — Whether a `sid` is required in the
     * Logout Token (OIDC Back-Channel Logout 1.0).
     */
    public const string BACKCHANNEL_LOGOUT_SESSION_REQUIRED = 'backchannel_logout_session_required' ;
}
