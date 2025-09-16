<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

class OAuthSignatureTest extends TestCase
{
    public function testConstantsAreDefined(): void
    {
        $this->assertSame('HMAC-SHA1', OAuthSignatureMethod::HMAC_SHA1);
        $this->assertSame('HMAC-SHA256', OAuthSignatureMethod::HMAC_SHA256);
        $this->assertSame('PLAINTEXT', OAuthSignatureMethod::PLAINTEXT);
        $this->assertSame('RSA-SHA1', OAuthSignatureMethod::RSA_SHA1);
    }
}
