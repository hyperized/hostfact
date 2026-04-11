<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Entity\Enum\ProductType;
use Hyperized\Hostfact\Api\Entity\Order;
use Hyperized\Hostfact\Api\Entity\OrderLine;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class OrderEntityTest extends TestCase
{
    public function testFromBagHydratesOrderLines(): void
    {
        $bag = new DataBag([
            'Identifier' => '7',
            'OrderCode' => 'O0001',
            'OrderLines' => [
                [
                    'Identifier' => '1',
                    'Description' => 'Hosting package',
                    'PriceExcl' => '99.00',
                    'TaxPercentage' => '21',
                    'Periods' => '12',
                    'Periodic' => 'm',
                    'ProductType' => 'hosting',
                ],
            ],
        ]);

        $order = Order::fromBag($bag);

        self::assertSame(7, $order->Identifier);
        self::assertSame('O0001', $order->OrderCode);
        self::assertCount(1, $order->OrderLines);
        self::assertInstanceOf(OrderLine::class, $order->OrderLines[0]);
        self::assertSame(1, $order->OrderLines[0]->Identifier);
        self::assertSame('Hosting package', $order->OrderLines[0]->Description);
        self::assertSame('99.00', $order->OrderLines[0]->PriceExcl);
        self::assertSame(12, $order->OrderLines[0]->Periods);
        self::assertSame(Periodic::Month, $order->OrderLines[0]->Periodic);
        self::assertSame(ProductType::Hosting, $order->OrderLines[0]->ProductType);
    }

    public function testFromBagWithoutOrderLines(): void
    {
        $order = Order::fromBag(new DataBag([]));

        self::assertEmpty($order->OrderLines);
    }

    public function testOrderLineBagIsAccessible(): void
    {
        $bag = new DataBag([
            'OrderLines' => [
                ['Identifier' => '1', 'Custom' => 'value'],
            ],
        ]);

        $order = Order::fromBag($bag);

        self::assertSame('value', $order->OrderLines[0]->bag->string('Custom'));
    }
}
