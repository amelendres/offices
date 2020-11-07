<?php
declare(strict_types=1);

namespace Appto\Office\Domain;

interface OfficeRepository
{
    public function save(Office $office): void;
    public function find(string $officeId): ?Office;
}