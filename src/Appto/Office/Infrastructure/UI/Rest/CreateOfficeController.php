<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\UI\Rest;

use Appto\Office\Application\Command\CreateOffice;
use Appto\Office\Application\Command\CreateOfficeRequest;
use Appto\Office\Application\Definition\AddressDefinition;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/offices", name="offices_"
 * )
 */
class CreateOfficeController
{
    /**
     * @Route(
     *     "",
     *     methods={"POST"},
     *     name="create"
     * )
     */
    public function __invoke(Request $request, CreateOffice $createOffice)
    {
        $body = json_decode((string)$request->getContent());

        $createOffice(new CreateOfficeRequest(
                     $body->id,
                     $body->name,
                     new AddressDefinition(
                         $body->address->street,
                         $body->address->city,
                         $body->address->state,
                         $body->address->country,
                         $body->address->postalCode
                     )
                 ));

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}