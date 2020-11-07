<?php
declare(strict_types=1);

namespace Appto\Office\Application\Command;

use Appto\Common\Domain\Locale\CountryCode;
use Appto\Common\Domain\Locale\PostalCode;
use Appto\Office\Domain\Address;
use Appto\Office\Domain\City;
use Appto\Office\Domain\Office;
use Appto\Office\Domain\OfficeAlreadyExistsException;
use Appto\Office\Domain\OfficeId;
use Appto\Office\Domain\OfficeName;
use Appto\Office\Domain\OfficeRepository;
use Appto\Office\Domain\State;
use Appto\Office\Domain\StreetAddress;

class CreateOffice
{
    private OfficeRepository $repository;

    public function __construct(OfficeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateOfficeRequest $request): void
    {
        if($this->repository->find($request->id())){
            throw new OfficeAlreadyExistsException($request->id());
        }

        $office = new Office(
            new OfficeId($request->id()),
            new OfficeName($request->name()),
            new Address(
                new StreetAddress($request->address()->streetAddress()),
                new City($request->address()->city()),
                new State($request->address()->state()),
                new CountryCode($request->address()->country()),
                new PostalCode($request->address()->postalCode()),
            ),
        );
        $this->repository->save($office);
    }
}