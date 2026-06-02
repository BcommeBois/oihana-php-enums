<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\MailHeader;

class MailHeaderTest extends TestCase
{
    public function testCanonicalValues() :void
    {
        $this->assertSame( 'From'                      , MailHeader::FROM                      ) ;
        $this->assertSame( 'Message-ID'               , MailHeader::MESSAGE_ID                ) ;
        $this->assertSame( 'MIME-Version'             , MailHeader::MIME_VERSION              ) ;
        $this->assertSame( 'Content-Transfer-Encoding', MailHeader::CONTENT_TRANSFER_ENCODING ) ;
        $this->assertSame( 'List-Unsubscribe-Post'    , MailHeader::LIST_UNSUBSCRIBE_POST     ) ;
        $this->assertSame( 'DKIM-Signature'           , MailHeader::DKIM_SIGNATURE            ) ;
    }

    public function testIncludesAndConstant() :void
    {
        $this->assertTrue ( MailHeader::includes( 'Subject' ) ) ;
        $this->assertFalse( MailHeader::includes( 'subject' ) ) ; // exact, case-sensitive
        $this->assertSame ( 'SUBJECT' , MailHeader::getConstant( 'Subject' ) ) ;
    }

    public function testNormalizeKnownHeaders() :void
    {
        $this->assertSame( 'Message-ID'   , MailHeader::normalize( 'message-id'   ) ) ;
        $this->assertSame( 'MIME-Version' , MailHeader::normalize( 'mime-version' ) ) ;
        $this->assertSame( 'Reply-To'     , MailHeader::normalize( 'REPLY-TO'     ) ) ;
        $this->assertSame( 'Content-ID'   , MailHeader::normalize( 'content-id'   ) ) ;
    }

    public function testNormalizeUnknownFallsBackToTrainCase() :void
    {
        $this->assertSame( 'X-Foo-Bar'   , MailHeader::normalize( 'x-foo-bar' ) ) ;
        $this->assertSame( 'X-Custom'    , MailHeader::normalize( 'X-CUSTOM'  ) ) ;
    }

    public function testCanRepeat() :void
    {
        $this->assertTrue ( MailHeader::canRepeat( MailHeader::RECEIVED       ) ) ;
        $this->assertTrue ( MailHeader::canRepeat( 'dkim-signature'           ) ) ; // case-insensitive
        $this->assertTrue ( MailHeader::canRepeat( MailHeader::RESENT_FROM    ) ) ;
        $this->assertFalse( MailHeader::canRepeat( MailHeader::SUBJECT        ) ) ;
        $this->assertFalse( MailHeader::canRepeat( MailHeader::FROM           ) ) ;
    }

    public function testSetAndGetAreCaseInsensitive() :void
    {
        $headers = MailHeader::set( [] , MailHeader::SUBJECT , 'Hello' ) ;

        $this->assertSame( [ 'Subject' => 'Hello' ] , $headers ) ;
        $this->assertSame( 'Hello' , MailHeader::get( $headers , 'subject' ) ) ;
        $this->assertTrue( MailHeader::has( $headers , 'SUBJECT' ) ) ;
    }

    public function testSetNormalizesNameAndReplaces() :void
    {
        $headers = [ 'subject' => 'Old' ] ;
        $headers = MailHeader::set( $headers , 'SUBJECT' , 'New' ) ;

        $this->assertSame( [ 'Subject' => 'New' ] , $headers ) ;
    }

    public function testSetAllowsCustomHeaders() :void
    {
        $headers = MailHeader::set( [] , 'X-App-Token' , 'abc' ) ;
        $this->assertSame( [ 'X-App-Token' => 'abc' ] , $headers ) ;
    }

    public function testGetReturnsDefaultWhenAbsent() :void
    {
        $this->assertNull( MailHeader::get( [] , 'Subject' ) ) ;
        $this->assertSame( 'n/a' , MailHeader::get( [] , 'Subject' , 'n/a' ) ) ;
    }

    public function testRemoveIsCaseInsensitive() :void
    {
        $headers = [ 'Subject' => 'Hello' , 'X-Foo' => 'bar' ] ;
        $headers = MailHeader::remove( $headers , 'subject' ) ;

        $this->assertSame( [ 'X-Foo' => 'bar' ] , $headers ) ;
    }

    public function testAllRewritesKeysToCanonicalCasing() :void
    {
        $headers = [ 'subject' => 'Hi' , 'message-id' => '<x@y>' ] ;

        $this->assertSame
        (
            [ 'Subject' => 'Hi' , 'Message-ID' => '<x@y>' ] ,
            MailHeader::all( $headers )
        ) ;
    }
}
