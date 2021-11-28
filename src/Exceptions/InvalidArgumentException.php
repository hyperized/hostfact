<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Exceptions;

use GuzzleHttp\Exception\GuzzleException;

class InvalidArgumentException extends \InvalidArgumentException
{
    public static function invalidUrl(string $value): InvalidArgumentException
    {
        return new self('Provided URL is not valid [' . $value . ']');
    }

    public static function apiFailed(GuzzleException $exception): InvalidArgumentException
    {
        return new self('API call returned an invalid response: ' . $exception->getMessage() . '.');
    }

    public static function configVariableNotAString(): InvalidArgumentException
    {
        return new self('Provided config field is not a string');
    }
}
