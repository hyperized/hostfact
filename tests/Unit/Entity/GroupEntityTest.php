<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\GroupType;
use Hyperized\Hostfact\Api\Entity\Group;
use Hyperized\Hostfact\Api\Entity\GroupItem;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class GroupEntityTest extends TestCase
{
    public function testFromBagHydratesItems(): void
    {
        $bag = new DataBag([
            'Identifier' => '5',
            'GroupName' => 'Hosting products',
            'Type' => 'product',
            'Items' => [
                ['Identifier' => '1', 'ProductCode' => 'P001', 'ProductName' => 'Basic'],
                ['Identifier' => '2', 'ProductCode' => 'P002', 'ProductName' => 'Pro'],
            ],
        ]);

        $group = Group::fromBag($bag);

        self::assertSame(5, $group->Identifier);
        self::assertSame('Hosting products', $group->GroupName);
        self::assertSame(GroupType::Product, $group->Type);
        self::assertCount(2, $group->Items);
        self::assertInstanceOf(GroupItem::class, $group->Items[0]);
        self::assertSame(1, $group->Items[0]->Identifier);
        self::assertSame('P001', $group->Items[0]->ProductCode);
        self::assertSame('Basic', $group->Items[0]->ProductName);
        self::assertSame('P002', $group->Items[1]->ProductCode);
    }

    public function testFromBagWithoutItems(): void
    {
        $group = Group::fromBag(new DataBag(['Identifier' => '1']));

        self::assertSame(1, $group->Identifier);
        self::assertEmpty($group->Items);
    }

    public function testGroupItemBagIsAccessible(): void
    {
        $bag = new DataBag([
            'Items' => [
                ['Identifier' => '1', 'Extra' => 'data'],
            ],
        ]);

        $group = Group::fromBag($bag);

        self::assertSame('data', $group->Items[0]->bag->string('Extra'));
    }
}
