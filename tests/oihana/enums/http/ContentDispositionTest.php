<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class ContentDispositionTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertSame( 'inline'     , ContentDisposition::INLINE     ) ;
        $this->assertSame( 'attachment' , ContentDisposition::ATTACHMENT ) ;
        $this->assertSame( 'form-data'  , ContentDisposition::FORM_DATA  ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( ContentDisposition::includes( 'attachment' ) ) ;
        $this->assertTrue ( ContentDisposition::includes( 'form-data'  ) ) ;
        $this->assertFalse( ContentDisposition::includes( 'Attachment' ) ) ;
        $this->assertFalse( ContentDisposition::includes( 'form_data'  ) ) ;
    }
}
