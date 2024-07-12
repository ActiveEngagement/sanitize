<?php

namespace Actengage\Sanitize\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\Request request(\Illuminate\Http\Request $request)
 * @method static string|null email(?string $value)
 * @method static string|null phone(?string $value)
 * @method static string|null zip(?string $value)
 */
class Sanitize extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sanitize';
    }
}
