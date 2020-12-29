<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Exceptions;

class InvalidArgumentException extends \InvalidArgumentException
{
    public static function invalidUrl(): InvalidArgumentException
    {
        return new self('Provided URL is not valid');
    }
}
