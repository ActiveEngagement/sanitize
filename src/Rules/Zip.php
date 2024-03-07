<?php

namespace Actengage\Sanitize\Rules;

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
        $sanitized = app('sanitize')->zip($value);

        if(!$sanitized) {
            $fail('The :attribute must be a valid zip code.');
        }
    }
}