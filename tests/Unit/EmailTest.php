<?php

namespace Tests\Unit;

use Tests\TestCase;
use Actengage\Sanitize\Facades\Sanitize;

class EmailTest extends TestCase
{
    public function test_sanitizing_email()
    {
        $this->assertEquals('test@test.com', Sanitize::email(' TEST @test.com '));
        $this->assertEquals('testtest@gmail.com', Sanitize::email('test.test@gmail.com'));
    }    
}