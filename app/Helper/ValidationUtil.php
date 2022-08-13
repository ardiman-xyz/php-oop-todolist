<?php

namespace App\Helper;

use App\Exception\ValidationException;
use ReflectionClass;
use ReflectionProperty;

class ValidationUtil
{
    static function validationReflection($request)
    {
        $reflection = new ReflectionClass($request);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if (!$property->isInitialized($request)) {
                throw new ValidationException("$property->name is not set");
            } else if ($property->getValue($request) === null || trim(
                $property->getValue($request) == ''
            )) {
                throw new ValidationException("$property->name is null");
            }
        }
    }
}
