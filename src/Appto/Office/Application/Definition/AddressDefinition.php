<?php
declare(strict_types=1);

namespace Appto\Office\Application\Definition;

class AddressDefinition
{
    private string $streetAddress;
    private string $city;
    private string $state;
    private string $country;
    private string $postalCode;

    public function __construct(string $streetAddress, string $city, string $state, string $country, string $postalCode)
    {
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
    }

    public function streetAddress(): string
    {
        return $this->streetAddress;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function country(): string
    {
        return $this->country;
    }

    public function postalCode(): string
    {
        return $this->postalCode;
    }
}