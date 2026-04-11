<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\GroupType;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Group extends Entity
{
    /**
     * @param list<GroupItem> $Items
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $GroupName,
        public ?GroupType $Type,
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
            Identifier: $bag->nullableInt('Identifier'),
            GroupName: $bag->nullableString('GroupName'),
            Type: self::nullableEnum($bag, 'Type', GroupType::class),
            Items: $items,
        );
    }
}
