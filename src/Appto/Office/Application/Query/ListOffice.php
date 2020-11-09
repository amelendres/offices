<?php
declare(strict_types=1);

namespace Appto\Office\Application\Query;

use Appto\Office\Application\Response\AssembleOfficeResponse;
use Appto\Office\Application\Response\OfficeResponse;
use Appto\Office\Domain\Office;
use Appto\Office\Domain\OfficeRepository;

class ListOffice
{
    private OfficeRepository $repository;
    private AssembleOfficeResponse $assemble;

    public function __construct(OfficeRepository $repository, AssembleOfficeResponse $assemble)
    {
        $this->repository = $repository;
        $this->assemble = $assemble;
    }

    /**
     * @return OfficeResponse[]
     */
    public function __invoke(ListOfficeRequest $request): array
    {
        return array_map(fn(Office $office) => $this->assemble->__invoke($office), $this->repository->findAll());
    }
}