<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of OAuth 1.0a signature methods.
 * Provides type-safe constants for `oauth_signature_method` values.
 */
class OAuthSignatureMethod
{
    use ConstantsTrait ;

    /**
     * HMAC using SHA-1 hash algorithm.
     */
    public const string HMAC_SHA1 = 'HMAC-SHA1';

    /**
     * HMAC using SHA-256 hash algorithm.
     */
    public const string HMAC_SHA256 = 'HMAC-SHA256';

    /**
     * Plaintext (insecure, only for trusted HTTPS connections).
     */
    public const string PLAINTEXT = 'PLAINTEXT';

    /**
     * RSA with SHA-1 (requires private/public key pair).
     */
    public const string RSA_SHA1 = 'RSA-SHA1';
}