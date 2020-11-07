<?php
declare(strict_types=1);

namespace Appto\Office\Domain;

class OfficeAlreadyExistsException extends \DomainException
{
    public function __construct(string $value)
    {
        parent::__construct("Office with id <$value> already exists");
    }
}