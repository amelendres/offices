<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\UI\Rest;

use Appto\Office\Application\Command\UpdateOffice;
use Appto\Office\Application\Command\UpdateOfficeRequest;
use Appto\Office\Application\Definition\AddressDefinition;
use Appto\Office\Domain\NotFoundOfficeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/offices", name="offices_"
 * )
 */
class UpdateOfficeController
{
    /**
     * @Route(
     *     "/{id}",
     *     methods={"PUT"},
     *     name="update"
     * )
     */
    public function __invoke(string $id, Request $request, UpdateOffice $updateOffice)
    {
        $body = json_decode((string)$request->getContent());

        try {
            $updateOffice(new UpdateOfficeRequest(
                              $id,
                              $body->name,
                              new AddressDefinition(
                                  $body->address->street,
                                  $body->address->city,
                                  $body->address->state,
                                  $body->address->country,
                                  $body->address->postalCode
                              )
                          ));
        }catch (NotFoundOfficeException $e){
            throw new NotFoundHttpException(null, $e);
        }

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}