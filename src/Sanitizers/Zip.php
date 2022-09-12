<?php

namespace Actengage\Sanitize\Sanitizers;

class Zip {

    /**
     * Sanitize an zip code.
     *
     * @param mixed $value
     * @return string
     */
    public function __invoke($value)
    {
        $zip = preg_replace('/[^0-9]/', '', $value ?: ''); //remove all non-numeric chars
        
        if (strlen($zip) == 4) {
            return '0'.$value;
        }

        //kill too short values            
        if (strlen($zip) == 5 || strlen($zip) == 9) {
            return $value; //either 5 or 9 chars, probably correct
        }
        
        return null;
    }

}