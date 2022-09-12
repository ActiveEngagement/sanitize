<?php

namespace Actengage\Sanitize\Sanitizers;

use Actengage\Sanitize\Contracts\Sanitizer;

class Phone implements Sanitizer {

    /**
     * Sanitize an phone number.
     *
     * @param mixed $value
     * @return string
     */
    public function __invoke($value)
    {
        // Replace all formatting characters.
        $value = preg_replace('/[^\d]/', '', trim($value));
        
        // Return null if less than 10 digits. Not a valid number.
        if(strlen($value) < 10) {
            return;
        }

        // Replace leading 0
        if(substr($value, 0, 1) == 0) {
            $value = substr($value, 1);
        }

        // Replace leading 1
        else if(substr($value, 0, 1) == 1) {
            $value = substr($value, 1);
        }
        
        // Return only the first 10 digits in case an extension was added...
        return substr($value, 0, 10);
    }

}