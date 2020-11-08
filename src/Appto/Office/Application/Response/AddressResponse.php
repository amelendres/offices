<?php
declare(strict_types=1);

namespace Appto\Office\Application\Response;

class AddressResponse
{
    public string $streetAddress;
    public string $city;
    public string $state;
    public string $country;
    public string $postalCode;

    public function __construct(string $streetAddress, string $city, string $state, string $country, string $postalCode)
    {
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
    }
}