<?php
declare(strict_types=1);

namespace Appto\Office\Domain;

use Appto\Common\Domain\Locale\CountryCode;
use Appto\Common\Domain\Locale\PostalCode;

class Address
{
    private StreetAddress $street;
    private City $city;
    private State $state;
    private CountryCode $country;
    private PostalCode $postalCode;

    public function __construct(StreetAddress $street, City $city, State $state, CountryCode $country, PostalCode $postalCode)
    {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
    }

    public function street(): StreetAddress
    {
        return $this->street;
    }

    public function city(): City
    {
        return $this->city;
    }

    public function state(): State
    {
        return $this->state;
    }

    public function country(): CountryCode
    {
        return $this->country;
    }

    public function postalCode(): PostalCode
    {
        return $this->postalCode;
    }
}