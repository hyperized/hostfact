<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\ValueObjects\Abstracts\Strings\AbstractByteArray;

class Url extends AbstractByteArray
{
    protected static function validate(string $value): void
    {
        parent::validate($value);

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            throw InvalidArgumentException::invalidUrl($value);
        }
    }
}
