<?php
declare(strict_types=1);

namespace Appto\Office\Domain;

class Office
{
    private OfficeId $id;
    private OfficeName $name;
    private Address $address;

    public function __construct(OfficeId $id, OfficeName $name, Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function id(): OfficeId
    {
        return $this->id;
    }

    public function name(): OfficeName
    {
        return $this->name;
    }

    public function address(): Address
    {
        return $this->address;
    }
}