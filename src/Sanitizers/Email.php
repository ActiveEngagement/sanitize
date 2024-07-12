<?php

namespace Actengage\Sanitize\Sanitizers;

use Actengage\Sanitize\Contracts\Sanitizer;

class Email implements Sanitizer
{
    /**
     * Sanitize an email address.
     *
     * @param string|null $value
     * @return string|null
     */
    public function __invoke($value): ?string
    {
        $value = $this->removeWhitespace($value);
        $value = $this->toLowerCase($value);
        $value = $this->removePeriodsFromGmail($value);
        $value = $this->checkSyntax($value);

        return $value;
    }

    /**
     * Remove the whitespace from the email.
     *
     * @param string|null $value
     * @return string|null
     */
    protected function removeWhitespace(?string $value): ?string
    {
        return preg_replace('/\s/', '', $value);
    }

    /**
     * Make the email lowercase.
     *
     * @param string|null $value
     * @return string|null
     */
    protected function toLowerCase(?string $value): ?string
    {
        return strtolower($value);
    }

    /**
     * Remove periods from Gmail addresses.
     *
     * @param string|null $value
     * @return string|null
     */
    protected function removePeriodsFromGmail(?string $value): ?string
    {
        return preg_replace('/\.(?=.*?@gmail\.com)/', '', $value);
    }

    /**
     * Check for valid syntax.
     *
     * @param string|null $value
     * @return string|null
     */
    protected function checkSyntax(?string $value): ?string
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) ? $value : null;
    }
}
