<?php
declare(strict_types=1);

namespace Test\Unit\Appto\Office\Domain;

use Appto\Common\Infrastructure\PHPUnit\Mother;
use Appto\Office\Domain\Office;
use Appto\Office\Domain\OfficeId;
use Appto\Office\Domain\OfficeName;

class OfficeMother extends Mother
{
    public static function random(): Office
    {
        return new Office(
            new OfficeId(self::faker()->uuid),
            new OfficeName(self::faker()->paragraph),
            AddressMother::random(),
        );
    }
}