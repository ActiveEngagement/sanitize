<?php

namespace Actengage\Sanitize\Rules;

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
        if(!app('sanitize')->phone($value)) {
            $fail('The :attribute must be a valid phone number.');
        }
    }
}