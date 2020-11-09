<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\UI\Rest;

use Appto\Office\Application\Query\GetOffice;
use Appto\Office\Application\Query\GetOfficeRequest;
use Appto\Office\Domain\NotFoundOfficeException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        try {
            $office = $getOffice(new GetOfficeRequest($id));
        }catch (NotFoundOfficeException $e){
            throw new NotFoundHttpException($e->getMessage(), $e);
        }
        return new JsonResponse($office, Response::HTTP_OK);
    }
}