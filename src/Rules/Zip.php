<?php

namespace Actengage\Sanitize\Rules;

use Actengage\Sanitize\Facades\Sanitize;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Zip implements ValidationRule
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
        $sanitized = Sanitize::zip($value);

        if(!$sanitized) {
            $fail('Please enter a valid zip code.');
        }
    }
}