<?php

namespace oihana\enums\oauth2;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of standard OpenID Connect Authentication Method
 * Reference (AMR) values (RFC 8176).
 *
 * Values used inside the `amr` array claim of an ID Token (see
 * {@see \oihana\enums\jwt\JwtClaim::AMR}) to indicate which
 * authentication methods were used by the End-User during
 * authentication.
 *
 * Example:
 * ```php
 * $usedMfa = in_array( OidcAmr::MFA , $idToken[ JwtClaim::AMR ] ?? [] , true ) ;
 * ```
 *
 * References:
 * - RFC 8176 (Authentication Method Reference Values)
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class OidcAmr
{
    use ConstantsTrait ;

    /** `face` — Biometric authentication using facial recognition. */
    public const string FACE = 'face' ;

    /** `fpt` — Biometric authentication using a fingerprint. */
    public const string FPT = 'fpt' ;

    /** `geo` — Use of geolocation information. */
    public const string GEO = 'geo' ;

    /** `hwk` — Proof-of-possession of a hardware-secured key. */
    public const string HWK = 'hwk' ;

    /** `iris` — Biometric authentication using an iris scan. */
    public const string IRIS = 'iris' ;

    /**
     * `kba` — Knowledge-based authentication (e.g. answering personal
     * security questions).
     */
    public const string KBA = 'kba' ;

    /** `mca` — Multiple-channel authentication. */
    public const string MCA = 'mca' ;

    /**
     * `mfa` — Multiple-factor authentication. Presence of this value
     * implies that more than one of the listed methods was used.
     */
    public const string MFA = 'mfa' ;

    /** `otp` — One-time password (HOTP/TOTP). */
    public const string OTP = 'otp' ;

    /** `pin` — Personal identification number. */
    public const string PIN = 'pin' ;

    /** `pop` — Proof-of-possession of a key. */
    public const string POP = 'pop' ;

    /** `pwd` — Password-based authentication. */
    public const string PWD = 'pwd' ;

    /** `rba` — Risk-based authentication. */
    public const string RBA = 'rba' ;

    /** `retina` — Biometric authentication using a retina scan. */
    public const string RETINA = 'retina' ;

    /** `sc` — Smart card authentication. */
    public const string SC = 'sc' ;

    /** `sms` — Confirmation by SMS reception. */
    public const string SMS = 'sms' ;

    /** `swk` — Proof-of-possession of a software-secured key. */
    public const string SWK = 'swk' ;

    /** `tel` — Confirmation by a telephone call. */
    public const string TEL = 'tel' ;

    /** `user` — User presence test. */
    public const string USER = 'user' ;

    /** `vbm` — Biometric authentication using a voiceprint. */
    public const string VBM = 'vbm' ;

    /** `wia` — Windows Integrated Authentication. */
    public const string WIA = 'wia' ;
}
