<?php

namespace Tests\Unit\Rules;

use Actengage\Sanitize\Rules\Email;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EmailTest extends TestCase
{
    public function test_validating_email_addresses()
    {
        $rules = ['email' => [new Email]];

        $this->assertTrue(Validator::make(['email' => 'test@test.com'], $rules)->passes());
        $this->assertTrue(Validator::make(['email' => 'test.test@gmail.com'], $rules)->passes());
        
        $this->assertSame([
            'The email must be a valid email address.'
        ], Validator::make(['email' => 'test@gmail'], $rules)->errors()->get('email'));
    }
}