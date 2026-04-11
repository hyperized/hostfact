<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class GroupItem extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $ProductCode,
        public ?string $ProductName,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            ProductCode: $bag->nullableString('ProductCode'),
            ProductName: $bag->nullableString('ProductName'),
        );
    }
}
