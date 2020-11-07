<?php
declare(strict_types=1);

namespace Appto\Common\Domain\Locale;

use Appto\Common\Domain\StringValueObject;
use Symfony\Component\Intl\Countries;

class CountryCode extends StringValueObject
{
    protected function guard(string $value) : void
    {
        if (!Countries::exists($value)) {
            throw new InvalidCountryCodeException($value);
        }
    }
}