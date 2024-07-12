<?php

namespace Actengage\Sanitize\Contracts;

interface Sanitizer
{
    /**
     * Define the sanitizer class.
     *
     * @param string|null $value
     * @return string|null
     */
    public function __invoke(?string $value): ?string;
}
