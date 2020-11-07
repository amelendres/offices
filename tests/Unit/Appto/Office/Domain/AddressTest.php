<?php

namespace Test\Unit\Appto\Office\Domain;

use Appto\Common\Infrastructure\PHPUnit\UnitTest;
use Appto\Office\Domain\Address;

class AddressTest extends UnitTest
{
    public function testSuccessfulCreate(): void
    {
        $address = AddressMother::random();
        self::assertInstanceOf(Address::class, $address);
    }

    /**
     * @dataProvider invalidAddressProvider
     */
    public function testFailsCreatingInvalidAddress(string $streetAddress, $city, $state, $country, $postalCode): void
    {
        $this->expectException(\DomainException::class);

        $address = AddressMother::create($streetAddress, $city, $state, $country, $postalCode);
    }

    public function invalidAddressProvider(): array
    {
        return [
            ['Gran via 1003, 7-7', 'Barcelona', 'Catalunya', 'ES', ''],
            ['Gran via 1003, 7-7', 'Barcelona', 'Catalunya', '--', '08020'],
            ['Gran via 1003, 7-7', 'Barcelona', '', 'ES', '08020'],
            ['Gran via 1003, 7-7', '', 'Catalunya', 'ES', '08020'],
            ['', 'Barcelona', 'Catalunya', 'ES', '08020'],
        ];
    }
}
