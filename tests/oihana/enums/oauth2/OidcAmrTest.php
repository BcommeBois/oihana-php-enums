<?php

namespace oihana\enums\oauth2;

use PHPUnit\Framework\TestCase;

final class OidcAmrTest extends TestCase
{
    public function testBiometricValues(): void
    {
        $this->assertSame( 'face'   , OidcAmr::FACE   ) ;
        $this->assertSame( 'fpt'    , OidcAmr::FPT    ) ;
        $this->assertSame( 'iris'   , OidcAmr::IRIS   ) ;
        $this->assertSame( 'retina' , OidcAmr::RETINA ) ;
        $this->assertSame( 'vbm'    , OidcAmr::VBM    ) ;
    }

    public function testKnowledgeAndPossessionValues(): void
    {
        $this->assertSame( 'kba' , OidcAmr::KBA ) ;
        $this->assertSame( 'pin' , OidcAmr::PIN ) ;
        $this->assertSame( 'pwd' , OidcAmr::PWD ) ;
        $this->assertSame( 'otp' , OidcAmr::OTP ) ;
        $this->assertSame( 'pop' , OidcAmr::POP ) ;
        $this->assertSame( 'hwk' , OidcAmr::HWK ) ;
        $this->assertSame( 'swk' , OidcAmr::SWK ) ;
        $this->assertSame( 'sc'  , OidcAmr::SC  ) ;
    }

    public function testChannelAndContextValues(): void
    {
        $this->assertSame( 'sms'  , OidcAmr::SMS  ) ;
        $this->assertSame( 'tel'  , OidcAmr::TEL  ) ;
        $this->assertSame( 'geo'  , OidcAmr::GEO  ) ;
        $this->assertSame( 'mca'  , OidcAmr::MCA  ) ;
        $this->assertSame( 'mfa'  , OidcAmr::MFA  ) ;
        $this->assertSame( 'rba'  , OidcAmr::RBA  ) ;
        $this->assertSame( 'user' , OidcAmr::USER ) ;
        $this->assertSame( 'wia'  , OidcAmr::WIA  ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( OidcAmr::includes( 'mfa'     ) ) ;
        $this->assertTrue ( OidcAmr::includes( 'face'    ) ) ;
        $this->assertFalse( OidcAmr::includes( 'MFA'     ) ) ;
        $this->assertFalse( OidcAmr::includes( 'unknown' ) ) ;
    }
}
