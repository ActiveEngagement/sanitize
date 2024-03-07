<?php

namespace Tests\Unit\Sanitizers;

use Actengage\Sanitize\Facades\Sanitize;
use Tests\TestCase;

class ZipTest extends TestCase
{
    public function test_sanitizing_zip()
    {
        $this->assertEquals('02801', Sanitize::zip('2801'));
        $this->assertEquals('22801', Sanitize::zip('22801'));
        $this->assertEquals('22801-1234', Sanitize::zip('228011234'));
        $this->assertEquals('22801-1234', Sanitize::zip('22801-1234'));
        $this->assertNull(Sanitize::zip('00000'));
        $this->assertNull(Sanitize::zip('228011'));
        $this->assertNull(Sanitize::zip('22801-12345'));
        $this->assertNull(Sanitize::zip('22801-0000'));
    }
}
