<?php

namespace Actengage\Sanitize;

use Actengage\Sanitize\Sanitizers\Email;
use Actengage\Sanitize\Sanitizers\Phone;
use Actengage\Sanitize\Sanitizers\Zip;
use Illuminate\Http\Request;
use Illuminate\Support\Traits\Macroable;

class Sanitize
{
    use Macroable;

    /**
     * Sanitize HTTP request inputs.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Request
     */
    public function request(Request $request): Request
    {
        return $request->merge(
            collect($request->input())->mapWithKeys(
                fn (mixed $value, string $key) => [
                    $key => match(true) {
                        method_exists($this, $key) => $this->$key($value),
                        static::hasMacro($key) => $this->$key($value),
                        default => $value
                    }
                ]
            )->all()
        );
    }

    /**
     * Sanitize an email address.
     *
     * @param string|null $value
     * @return string|null
     */
    public function email(?string $value): ?string
    {
        return with($value, new Email());
    }

    /**
     * Sanitize a phone number.
     *
     * @param string|null $value
     * @return string|null
     */
    public function phone(?string $value): ?string
    {
        return with($value, new Phone());
    }

    /**
     * Sanitize a zip code.
     *
     * @param string|null $value
     * @return string|null
     */
    public function zip(?string $value): ?string
    {
        return with($value, new Zip());
    }
}
