<?php

namespace Tests\Unit;

use Tests\TestCase;
use Actengage\Sanitize\Facades\Sanitize;

class ZipTest extends TestCase
{
    public function test_sanitizing_zip()
    {
        $this->assertEquals('01234', Sanitize::zip('1234'));
        $this->assertEquals('90210', Sanitize::zip('90210'));
        $this->assertEquals('90210-1234', Sanitize::zip('90210-1234'));
        $this->assertNull(Sanitize::zip('902101'));
        $this->assertNull(Sanitize::zip('90210-12345'));
    }    
}
