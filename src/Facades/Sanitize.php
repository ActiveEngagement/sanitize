<?php

namespace Actengage\Sanitize\Facades;

use Illuminate\Support\Facades\Facade;

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
