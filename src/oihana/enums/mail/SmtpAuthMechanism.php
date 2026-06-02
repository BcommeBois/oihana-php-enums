<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * SMTP SASL authentication mechanisms (RFC 4954 and the SASL registry).
 *
 * These are the tokens advertised after `250-AUTH` in the EHLO response and
 * passed to the `AUTH` command, e.g. `AUTH LOGIN`, `AUTH XOAUTH2`.
 *
 * ```php
 * SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::PLAIN ) ; // true
 * SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::CRAM_MD5 ) ; // false
 * ```
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
class SmtpAuthMechanism
{
    use ConstantsTrait ;

    /**
     * `CRAM-MD5` — Challenge-response HMAC-MD5; the password is never sent (RFC 2195).
     */
    public const string CRAM_MD5 = 'CRAM-MD5' ;

    /**
     * `DIGEST-MD5` — Challenge-response digest authentication (RFC 2831, deprecated).
     */
    public const string DIGEST_MD5 = 'DIGEST-MD5' ;

    /**
     * `EXTERNAL` — Authentication derived from an external channel, e.g. a TLS client certificate (RFC 4422).
     */
    public const string EXTERNAL = 'EXTERNAL' ;

    /**
     * `GSSAPI` — Kerberos v5 / GSS-API authentication (RFC 4752).
     */
    public const string GSSAPI = 'GSSAPI' ;

    /**
     * `LOGIN` — Base64 username/password exchange; credentials sent in the clear.
     */
    public const string LOGIN = 'LOGIN' ;

    /**
     * `NTLM` — Microsoft NTLM / SPNEGO authentication.
     */
    public const string NTLM = 'NTLM' ;

    /**
     * `OAUTHBEARER` — OAuth 2.0 bearer-token authentication (RFC 7628).
     */
    public const string OAUTHBEARER = 'OAUTHBEARER' ;

    /**
     * `PLAIN` — Base64 authzid/authcid/password; credentials sent in the clear (RFC 4616).
     */
    public const string PLAIN = 'PLAIN' ;

    /**
     * `SCRAM-SHA-1` — Salted challenge-response (RFC 5802).
     */
    public const string SCRAM_SHA_1 = 'SCRAM-SHA-1' ;

    /**
     * `SCRAM-SHA-256` — Salted challenge-response with SHA-256 (RFC 7677).
     */
    public const string SCRAM_SHA_256 = 'SCRAM-SHA-256' ;

    /**
     * `XOAUTH2` — Google/Microsoft OAuth 2.0 bearer-token mechanism (de-facto).
     */
    public const string XOAUTH2 = 'XOAUTH2' ;

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Whether the mechanism MUST run over TLS because it exposes a reusable
     * secret on the wire.
     *
     * Returns `true` for mechanisms that transmit the password in the clear
     * (`PLAIN`, `LOGIN`) or carry a bearer token (`XOAUTH2`, `OAUTHBEARER`).
     * Challenge-response mechanisms (`CRAM-MD5`, `DIGEST-MD5`, `SCRAM-*`,
     * `GSSAPI`, `NTLM`, `EXTERNAL`) do not expose the secret and return `false`
     * — though running them over TLS is still recommended.
     *
     * @param string $mechanism One of the class constants (case-insensitive).
     * @return bool
     */
    public static function requiresTls( string $mechanism ): bool
    {
        return match ( strtoupper( trim( $mechanism ) ) )
        {
            self::PLAIN , self::LOGIN , self::XOAUTH2 , self::OAUTHBEARER => true ,
            default                                                       => false ,
        } ;
    }
}
