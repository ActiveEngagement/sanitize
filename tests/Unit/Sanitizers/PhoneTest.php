<?php

namespace Tests\Unit\Sanitizers;

use Actengage\Sanitize\Facades\Sanitize;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    public function test_sanitizing_phone()
    {
        $this->assertEquals('8881231234', Sanitize::phone('(888) 123-1234'));
        $this->assertEquals('8005671234', Sanitize::phone('0-800-567-1234'));
        $this->assertEquals('8005671234', Sanitize::phone('1-800-567-1234'));
        $this->assertEquals('8005671234', Sanitize::phone('1-800-567-1234 x1234'));
        $this->assertNull(Sanitize::phone('567123'));
        $this->assertNull(Sanitize::phone('8005551212'));
        $this->assertNull(Sanitize::phone('800-555-1212'));
    }
}
