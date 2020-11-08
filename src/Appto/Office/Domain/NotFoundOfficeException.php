<?php
declare(strict_types=1);

namespace Appto\Office\Domain;

class NotFoundOfficeException extends \DomainException
{
    public function __construct(string $value)
    {
        parent::__construct("Not found office <$value>");
    }
}