<?php
declare(strict_types=1);

namespace Test\Unit\Appto\Office\Domain;

use Appto\Common\Domain\Locale\CountryCode;
use Appto\Common\Domain\Locale\PostalCode;
use Appto\Common\Infrastructure\PHPUnit\Mother;
use Appto\Office\Domain\Address;
use Appto\Office\Domain\City;
use Appto\Office\Domain\State;
use Appto\Office\Domain\StreetAddress;

class AddressMother extends Mother
{
    public static function create(string $streetAddress, $city, $state, $country, $postalCode): Address
    {
        return new Address(
            new StreetAddress($streetAddress),
            new City($city),
            new State($state),
            new CountryCode($country),
            new PostalCode($postalCode),
        );
    }

    public static function random(): Address
    {
        return self::create(
            self::faker()->streetAddress,
            self::faker()->city,
            self::faker()->state,
            self::faker()->countryCode,
            self::faker()->postcode,
        );
    }
}