<?php

namespace oihana\enums\http;

use PHPUnit\Framework\TestCase;

final class CacheControlDirectiveTest extends TestCase
{
    public function testResponseDirectives(): void
    {
        $this->assertSame( 'public'                 , CacheControlDirective::PUBLIC                 ) ;
        $this->assertSame( 'private'                , CacheControlDirective::PRIVATE                ) ;
        $this->assertSame( 'no-cache'               , CacheControlDirective::NO_CACHE               ) ;
        $this->assertSame( 'no-store'               , CacheControlDirective::NO_STORE               ) ;
        $this->assertSame( 'must-revalidate'        , CacheControlDirective::MUST_REVALIDATE        ) ;
        $this->assertSame( 'max-age'                , CacheControlDirective::MAX_AGE                ) ;
        $this->assertSame( 's-maxage'               , CacheControlDirective::S_MAXAGE               ) ;
        $this->assertSame( 'immutable'              , CacheControlDirective::IMMUTABLE              ) ;
        $this->assertSame( 'stale-while-revalidate' , CacheControlDirective::STALE_WHILE_REVALIDATE ) ;
        $this->assertSame( 'stale-if-error'         , CacheControlDirective::STALE_IF_ERROR         ) ;
    }

    public function testRequestDirectives(): void
    {
        $this->assertSame( 'max-stale'      , CacheControlDirective::MAX_STALE      ) ;
        $this->assertSame( 'min-fresh'      , CacheControlDirective::MIN_FRESH      ) ;
        $this->assertSame( 'only-if-cached' , CacheControlDirective::ONLY_IF_CACHED ) ;
    }

    public function testIncludesViaConstantsTrait(): void
    {
        $this->assertTrue ( CacheControlDirective::includes( 'no-store' ) ) ;
        $this->assertTrue ( CacheControlDirective::includes( 'max-age'  ) ) ;
        $this->assertFalse( CacheControlDirective::includes( 'No-Store' ) ) ;
        $this->assertFalse( CacheControlDirective::includes( 'max-age=3600' ) ) ;
    }
}
