<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

class OAuthParametersTest extends TestCase
{
    public function testConstantsAreDefined(): void
    {
        $this->assertSame('oauth_consumer_key', OAuthParameters::OAUTH_CONSUMER_KEY);
        $this->assertSame('oauth_token', OAuthParameters::OAUTH_TOKEN);
        $this->assertSame('oauth_signature', OAuthParameters::OAUTH_SIGNATURE);
        $this->assertSame('oauth_signature_method', OAuthParameters::OAUTH_SIGNATURE_METHOD);
        $this->assertSame('oauth_timestamp', OAuthParameters::OAUTH_TIMESTAMP);
        $this->assertSame('oauth_nonce', OAuthParameters::OAUTH_NONCE);
        $this->assertSame('oauth_version', OAuthParameters::OAUTH_VERSION);
    }
}
