<?php

use Actengage\Sanitize\Sanitizers\Email;
use Actengage\Sanitize\Sanitizers\Phone;
use Actengage\Sanitize\Sanitizers\Zip;

return [

    /*
    |--------------------------------------------------------------------------
    | Sanitizers
    |--------------------------------------------------------------------------
    |
    | This value is an array of invokable classes that implement the Sanitizer
    | interface. These are the default macros associated with the Sanitizer
    | instance.
    |
    | use Actengage\Sanitize\Facades\Sanitize;
    |
    | Sanitize::email('test @test.com'); // test@test.com
    | Sanitize::phone('(888) 555-1234'); // 8885551234
    | Sanitize::zip('12345-1234'); // 123451234
    |
    */

    'sanitizers' => [
        'email' => Email::class,
        'phone' => Phone::class,
        'zip' => Zip::class,
    ],
];
