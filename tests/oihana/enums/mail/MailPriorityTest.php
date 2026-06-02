<?php

namespace tests\oihana\enums\mail;

use PHPUnit\Framework\TestCase;

use oihana\enums\mail\MailPriority;

class MailPriorityTest extends TestCase
{
    public function testValues() :void
    {
        $this->assertSame( 'high'   , MailPriority::HIGH   ) ;
        $this->assertSame( 'normal' , MailPriority::NORMAL ) ;
        $this->assertSame( 'low'    , MailPriority::LOW    ) ;
    }

    public function testNormalize() :void
    {
        $this->assertSame( MailPriority::HIGH   , MailPriority::normalize( 'high'       ) ) ;
        $this->assertSame( MailPriority::HIGH   , MailPriority::normalize( 'URGENT'     ) ) ;
        $this->assertSame( MailPriority::HIGH   , MailPriority::normalize( '1'          ) ) ;
        $this->assertSame( MailPriority::LOW    , MailPriority::normalize( 'non-urgent' ) ) ;
        $this->assertSame( MailPriority::LOW    , MailPriority::normalize( '5'          ) ) ;
        $this->assertSame( MailPriority::NORMAL , MailPriority::normalize( 'normal'     ) ) ;
        $this->assertSame( MailPriority::NORMAL , MailPriority::normalize( null         ) ) ;
        $this->assertSame( MailPriority::NORMAL , MailPriority::normalize( 'whatever'   ) ) ;
    }

    public function testToXPriority() :void
    {
        $this->assertSame( 1 , MailPriority::toXPriority( MailPriority::HIGH   ) ) ;
        $this->assertSame( 3 , MailPriority::toXPriority( MailPriority::NORMAL ) ) ;
        $this->assertSame( 5 , MailPriority::toXPriority( MailPriority::LOW    ) ) ;
        $this->assertSame( 1 , MailPriority::toXPriority( 'urgent'             ) ) ;
    }

    public function testFromXPriority() :void
    {
        $this->assertSame( MailPriority::HIGH   , MailPriority::fromXPriority( 1 ) ) ;
        $this->assertSame( MailPriority::HIGH   , MailPriority::fromXPriority( 2 ) ) ;
        $this->assertSame( MailPriority::NORMAL , MailPriority::fromXPriority( 3 ) ) ;
        $this->assertSame( MailPriority::LOW    , MailPriority::fromXPriority( 4 ) ) ;
        $this->assertSame( MailPriority::LOW    , MailPriority::fromXPriority( 5 ) ) ;
    }

    public function testToImportance() :void
    {
        $this->assertSame( 'high'   , MailPriority::toImportance( MailPriority::HIGH ) ) ;
        $this->assertSame( 'normal' , MailPriority::toImportance( 'whatever'         ) ) ;
        $this->assertSame( 'low'    , MailPriority::toImportance( '5'                ) ) ;
    }

    public function testToPriority() :void
    {
        $this->assertSame( 'urgent'     , MailPriority::toPriority( MailPriority::HIGH ) ) ;
        $this->assertSame( 'normal'     , MailPriority::toPriority( MailPriority::NORMAL ) ) ;
        $this->assertSame( 'non-urgent' , MailPriority::toPriority( MailPriority::LOW ) ) ;
        $this->assertSame( 'urgent'     , MailPriority::toPriority( '1' ) ) ;
    }
}
