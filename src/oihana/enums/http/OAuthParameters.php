<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Standard OAuth 1.0a parameter keys.
 *
 * Provides type-safe constants for use in generating OAuth headers and signatures.
 */
class OAuthParameters
{
    use ConstantsTrait ;

    /**
     * The consumer key.
     */
    public const string OAUTH_CONSUMER_KEY = 'oauth_consumer_key';

    /**
     * The access token.
     */
    public const string OAUTH_TOKEN  = 'oauth_token';

    /**
     * The generated signature.
     */
    public const string OAUTH_SIGNATURE = 'oauth_signature';

    /**
     * The signature method (HMAC-SHA1, HMAC-SHA256, PLAINTEXT, RSA-SHA1).
     */
    public const string OAUTH_SIGNATURE_METHOD = 'oauth_signature_method';

    /**
     * The timestamp of the request.
     */
    public const string OAUTH_TIMESTAMP = 'oauth_timestamp';

    /**
     * A unique nonce for each request.
     */
    public const string OAUTH_NONCE = 'oauth_nonce';

    /**
     * The OAuth version (usually "1.0").
     */
    public const string OAUTH_VERSION = 'oauth_version';
}