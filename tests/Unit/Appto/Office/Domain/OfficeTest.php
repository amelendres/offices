<?php

namespace Test\Unit\Appto\Office\Domain;

use Appto\Common\Infrastructure\PHPUnit\UnitTest;
use Appto\Office\Domain\Office;

class OfficeTest extends UnitTest
{
    public function testSuccessfulCreate(): void
    {
        $office = OfficeMother::random();
        self::assertInstanceOf(Office::class, $office);
    }
}
