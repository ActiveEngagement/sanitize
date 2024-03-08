<?php

namespace Actengage\Sanitize\Sanitizers;

class Phone
{
    /**
     * Sanitize an phone number.
     *
     * @param  mixed  $value
     * @return string
     */
    public function __invoke($value)
    {
        // Replace all formatting characters.
        $value = preg_replace('/[^\d]/', '', trim($value));

        // Return null if less than 10 digits. Not a valid number.
        if (strlen($value) < 10) {
            return;
        }

        if(strlen($value) > 10) {
            // Replace leading 0
            if (substr($value, 0, 1) == 0) {
                $value = substr($value, 1);
            }

            // Replace leading 1
            elseif (substr($value, 0, 1) == 1) {
                $value = substr($value, 1);
            }
        }

        // Invalidate the number if the city area code is "555"
        if (substr($value, 3, 3) == 555) {
            return;
        }

        // Get only the first 10 digits in case an extension was added...
        $value = substr($value, 0, 10);

        // If the phone starts with a 1 or 0, it is not valid.
        if(in_array(substr($value, 0, 1), ['0', '1'])) {
            return null;
        }

        return $value;
    }
}
