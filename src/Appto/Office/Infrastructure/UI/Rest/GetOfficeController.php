<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\UI\Rest;

use Appto\Office\Application\Query\GetOffice;
use Appto\Office\Application\Query\GetOfficeRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/offices", name="offices_"
 * )
 */
class GetOfficeController
{
    /**
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="get"
     * )
     */
    public function __invoke(string $id, Request $request, GetOffice $getOffice)
    {
        return new JsonResponse($getOffice(new GetOfficeRequest($id)), Response::HTTP_OK);
    }
}