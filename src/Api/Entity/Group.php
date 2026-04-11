<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Group extends Entity
{
    /**
     * @param list<GroupItem> $Items
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $GroupName,
        public ?string $Type,
        public array $Items,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        $items = [];
        if ($bag->has('Items')) {
            foreach ($bag->bags('Items') as $itemBag) {
                $items[] = GroupItem::fromBag($itemBag);
            }
        }

        return new self(
            bag: $bag,
            Identifier: $bag->nullableString('Identifier'),
            GroupName: $bag->nullableString('GroupName'),
            Type: $bag->nullableString('Type'),
            Items: $items,
        );
    }
}
