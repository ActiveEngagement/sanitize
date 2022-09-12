# Sanitize

A collection of classes used to sanitize common things like email, phone, and zip codes.

### Installation

    composer require actengage/sanitize

### Publish the Config

You may optionally publish the config file.

```bash
php artisan vendor:publish --tag=sanitize-config
```

## Basic Example

```php
use Actengage\Sanitize\Facades\Sanitize;

Sanitize::email(' JOHN.doe @gmail '); // johndoe@gmail.com
Sanitize::phone('(888) 555-1234'); // 8885551234
Sanitize::zip('12345'); // 12345
```

## Default Sanitizers

You may add to the default sanitizers in the `config/sanitize.php`.

```php
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
    ]
];
```

## Sanitizer Macros

You may also add additional sanitizer functions using the macro.

```php

Sanitize::macro('test', function($value) {
    return round($value) * 100;
});

Sanitize::test(100.1234); // 10000
```