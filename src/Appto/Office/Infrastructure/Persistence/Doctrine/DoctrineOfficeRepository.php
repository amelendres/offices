<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\Persistence\Doctrine;

use Appto\Office\Infrastructure\Persistence\Doctrine\Entity\DoctrineOfficeEntityRepository;
use Appto\Office\Domain\Office;
use Appto\Office\Domain\OfficeRepository;

class DoctrineOfficeRepository implements OfficeRepository
{
    private DoctrineOfficeEntityRepository $repository;

    public function __construct(DoctrineOfficeEntityRepository $doctrineRepository)
    {
        $this->repository = $doctrineRepository;
    }

    public function save(Office $office): void
    {
        $this->repository->save($office);
    }

    public function remove(Office $office): void
    {
        $this->repository->remove($office);
    }

    public function find(string $officeId) : ?Office
    {
        /** @var null|Office $office */
        $office = $this->repository->find($officeId);
        return $office;
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}