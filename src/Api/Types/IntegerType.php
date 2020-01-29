<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Types;

use Hyperized\Hostfact\Api\Capabilities\HasMagicGetterSetters;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

abstract class IntegerType extends BasicType
{
    use HasMagicGetterSetters;

    private $value;

    protected function getValue(): int
    {
        return $this->value;
    }

    protected function setValue(int $value): void
    {
        $validator = Validation::createValidator();

        /** @var ConstraintViolationList $violations */
        $violations = $validator->validate($value, [
            new NotNull()
        ]);
        $this->validateConstraintViolationList($violations);

        $this->value = $value;
    }
}
