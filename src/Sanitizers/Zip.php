<?php

namespace Actengage\Sanitize\Sanitizers;

class Zip
{
    /**
     * Sanitize an zip code.
     *
     * @param  mixed  $value
     * @return string
     */
    public function __invoke($value)
    {
        $zip = preg_replace('/[^\-\d]/', '', $value ?: ''); // remove spaces and letters

        // Match all zero zip codes will are invalid
        if(preg_match('/^(00000)(-(0000))?$/', $zip)) {
            return null;
        }

        // If the numberical is 4, prepend with 0. 
        if (is_numeric($zip) && strlen($zip) == 4) {
            return '0'.$zip;
        }

        // If the numerical length is 5, assume it is correct.
        if(is_numeric($zip) && strlen($zip) == 5) {
            return $zip;
        }

        // If the numerical length is 9, assume it is correct.
        if(is_numeric($zip) && strlen($zip) == 9) {
            return substr($zip, 0, 5) . '-' . substr($zip, 5, 4);
        }
        
        // Check for the 9 digit code with a hyphen.
        if (preg_match('/^(?!00000)\d{5}-(?!0000)\d{4}$/', $zip)) {
            return $zip;
        }

        return null;
    }
}
