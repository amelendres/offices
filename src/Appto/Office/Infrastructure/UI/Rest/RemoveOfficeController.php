<?php
declare(strict_types=1);

namespace Appto\Office\Infrastructure\UI\Rest;

use Appto\Office\Application\Command\RemoveOffice;
use Appto\Office\Application\Command\RemoveOfficeRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/offices", name="offices_"
 * )
 */
class RemoveOfficeController
{
    /**
     * @Route(
     *     "/{id}",
     *     methods={"DELETE"},
     *     name="delete"
     * )
     */
    public function __invoke(string $id, Request $request, RemoveOffice $removeOffice)
    {
        $removeOffice(new RemoveOfficeRequest($id));

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}