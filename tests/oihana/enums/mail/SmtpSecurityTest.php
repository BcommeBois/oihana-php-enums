<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\SmtpScheme;
use oihana\enums\mail\SmtpSecurity;

class SmtpSecurityTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 'ssl'      , SmtpSecurity::SSL      ) ;
        $this->assertSame( 'smtps'    , SmtpSecurity::SMTPS    ) ;
        $this->assertSame( 'tls'      , SmtpSecurity::TLS      ) ;
        $this->assertSame( 'starttls' , SmtpSecurity::STARTTLS ) ;
        $this->assertSame( 'none'     , SmtpSecurity::NONE     ) ;
        $this->assertSame( 'plain'    , SmtpSecurity::PLAIN    ) ;
    }

    public function testEnumsExposesEveryAcceptedSpelling() :void
    {
        $this->assertSame
        (
            [ 'none' , 'plain' , 'smtps' , 'ssl' , 'starttls' , 'tls' ] ,
            SmtpSecurity::enums()
        ) ;
    }

    public function testIncludesRecognisesSynonyms() :void
    {
        $this->assertTrue ( SmtpSecurity::includes( 'ssl'      ) ) ;
        $this->assertTrue ( SmtpSecurity::includes( 'smtps'    ) ) ;
        $this->assertTrue ( SmtpSecurity::includes( 'tls'      ) ) ;
        $this->assertTrue ( SmtpSecurity::includes( 'starttls' ) ) ;
        $this->assertFalse( SmtpSecurity::includes( 'secure'   ) ) ;
    }

    public function testScheme() :void
    {
        $this->assertSame( SmtpScheme::SMTPS , SmtpSecurity::scheme( SmtpSecurity::SSL      ) ) ;
        $this->assertSame( SmtpScheme::SMTPS , SmtpSecurity::scheme( SmtpSecurity::SMTPS    ) ) ;
        $this->assertSame( SmtpScheme::SMTP  , SmtpSecurity::scheme( SmtpSecurity::TLS      ) ) ;
        $this->assertSame( SmtpScheme::SMTP  , SmtpSecurity::scheme( SmtpSecurity::STARTTLS ) ) ;
        $this->assertSame( SmtpScheme::SMTP  , SmtpSecurity::scheme( SmtpSecurity::NONE     ) ) ;
        $this->assertSame( SmtpScheme::SMTP  , SmtpSecurity::scheme( SmtpSecurity::PLAIN    ) ) ;
    }

    public function testSchemeIsCaseInsensitive() :void
    {
        $this->assertSame( SmtpScheme::SMTPS , SmtpSecurity::scheme( 'SSL' ) ) ;
        $this->assertSame( SmtpScheme::SMTP  , SmtpSecurity::scheme( 'TLS' ) ) ;
    }

    public function testSchemeFallsBackToStarttlsForNullEmptyOrUnknown() :void
    {
        $this->assertSame( SmtpScheme::SMTP , SmtpSecurity::scheme( null         ) ) ;
        $this->assertSame( SmtpScheme::SMTP , SmtpSecurity::scheme( ''           ) ) ;
        $this->assertSame( SmtpScheme::SMTP , SmtpSecurity::scheme( 'whatever'   ) ) ;
    }

    public function testDefaultPort() :void
    {
        $this->assertSame( 465 , SmtpSecurity::defaultPort( SmtpSecurity::SSL      ) ) ;
        $this->assertSame( 465 , SmtpSecurity::defaultPort( SmtpSecurity::SMTPS    ) ) ;
        $this->assertSame( 587 , SmtpSecurity::defaultPort( SmtpSecurity::TLS      ) ) ;
        $this->assertSame( 587 , SmtpSecurity::defaultPort( SmtpSecurity::STARTTLS ) ) ;
        $this->assertSame( 25  , SmtpSecurity::defaultPort( SmtpSecurity::NONE     ) ) ;
        $this->assertSame( 25  , SmtpSecurity::defaultPort( SmtpSecurity::PLAIN    ) ) ;
    }

    public function testDefaultPortIsCaseInsensitive() :void
    {
        $this->assertSame( 465 , SmtpSecurity::defaultPort( 'SSL' ) ) ;
        $this->assertSame( 25  , SmtpSecurity::defaultPort( 'None' ) ) ;
    }

    public function testDefaultPortFallsBackToStarttlsForNullEmptyOrUnknown() :void
    {
        $this->assertSame( 587 , SmtpSecurity::defaultPort( null       ) ) ;
        $this->assertSame( 587 , SmtpSecurity::defaultPort( ''         ) ) ;
        $this->assertSame( 587 , SmtpSecurity::defaultPort( 'whatever' ) ) ;
    }

    public function testIsImplicitTls() :void
    {
        $this->assertTrue ( SmtpSecurity::isImplicitTls( SmtpSecurity::SSL      ) ) ;
        $this->assertTrue ( SmtpSecurity::isImplicitTls( SmtpSecurity::SMTPS    ) ) ;
        $this->assertFalse( SmtpSecurity::isImplicitTls( SmtpSecurity::STARTTLS ) ) ;
        $this->assertFalse( SmtpSecurity::isImplicitTls( SmtpSecurity::NONE     ) ) ;
        $this->assertFalse( SmtpSecurity::isImplicitTls( null                   ) ) ;
    }
}
