<?php
declare(strict_types=1);

namespace Appto\Office\Application\Query;

use Appto\Office\Application\Response\AssembleOfficeResponse;
use Appto\Office\Application\Response\OfficeResponse;
use Appto\Office\Domain\NotFoundOfficeException;
use Appto\Office\Domain\OfficeRepository;

class GetOffice
{
    private OfficeRepository $repository;
    private AssembleOfficeResponse $assemble;

    public function __construct(OfficeRepository $repository, AssembleOfficeResponse $assemble)
    {
        $this->repository = $repository;
        $this->assemble = $assemble;
    }

    public function __invoke(GetOfficeRequest $request): OfficeResponse
    {
        $office = $this->repository->find($request->id());

        if (!$office) {
            throw new NotFoundOfficeException($request->id());
        }

        return $this->assemble->__invoke($office);

    }
}