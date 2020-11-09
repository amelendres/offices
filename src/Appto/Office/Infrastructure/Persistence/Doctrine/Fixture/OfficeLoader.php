<?php

namespace Appto\Office\Infrastructure\Persistence\Doctrine\Fixture;

use Appto\Common\Infrastructure\Persistence\Doctrine\FixtureLoader;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Test\Unit\Appto\Office\Domain\OfficeMother;

class OfficeLoader extends FixtureLoader implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++) {
            $office = OfficeMother::random();
            $manager->persist($office);
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['office'];
    }
}
