<?php

namespace Test\Unit\Appto\Office\Domain;

use Appto\Common\Infrastructure\PHPUnit\UnitTest;
use Appto\Office\Domain\Office;
use Appto\Office\Domain\OfficeName;

class OfficeTest extends UnitTest
{
    public function testSuccessfulCreate(): void
    {
        $office = OfficeMother::random();
        self::assertInstanceOf(Office::class, $office);
    }

    public function testChangeName(): void
    {
        $newName = new OfficeName('NEW office name');
        $office = OfficeMother::random();

        $office->changeName($newName);

        self::assertSame($newName, $office->name());
    }

    public function testChangeAddress(): void
    {
        $newAddress = AddressMother::random();
        $office = OfficeMother::random();

        $office->changeAddress($newAddress);

        self::assertSame($newAddress, $office->address());
    }
}
