<?php
declare(strict_types=1);

namespace Appto\Office\Application\Command;

use Appto\Office\Application\Definition\AddressDefinition;

class UpdateOfficeRequest
{
    private string $id;
    private string $name;
    private AddressDefinition $address;

    public function __construct(string $id, string $name, AddressDefinition $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function address(): AddressDefinition
    {
        return $this->address;
    }
}