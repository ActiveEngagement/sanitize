<?php

namespace Actengage\Sanitize;

use Closure;
use Illuminate\Support\Traits\Macroable;

class Sanitize
{
    use Macroable;

    /**
     * Create a new instance using a config of sanitizer classes.
     */
    public function __construct(array $sanitizers = [])
    {
        foreach ($sanitizers as $key => $callback) {
            static::macro($key, function (...$args) use ($callback) {
                if ($callback instanceof Closure) {
                    return $callback(...$args);
                }

                return (new $callback)(...$args);
            });
        }
    }
}
