<?php

namespace Tests\Unit\Sanitizers;

use Actengage\Sanitize\Facades\Sanitize;
use Tests\TestCase;

class EmailTest extends TestCase
{
    public function test_sanitizing_email()
    {
        $this->assertEquals('test@test.com', Sanitize::email(' TEST @test.com '));
        $this->assertEquals('testtest@gmail.com', Sanitize::email('test.test@gmail.com'));
        $this->assertEquals(null, Sanitize::email(null));
        $this->assertEquals(null, Sanitize::email(' '));
    }
}
