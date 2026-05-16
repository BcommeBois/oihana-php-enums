<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard fields published in the
 * `/.well-known/openid-configuration` discovery document.
 *
 * Covers both the original OIDC Discovery 1.0 metadata and the
 * extensions defined by RFC 8414 (OAuth 2.0 Authorization Server
 * Metadata), RFC 7636 (PKCE), RFC 8628 (Device Flow), RFC 9101
 * (JAR), RFC 9126 (PAR), RFC 9449 (DPoP), OIDC RP-Initiated Logout,
 * OIDC Front/Back-Channel Logout, and OIDC Session Management.
 *
 * These constants are used when parsing or building the provider
 * configuration JSON returned by an OpenID Provider or OAuth 2.0
 * Authorization Server.
 *
 * Example:
 * ```php
 * $config = json_decode( file_get_contents( $issuer . '/.well-known/openid-configuration' ) , true ) ;
 *
 * $tokenEndpoint = $config[ OidcDiscoveryField::TOKEN_ENDPOINT ] ;
 * $jwksUri       = $config[ OidcDiscoveryField::JWKS_URI       ] ;
 * ```
 *
 * References:
 * - OpenID Connect Discovery 1.0 §3
 * - RFC 8414  (OAuth 2.0 Authorization Server Metadata)
 * - RFC 7636  (PKCE)
 * - RFC 8628  (Device Authorization Grant)
 * - RFC 9101  (JWT-Secured Authorization Request, JAR)
 * - RFC 9126  (Pushed Authorization Requests, PAR)
 * - RFC 9449  (DPoP)
 * - OIDC RP-Initiated Logout 1.0
 * - OIDC Front-Channel / Back-Channel Logout 1.0
 * - OIDC Session Management 1.0
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OidcDiscoveryField
{
    use ConstantsTrait ;

    // -------------------------------------------------------------------------
    // Core endpoints and identification
    // -------------------------------------------------------------------------

    /** `issuer` — URL using the https scheme that uniquely identifies the OP. */
    public const string ISSUER = 'issuer' ;

    /** `authorization_endpoint` — URL of the authorization endpoint. */
    public const string AUTHORIZATION_ENDPOINT = 'authorization_endpoint' ;

    /** `token_endpoint` — URL of the token endpoint. */
    public const string TOKEN_ENDPOINT = 'token_endpoint' ;

    /** `userinfo_endpoint` — URL of the UserInfo endpoint. */
    public const string USERINFO_ENDPOINT = 'userinfo_endpoint' ;

    /** `jwks_uri` — URL of the JWK Set document containing the OP's signing keys. */
    public const string JWKS_URI = 'jwks_uri' ;

    /** `registration_endpoint` — URL of the dynamic client registration endpoint. */
    public const string REGISTRATION_ENDPOINT = 'registration_endpoint' ;

    /** `introspection_endpoint` — URL of the OAuth 2.0 introspection endpoint (RFC 8414). */
    public const string INTROSPECTION_ENDPOINT = 'introspection_endpoint' ;

    /** `revocation_endpoint` — URL of the OAuth 2.0 revocation endpoint (RFC 8414). */
    public const string REVOCATION_ENDPOINT = 'revocation_endpoint' ;

    /** `device_authorization_endpoint` — URL of the Device Authorization endpoint (RFC 8628). */
    public const string DEVICE_AUTHORIZATION_ENDPOINT = 'device_authorization_endpoint' ;

    /** `pushed_authorization_request_endpoint` — URL of the PAR endpoint (RFC 9126). */
    public const string PUSHED_AUTHORIZATION_REQUEST_ENDPOINT = 'pushed_authorization_request_endpoint' ;

    /** `backchannel_authentication_endpoint` — URL of the CIBA backchannel authentication endpoint. */
    public const string BACKCHANNEL_AUTHENTICATION_ENDPOINT = 'backchannel_authentication_endpoint' ;

    /** `end_session_endpoint` — URL of the RP-Initiated Logout endpoint. */
    public const string END_SESSION_ENDPOINT = 'end_session_endpoint' ;

    /** `check_session_iframe` — URL of the Session Management iframe. */
    public const string CHECK_SESSION_IFRAME = 'check_session_iframe' ;

    // -------------------------------------------------------------------------
    // Capabilities — supported values
    // -------------------------------------------------------------------------

    /** `scopes_supported` — list of OAuth 2.0 scope values supported. */
    public const string SCOPES_SUPPORTED = 'scopes_supported' ;

    /** `response_types_supported` — list of `response_type` values supported. */
    public const string RESPONSE_TYPES_SUPPORTED = 'response_types_supported' ;

    /** `response_modes_supported` — list of `response_mode` values supported. */
    public const string RESPONSE_MODES_SUPPORTED = 'response_modes_supported' ;

    /** `grant_types_supported` — list of `grant_type` values supported. */
    public const string GRANT_TYPES_SUPPORTED = 'grant_types_supported' ;

    /** `acr_values_supported` — list of ACR values supported by the OP. */
    public const string ACR_VALUES_SUPPORTED = 'acr_values_supported' ;

    /** `subject_types_supported` — list of Subject Identifier types: `public`, `pairwise`. */
    public const string SUBJECT_TYPES_SUPPORTED = 'subject_types_supported' ;

    /** `display_values_supported` — list of `display` parameter values supported. */
    public const string DISPLAY_VALUES_SUPPORTED = 'display_values_supported' ;

    /** `claim_types_supported` — list of Claim Types supported: `normal`, `aggregated`, `distributed`. */
    public const string CLAIM_TYPES_SUPPORTED = 'claim_types_supported' ;

    /** `claims_supported` — list of Claim Names supported. */
    public const string CLAIMS_SUPPORTED = 'claims_supported' ;

    /** `claims_locales_supported` — list of BCP47 language tags for claims values. */
    public const string CLAIMS_LOCALES_SUPPORTED = 'claims_locales_supported' ;

    /** `ui_locales_supported` — list of BCP47 language tags for the UI. */
    public const string UI_LOCALES_SUPPORTED = 'ui_locales_supported' ;

    /** `code_challenge_methods_supported` — PKCE methods supported (RFC 7636). */
    public const string CODE_CHALLENGE_METHODS_SUPPORTED = 'code_challenge_methods_supported' ;

    // -------------------------------------------------------------------------
    // Signing / encryption algorithms
    // -------------------------------------------------------------------------

    /** `id_token_signing_alg_values_supported` — JWS algs for the ID Token. */
    public const string ID_TOKEN_SIGNING_ALG_VALUES_SUPPORTED = 'id_token_signing_alg_values_supported' ;

    /** `id_token_encryption_alg_values_supported` — JWE alg values for the ID Token. */
    public const string ID_TOKEN_ENCRYPTION_ALG_VALUES_SUPPORTED = 'id_token_encryption_alg_values_supported' ;

    /** `id_token_encryption_enc_values_supported` — JWE enc values for the ID Token. */
    public const string ID_TOKEN_ENCRYPTION_ENC_VALUES_SUPPORTED = 'id_token_encryption_enc_values_supported' ;

    /** `userinfo_signing_alg_values_supported` — JWS algs for the UserInfo response. */
    public const string USERINFO_SIGNING_ALG_VALUES_SUPPORTED = 'userinfo_signing_alg_values_supported' ;

    /** `userinfo_encryption_alg_values_supported` — JWE alg values for the UserInfo response. */
    public const string USERINFO_ENCRYPTION_ALG_VALUES_SUPPORTED = 'userinfo_encryption_alg_values_supported' ;

    /** `userinfo_encryption_enc_values_supported` — JWE enc values for the UserInfo response. */
    public const string USERINFO_ENCRYPTION_ENC_VALUES_SUPPORTED = 'userinfo_encryption_enc_values_supported' ;

    /** `request_object_signing_alg_values_supported` — JWS algs for Request Objects. */
    public const string REQUEST_OBJECT_SIGNING_ALG_VALUES_SUPPORTED = 'request_object_signing_alg_values_supported' ;

    /** `request_object_encryption_alg_values_supported` — JWE alg values for Request Objects. */
    public const string REQUEST_OBJECT_ENCRYPTION_ALG_VALUES_SUPPORTED = 'request_object_encryption_alg_values_supported' ;

    /** `request_object_encryption_enc_values_supported` — JWE enc values for Request Objects. */
    public const string REQUEST_OBJECT_ENCRYPTION_ENC_VALUES_SUPPORTED = 'request_object_encryption_enc_values_supported' ;

    /** `dpop_signing_alg_values_supported` — JWS algs supported for DPoP proof JWTs (RFC 9449). */
    public const string DPOP_SIGNING_ALG_VALUES_SUPPORTED = 'dpop_signing_alg_values_supported' ;

    // -------------------------------------------------------------------------
    // Endpoint authentication
    // -------------------------------------------------------------------------

    /** `token_endpoint_auth_methods_supported` — Client auth methods at the token endpoint. */
    public const string TOKEN_ENDPOINT_AUTH_METHODS_SUPPORTED = 'token_endpoint_auth_methods_supported' ;

    /** `token_endpoint_auth_signing_alg_values_supported` — JWS algs for client assertions. */
    public const string TOKEN_ENDPOINT_AUTH_SIGNING_ALG_VALUES_SUPPORTED = 'token_endpoint_auth_signing_alg_values_supported' ;

    /** `revocation_endpoint_auth_methods_supported` — Client auth methods at the revocation endpoint. */
    public const string REVOCATION_ENDPOINT_AUTH_METHODS_SUPPORTED = 'revocation_endpoint_auth_methods_supported' ;

    /** `revocation_endpoint_auth_signing_alg_values_supported` — JWS algs for client assertions at the revocation endpoint. */
    public const string REVOCATION_ENDPOINT_AUTH_SIGNING_ALG_VALUES_SUPPORTED = 'revocation_endpoint_auth_signing_alg_values_supported' ;

    /** `introspection_endpoint_auth_methods_supported` — Client auth methods at the introspection endpoint. */
    public const string INTROSPECTION_ENDPOINT_AUTH_METHODS_SUPPORTED = 'introspection_endpoint_auth_methods_supported' ;

    /** `introspection_endpoint_auth_signing_alg_values_supported` — JWS algs for client assertions at the introspection endpoint. */
    public const string INTROSPECTION_ENDPOINT_AUTH_SIGNING_ALG_VALUES_SUPPORTED = 'introspection_endpoint_auth_signing_alg_values_supported' ;

    // -------------------------------------------------------------------------
    // Boolean capabilities and policy URIs
    // -------------------------------------------------------------------------

    /** `claims_parameter_supported` — Whether the OP supports the `claims` parameter. */
    public const string CLAIMS_PARAMETER_SUPPORTED = 'claims_parameter_supported' ;

    /** `request_parameter_supported` — Whether the OP supports the `request` parameter. */
    public const string REQUEST_PARAMETER_SUPPORTED = 'request_parameter_supported' ;

    /** `request_uri_parameter_supported` — Whether the OP supports the `request_uri` parameter. */
    public const string REQUEST_URI_PARAMETER_SUPPORTED = 'request_uri_parameter_supported' ;

    /** `require_request_uri_registration` — Whether `request_uri` values must be pre-registered. */
    public const string REQUIRE_REQUEST_URI_REGISTRATION = 'require_request_uri_registration' ;

    /** `require_pushed_authorization_requests` — Whether PAR is required (RFC 9126). */
    public const string REQUIRE_PUSHED_AUTHORIZATION_REQUESTS = 'require_pushed_authorization_requests' ;

    /** `tls_client_certificate_bound_access_tokens` — Whether mTLS-bound tokens are supported (RFC 8705). */
    public const string TLS_CLIENT_CERTIFICATE_BOUND_ACCESS_TOKENS = 'tls_client_certificate_bound_access_tokens' ;

    /** `frontchannel_logout_supported` — Whether front-channel logout is supported. */
    public const string FRONTCHANNEL_LOGOUT_SUPPORTED = 'frontchannel_logout_supported' ;

    /** `frontchannel_logout_session_supported` — Whether `sid` is included in the front-channel logout request. */
    public const string FRONTCHANNEL_LOGOUT_SESSION_SUPPORTED = 'frontchannel_logout_session_supported' ;

    /** `backchannel_logout_supported` — Whether back-channel logout is supported. */
    public const string BACKCHANNEL_LOGOUT_SUPPORTED = 'backchannel_logout_supported' ;

    /** `backchannel_logout_session_supported` — Whether `sid` is included in the back-channel logout token. */
    public const string BACKCHANNEL_LOGOUT_SESSION_SUPPORTED = 'backchannel_logout_session_supported' ;

    /** `service_documentation` — URL of human-readable documentation for developers. */
    public const string SERVICE_DOCUMENTATION = 'service_documentation' ;

    /** `op_policy_uri` — URL describing the OP's policy on usage of profile data. */
    public const string OP_POLICY_URI = 'op_policy_uri' ;

    /** `op_tos_uri` — URL describing the OP's terms of service. */
    public const string OP_TOS_URI = 'op_tos_uri' ;
}
