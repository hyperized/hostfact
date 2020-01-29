<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Types;

use Hyperized\Hostfact\Api\Capabilities\HasMagicGetterSetters;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

abstract class StringType extends BasicType
{
    use HasMagicGetterSetters;

    private $value;

    public function __toString(): string
    {
        return $this->value;
    }

    protected function getValue(): string
    {
        return $this->value;
    }

    protected function setValue(string $value): void
    {
        $validator = Validation::createValidator();

        /** @var ConstraintViolationList $violations */
        $violations = $validator->validate($value, [
            new NotBlank()
        ]);
        $this->validateConstraintViolationList($violations);

        $this->value = $value;
    }
}
