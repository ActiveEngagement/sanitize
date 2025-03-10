<?php

namespace Actengage\Sanitize\Rules;

use Actengage\Sanitize\Facades\Sanitize;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Sanitize::phone($value)) {
            $fail('Please enter a valid phone number.');
        }
    }
}