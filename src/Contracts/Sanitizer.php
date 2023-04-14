<?php

namespace Actengage\Sanitize\Contracts;

interface Sanitizer
{
    /**
     * Define the sanitizer class.
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function __invoke($value);
}
