<?php
declare(strict_types=1);

namespace Appto\Office\Application\Command;

use Appto\Office\Domain\OfficeRepository;

class RemoveOffice
{
    private OfficeRepository $repository;

    public function __construct(OfficeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(RemoveOfficeRequest $request): void
    {
        $office = $this->repository->find($request->id());
        if ($office) {
            $this->repository->remove($office);
        }
    }
}