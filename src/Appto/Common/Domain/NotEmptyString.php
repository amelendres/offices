<?php
declare(strict_types=1);

namespace Appto\Common\Domain;

abstract class NotEmptyString extends StringValueObject
{
    protected function guard(string $value): void {
        if ( '' === $value){
            throw new EmptyValueException();
        }
    }
}