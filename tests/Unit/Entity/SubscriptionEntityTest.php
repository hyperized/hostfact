<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Entity\Hosting;
use Hyperized\Hostfact\Api\Entity\Subscription;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class SubscriptionEntityTest extends TestCase
{
    public function testFromBagExtractsAllFields(): void
    {
        $bag = new DataBag([
            'Number' => '1',
            'ProductCode' => 'P002',
            'Description' => 'Hosting small',
            'PriceExcl' => '25',
            'PriceIncl' => '30.25',
            'TaxPercentage' => '21',
            'Periods' => '1',
            'Periodic' => 'm',
            'StartPeriod' => '2018-03-14',
            'EndPeriod' => '2018-04-14',
            'InvoiceAuthorisation' => 'yes',
        ]);

        $sub = Subscription::fromBag($bag);

        self::assertSame(1, $sub->Number);
        self::assertSame('P002', $sub->ProductCode);
        self::assertSame('25', $sub->PriceExcl);
        self::assertSame('30.25', $sub->PriceIncl);
        self::assertSame(Periodic::Month, $sub->Periodic);
        self::assertSame(true, $sub->InvoiceAuthorisation);
    }

    public function testMissingFieldsReturnNull(): void
    {
        $sub = Subscription::fromBag(new DataBag([]));

        self::assertNull($sub->Number);
        self::assertNull($sub->ProductCode);
        self::assertNull($sub->PriceExcl);
        self::assertNull($sub->Periodic);
    }

    public function testBagIsAccessible(): void
    {
        $bag = new DataBag(['Number' => '1', 'Extra' => 'val']);
        $sub = Subscription::fromBag($bag);

        self::assertSame('val', $sub->bag->string('Extra'));
    }

    public function testHostingEntityHydratesSubscription(): void
    {
        $bag = new DataBag([
            'Identifier' => '2',
            'DebtorCode' => 'DB0001',
            'Subscription' => [
                'ProductCode' => 'P002',
                'PriceExcl' => '25',
                'Periodic' => 'm',
            ],
        ]);

        $hosting = Hosting::fromBag($bag);

        self::assertInstanceOf(Subscription::class, $hosting->Subscription);
        self::assertSame('P002', $hosting->Subscription->ProductCode);
        self::assertSame('25', $hosting->Subscription->PriceExcl);
    }

    public function testHostingWithoutSubscriptionIsNull(): void
    {
        $hosting = Hosting::fromBag(new DataBag(['Identifier' => '1']));

        self::assertNull($hosting->Subscription);
    }
}
