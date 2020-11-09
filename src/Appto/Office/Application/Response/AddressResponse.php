<?php
declare(strict_types=1);

namespace Appto\Office\Application\Response;

class AddressResponse
{
    public string $street;
    public string $city;
    public string $state;
    public string $country;
    public string $postalCode;

    public function __construct(string $street, string $city, string $state, string $country, string $postalCode)
    {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
    }
}