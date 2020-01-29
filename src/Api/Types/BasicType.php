<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Types;

use ArrayIterator;
use Exception;
use InvalidArgumentException;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

class BasicType
{
    /**
     * @param ConstraintViolationList $violations
     */
    protected function validateConstraintViolationList(ConstraintViolationList $violations): void
    {
        if (0 !== $violations->count()) {
            try {
                /** @var ArrayIterator $iterator */
                $iterator = $violations->getIterator();
            } catch (Exception $exception) {
                throw new InvalidArgumentException('Could not instantiate validator iterator');
            }

            if (!$iterator->valid()) {
                throw new InvalidArgumentException('No valid error found in validator violation constraint');
            }

            /** @var ConstraintViolation $current */
            $current = $iterator->current();

            throw new InvalidArgumentException($current->getMessage());
        }
    }
}