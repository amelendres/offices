<?php

namespace Appto\Office\Infrastructure\Persistence\Doctrine\Entity;

use Appto\Office\Domain\Office;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineOfficeEntityRepository extends ServiceEntityRepository
{
    private $registry;

    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
        parent::__construct($registry, Office::class);
    }

    public function save(Office $office): void
    {
        $this->registry->getManager()->persist($office);
        $this->registry->getManager()->flush();
    }
}
