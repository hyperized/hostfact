<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Creditor;
use Hyperized\Hostfact\Api\Entity\Debtor;
use Hyperized\Hostfact\Api\Entity\Domain;
use Hyperized\Hostfact\Api\Entity\Entity;
use Hyperized\Hostfact\Api\Entity\EntityFactory;
use Hyperized\Hostfact\Api\Entity\Group;
use Hyperized\Hostfact\Api\Entity\Hosting;
use Hyperized\Hostfact\Api\Entity\Invoice;
use Hyperized\Hostfact\Api\Entity\Order;
use Hyperized\Hostfact\Api\Entity\PriceQuote;
use Hyperized\Hostfact\Api\Entity\Product;
use Hyperized\Hostfact\Api\Entity\Ssl;
use Hyperized\Hostfact\Api\Entity\Ticket;
use Hyperized\Hostfact\Api\Entity\Vps;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EntityFactoryTest extends TestCase
{
    /**
     * @return array<string, array{0: string, 1: class-string}>
     */
    public static function controllerEntityProvider(): array
    {
        return [
            'product' => ['product', Product::class],
            'debtor' => ['debtor', Debtor::class],
            'invoice' => ['invoice', Invoice::class],
            'domain' => ['domain', Domain::class],
            'hosting' => ['hosting', Hosting::class],
            'ssl' => ['ssl', Ssl::class],
            'vps' => ['vps', Vps::class],
            'ticket' => ['ticket', Ticket::class],
            'order' => ['order', Order::class],
            'pricequote' => ['pricequote', PriceQuote::class],
            'creditor' => ['creditor', Creditor::class],
            'group' => ['group', Group::class],
        ];
    }

    /**
     * @param class-string $expectedClass
     */
    #[DataProvider('controllerEntityProvider')]
    public function testFactoryReturnsCorrectEntityType(string $controller, string $expectedClass): void
    {
        $bag = new DataBag(['Identifier' => '1']);
        $entity = EntityFactory::fromBag($controller, $bag);

        self::assertInstanceOf($expectedClass, $entity);
    }

    #[DataProvider('controllerEntityProvider')]
    public function testEntityBagIsAccessible(string $controller, string $expectedClass): void
    {
        $bag = new DataBag(['Identifier' => '42']);
        $entity = EntityFactory::fromBag($controller, $bag);

        self::assertInstanceOf(Entity::class, $entity);
        self::assertSame('42', $entity->bag->string('Identifier'));
    }

    public function testUnknownControllerReturnsBag(): void
    {
        $bag = new DataBag(['Identifier' => '1']);
        $result = EntityFactory::fromBag('creditinvoice', $bag);

        self::assertInstanceOf(DataBag::class, $result);
        self::assertSame($bag, $result);
    }

    public function testServiceControllerReturnsBag(): void
    {
        $bag = new DataBag(['Identifier' => '1']);
        $result = EntityFactory::fromBag('service', $bag);

        self::assertInstanceOf(DataBag::class, $result);
    }

    public function testHandleControllerReturnsBag(): void
    {
        $bag = new DataBag(['Identifier' => '1']);
        $result = EntityFactory::fromBag('handle', $bag);

        self::assertInstanceOf(DataBag::class, $result);
    }
}
