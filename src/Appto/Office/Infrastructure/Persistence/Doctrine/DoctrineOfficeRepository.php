<?php
declare(strict_types=1);

namespace Appto\Offices\Infrastructure\Persistence\Doctrine;

use Appto\Office\Infrastructure\Persistence\Doctrine\Entity\DoctrineOfficeEntityRepository;
use Appto\Offices\Domain\Office;
use Appto\Offices\Domain\OfficeRepository;

class DoctrineOfficeRepository implements OfficeRepository
{
    public function __construct(DoctrineOfficeEntityRepository $doctrineRepository)
    {
        $this->repository = $doctrineRepository;
    }

    public function save(Office $office): void
    {
        $this->repository->save($office);
    }

    public function find(string $officeId) : ?Office
    {
        /** @var null|Office $office */
        $office = $this->repository->find($officeId);
        return $office;
    }
}