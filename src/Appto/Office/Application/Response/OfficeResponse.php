<?php
declare(strict_types=1);

namespace Appto\Office\Application\Response;

class OfficeResponse
{
    public string $id;
    public string $name;
    public AddressResponse $address;

    public function __construct(string $id, string $name, AddressResponse $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }
}