<?php

namespace Tests\Unit\Rules;

use Actengage\Sanitize\Rules\Phone;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    public function test_validating_phone_numbers()
    {
        $rules = ['phone' => [new Phone]];

        $this->assertTrue(Validator::make(['phone' => '8009991234'], $rules)->passes());
        $this->assertTrue(Validator::make(['phone' => '800-999-1234'], $rules)->passes());
        $this->assertTrue(Validator::make(['phone' => '1-800-999-1234'], $rules)->passes());
        $this->assertTrue(Validator::make(['phone' => '0-800-999-1234'], $rules)->passes());
        $this->assertFalse(Validator::make(['phone' => '1234'], $rules)->passes());
        
        $this->assertSame([
            'The phone must be a valid phone number.'
        ], Validator::make(['phone' => '1234'], $rules)->errors()->get('phone'));
    }
}