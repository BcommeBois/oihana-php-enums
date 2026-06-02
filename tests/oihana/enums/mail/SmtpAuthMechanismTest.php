<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\SmtpAuthMechanism;

class SmtpAuthMechanismTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 'CRAM-MD5'      , SmtpAuthMechanism::CRAM_MD5      ) ;
        $this->assertSame( 'LOGIN'         , SmtpAuthMechanism::LOGIN         ) ;
        $this->assertSame( 'PLAIN'         , SmtpAuthMechanism::PLAIN         ) ;
        $this->assertSame( 'SCRAM-SHA-256' , SmtpAuthMechanism::SCRAM_SHA_256 ) ;
        $this->assertSame( 'XOAUTH2'       , SmtpAuthMechanism::XOAUTH2       ) ;
    }

    public function testIncludes() :void
    {
        $this->assertTrue ( SmtpAuthMechanism::includes( 'PLAIN'  ) ) ;
        $this->assertFalse( SmtpAuthMechanism::includes( 'plain'  ) ) ; // exact, case-sensitive
        $this->assertFalse( SmtpAuthMechanism::includes( 'OTP'    ) ) ;
    }

    public function testRequiresTls() :void
    {
        $this->assertTrue ( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::PLAIN       ) ) ;
        $this->assertTrue ( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::LOGIN       ) ) ;
        $this->assertTrue ( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::XOAUTH2     ) ) ;
        $this->assertTrue ( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::OAUTHBEARER ) ) ;

        $this->assertFalse( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::CRAM_MD5      ) ) ;
        $this->assertFalse( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::SCRAM_SHA_256 ) ) ;
        $this->assertFalse( SmtpAuthMechanism::requiresTls( SmtpAuthMechanism::GSSAPI        ) ) ;
    }

    public function testRequiresTlsIsCaseInsensitive() :void
    {
        $this->assertTrue ( SmtpAuthMechanism::requiresTls( 'plain' ) ) ;
        $this->assertFalse( SmtpAuthMechanism::requiresTls( 'cram-md5' ) ) ;
    }
}
