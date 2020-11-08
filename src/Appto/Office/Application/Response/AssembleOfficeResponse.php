<?php
declare(strict_types=1);

namespace Appto\Office\Application\Response;

use Appto\Office\Domain\Office;

class AssembleOfficeResponse
{
    public function __invoke(Office $office): OfficeResponse
    {
        return new OfficeResponse(
            (string)$office->id(),
            (string)$office->name(),
            new AddressResponse(
                (string)$office->address()->street(),
                (string)$office->address()->city(),
                (string)$office->address()->state(),
                (string)$office->address()->country(),
                (string)$office->address()->postalCode()
            )
        );
    }
}