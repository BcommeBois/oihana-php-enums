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
        $this->assertSame( 'scp'       , JwtClaim::SCP       ) ;
        $this->assertSame( 'client_id' , JwtClaim::CLIENT_ID ) ;
    }

    public function testSessionManagementClaims(): void
    {
        $this->assertSame( 'sid'           , JwtClaim::SID        ) ;
        $this->assertSame( JwtClaim::SID   , JwtClaim::SESSION_ID ) ;
    }

    public function testIdTokenValidationClaims(): void
    {
        $this->assertSame( 'at_hash' , JwtClaim::AT_HASH ) ;
        $this->assertSame( 'c_hash'  , JwtClaim::C_HASH  ) ;
    }

    public function testStandardProfileClaims(): void
    {
        $this->assertSame( 'name'                  , JwtClaim::NAME                  ) ;
        $this->assertSame( 'given_name'            , JwtClaim::GIVEN_NAME            ) ;
        $this->assertSame( 'family_name'           , JwtClaim::FAMILY_NAME           ) ;
        $this->assertSame( 'middle_name'           , JwtClaim::MIDDLE_NAME           ) ;
        $this->assertSame( 'nickname'              , JwtClaim::NICKNAME              ) ;
        $this->assertSame( 'preferred_username'    , JwtClaim::PREFERRED_USERNAME    ) ;
        $this->assertSame( 'profile'               , JwtClaim::PROFILE               ) ;
        $this->assertSame( 'picture'               , JwtClaim::PICTURE               ) ;
        $this->assertSame( 'website'               , JwtClaim::WEBSITE               ) ;
        $this->assertSame( 'email'                 , JwtClaim::EMAIL                 ) ;
        $this->assertSame( 'email_verified'        , JwtClaim::EMAIL_VERIFIED        ) ;
        $this->assertSame( 'gender'                , JwtClaim::GENDER                ) ;
        $this->assertSame( 'birthdate'             , JwtClaim::BIRTHDATE             ) ;
        $this->assertSame( 'zoneinfo'              , JwtClaim::ZONEINFO              ) ;
        $this->assertSame( 'locale'                , JwtClaim::LOCALE                ) ;
        $this->assertSame( 'phone_number'          , JwtClaim::PHONE_NUMBER          ) ;
        $this->assertSame( 'phone_number_verified' , JwtClaim::PHONE_NUMBER_VERIFIED ) ;
        $this->assertSame( 'address'               , JwtClaim::ADDRESS               ) ;
        $this->assertSame( 'updated_at'            , JwtClaim::UPDATED_AT            ) ;
    }

    public function testTokenExchangeClaims(): void
    {
        $this->assertSame( 'act'     , JwtClaim::ACT     ) ;
        $this->assertSame( 'may_act' , JwtClaim::MAY_ACT ) ;
    }

    public function testProofOfPossessionClaim(): void
    {
        $this->assertSame( 'cnf' , JwtClaim::CNF ) ;
    }

    public function testProviderSpecificClaims(): void
    {
        $this->assertSame( 'groups'       , JwtClaim::GROUPS       ) ;
        $this->assertSame( 'roles'        , JwtClaim::ROLES        ) ;
        $this->assertSame( 'entitlements' , JwtClaim::ENTITLEMENTS ) ;
        $this->assertSame( 'tid'          , JwtClaim::TID          ) ;
        $this->assertSame( 'oid'          , JwtClaim::OID          ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( JwtClaim::includes( 'iss'     ) ) ;
        $this->assertTrue ( JwtClaim::includes( 'email'   ) ) ;
        $this->assertTrue ( JwtClaim::includes( 'sid'     ) ) ;
        $this->assertTrue ( JwtClaim::includes( 'at_hash' ) ) ;
        $this->assertTrue ( JwtClaim::includes( 'cnf'     ) ) ;
        $this->assertFalse( JwtClaim::includes( 'ISS'     ) ) ;
        $this->assertFalse( JwtClaim::includes( 'foo'     ) ) ;
    }
}
