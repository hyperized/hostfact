<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Exceptions;

use GuzzleHttp\Exception\GuzzleException;

class InvalidArgumentException extends \InvalidArgumentException
{
    public static function invalidUrl(string $value): InvalidArgumentException
    {
        return new self('Provided URL is not valid [' . $value . ']');
    }

    public static function notSupported(): InvalidArgumentException
    {
        return new self('Not supported');
    }

    public static function apiFailed(GuzzleException $exception): InvalidArgumentException
    {
        return new self('API call returned an invalid response: ' . $exception->getMessage() . '.');
    }
}
