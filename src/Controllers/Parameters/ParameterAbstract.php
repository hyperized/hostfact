<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Controllers\Parameters;

use Doctrine\Common\Annotations\AnnotationRegistry;
use InvalidArgumentException;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ParameterAbstract
 *
 * @package Hyperized\Hostfact\Endpoints\Parameters
 */
abstract class ParameterAbstract implements ParameterInterface
{
    /**
     * ParameterAbstract constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->assignValues($parameters);
        $violations = $this->validate(self::getValidator());
        self::handleViolations($violations);
    }

    /**
     * @return \Symfony\Component\Validator\Validator\RecursiveValidator|ValidatorInterface
     */
    protected static function getValidator()
    {
        self::loadAnnotations();

        return Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();
    }

    /**
     * Loads annotations
     */
    protected static function loadAnnotations(): void
    {
        /**
         * @noinspection PhpDeprecationInspection
         */
        AnnotationRegistry::registerLoader('class_exists');
    }

    /**
     * array_filter ensures the empty fields are not returned.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * @param ConstraintViolationListInterface $violations
     */
    protected static function handleViolations(ConstraintViolationListInterface $violations): void
    {
        if (\count($violations) > 0) {
            throw new InvalidArgumentException((string)$violations);
        }
    }

    /**
     * @param array $parameters
     */
    protected function assignValues(array $parameters): void
    {
        foreach ($parameters as $my_key => $value) {
            $this->$my_key = $value;
        }
    }

    /**
     * @param  ValidatorInterface $validator
     * @return ConstraintViolationListInterface
     */
    protected function validate(ValidatorInterface $validator): ConstraintViolationListInterface
    {
        return $validator->validate($this);
    }
}
