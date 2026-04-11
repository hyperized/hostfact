<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

abstract readonly class Entity
{
    public DataBag $bag;

    protected function __construct(DataBag $bag)
    {
        $this->bag = $bag;
    }

    abstract public static function fromBag(DataBag $bag): static;

    /**
     * @template T of \BackedEnum
     * @param class-string<T> $enumClass
     * @return T|null
     */
    protected static function nullableEnum(DataBag $bag, string $key, string $enumClass): ?\BackedEnum
    {
        $value = $bag->nullableString($key);

        if ($value === null) {
            return null;
        }

        $backing = (new \ReflectionEnum($enumClass))->getBackingType();

        if ($backing instanceof \ReflectionNamedType && $backing->getName() === 'int') {
            return $enumClass::tryFrom((int) $value);
        }

        return $enumClass::tryFrom($value);
    }
}
