<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\UI\Rest;

use Appto\Office\Application\Query\ListOffice;
use Appto\Office\Application\Query\ListOfficeRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/offices", name="offices_"
 * )
 */
class ListOfficeController
{
    /**
     * @Route(
     *     "",
     *     methods={"GET"},
     *     name="list"
     * )
     */
    public function __invoke(Request $request, ListOffice $listOffice)
    {
        return new JsonResponse($listOffice(new ListOfficeRequest()), Response::HTTP_OK);
    }
}