<?php

namespace oihana\enums\jwt;

use PHPUnit\Framework\TestCase;

final class JwtClaimTest extends TestCase
{
    public function testRegisteredClaims(): void
    {
        $this->assertSame( 'iss' , JwtClaim::ISS ) ;
        $this->assertSame( 'sub' , JwtClaim::SUB ) ;
        $this->assertSame( 'aud' , JwtClaim::AUD ) ;
        $this->assertSame( 'exp' , JwtClaim::EXP ) ;
        $this->assertSame( 'nbf' , JwtClaim::NBF ) ;
        $this->assertSame( 'iat' , JwtClaim::IAT ) ;
        $this->assertSame( 'jti' , JwtClaim::JTI ) ;
    }

    public function testLongAliasesMatchShortClaims(): void
    {
        $this->assertSame( JwtClaim::ISS , JwtClaim::ISSUER     ) ;
        $this->assertSame( JwtClaim::SUB , JwtClaim::SUBJECT    ) ;
        $this->assertSame( JwtClaim::AUD , JwtClaim::AUDIENCE   ) ;
        $this->assertSame( JwtClaim::EXP , JwtClaim::EXPIRES_AT ) ;
        $this->assertSame( JwtClaim::IAT , JwtClaim::ISSUED_AT  ) ;
        $this->assertSame( JwtClaim::NBF , JwtClaim::NOT_BEFORE ) ;
        $this->assertSame( JwtClaim::JTI , JwtClaim::JWT_ID     ) ;
    }

    public function testOidcClaims(): void
    {
        $this->assertSame( 'azp'       , JwtClaim::AZP       ) ;
        $this->assertSame( 'nonce'     , JwtClaim::NONCE     ) ;
        $this->assertSame( 'auth_time' , JwtClaim::AUTH_TIME ) ;
        $this->assertSame( 'acr'       , JwtClaim::ACR       ) ;
        $this->assertSame( 'amr'       , JwtClaim::AMR       ) ;
        $this->assertSame( 'scope'     , JwtClaim::SCOPE     ) ;
        $this->assertSame( 'client_id' , JwtClaim::CLIENT_ID ) ;
    }

    public function testStandardProfileClaims(): void
    {
        $this->assertSame( 'name'               , JwtClaim::NAME               ) ;
        $this->assertSame( 'given_name'         , JwtClaim::GIVEN_NAME         ) ;
        $this->assertSame( 'family_name'        , JwtClaim::FAMILY_NAME        ) ;
        $this->assertSame( 'email'              , JwtClaim::EMAIL              ) ;
        $this->assertSame( 'email_verified'     , JwtClaim::EMAIL_VERIFIED     ) ;
        $this->assertSame( 'preferred_username' , JwtClaim::PREFERRED_USERNAME ) ;
        $this->assertSame( 'locale'             , JwtClaim::LOCALE             ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwtClaim::includes( 'iss'   ) ) ;
        $this->assertTrue ( JwtClaim::includes( 'email' ) ) ;
        $this->assertFalse( JwtClaim::includes( 'ISS'   ) ) ;
        $this->assertFalse( JwtClaim::includes( 'foo'   ) ) ;
    }
}
