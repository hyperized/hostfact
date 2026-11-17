<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Exceptions;

use GuzzleHttp\Exception\GuzzleException;

class InvalidArgumentException extends \InvalidArgumentException
{
    public static function apiFailed(GuzzleException $exception): InvalidArgumentException
    {
        return new self('API call failed: ' . $exception->getCode(), previous: $exception);
    }

    public static function configVariableNotAString(): InvalidArgumentException
    {
        return new self('Provided config field is not a string');
    }

    public static function formParameterNotEncodable(string $name): InvalidArgumentException
    {
        return new self('Form parameter "' . $name . '" must be a scalar, an array or null');
    }
}
