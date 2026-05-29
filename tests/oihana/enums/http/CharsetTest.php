<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class CharsetTest extends TestCase
{
    public function testValuesAreLowercaseTokens(): void
    {
        $this->assertSame( 'utf-8'        , Charset::UTF_8        ) ;
        $this->assertSame( 'utf-16'       , Charset::UTF_16       ) ;
        $this->assertSame( 'us-ascii'     , Charset::US_ASCII     ) ;
        $this->assertSame( 'iso-8859-1'   , Charset::ISO_8859_1   ) ;
        $this->assertSame( 'iso-8859-15'  , Charset::ISO_8859_15  ) ;
        $this->assertSame( 'windows-1252' , Charset::WINDOWS_1252 ) ;
        $this->assertSame( 'shift_jis'    , Charset::SHIFT_JIS    ) ;
        $this->assertSame( 'gb18030'      , Charset::GB18030      ) ;
        $this->assertSame( 'big5'         , Charset::BIG5         ) ;
        $this->assertSame( 'koi8-r'       , Charset::KOI8_R       ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( Charset::includes( 'utf-8'      ) ) ;
        $this->assertTrue ( Charset::includes( 'iso-8859-1' ) ) ;
        $this->assertFalse( Charset::includes( 'UTF-8'      ) ) ; // strict casing
        $this->assertFalse( Charset::includes( 'utf8'       ) ) ; // missing dash
    }
}
