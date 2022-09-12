<?php

namespace Actengage\Sanitize\Sanitizers;

class Email {

    /**
     * Sanitize an email address.
     *
     * @param mixed $value
     * @return string
     */
    public function __invoke($value)
    {
        $value = $this->removeWhitespace($value);
        $value = $this->toLowerCase($value);
        $value = $this->removePeriodsFromGmail($value);

        return $value;
    }

    protected function removeWhitespace(string $value): string
    {
        return preg_replace('/\s/', '', $value);
    }

    protected function toLowerCase(string $value): string
    {
        return strtolower($value);
    }

    protected function removePeriodsFromGmail(string $value): string
    {
        return preg_replace('/\.(?=.*?@gmail\.com)/', '', $value);
    }

}