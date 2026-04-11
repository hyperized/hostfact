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
}
