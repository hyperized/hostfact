<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Entity\PriceQuote;
use Hyperized\Hostfact\Api\Entity\PriceQuoteLine;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class PriceQuoteEntityTest extends TestCase
{
    public function testFromBagHydratesPriceQuoteLines(): void
    {
        $bag = new DataBag([
            'Identifier' => '3',
            'PriceQuoteCode' => 'PQ0001',
            'PriceQuoteLines' => [
                [
                    'Identifier' => '1',
                    'Description' => 'Web development',
                    'PriceExcl' => '1500.00',
                    'TaxPercentage' => '21',
                    'Periods' => '1',
                    'Periodic' => 'j',
                    'StartPeriod' => '2024-01-01',
                    'EndPeriod' => '2024-12-31',
                ],
            ],
        ]);

        $quote = PriceQuote::fromBag($bag);

        self::assertSame(3, $quote->Identifier);
        self::assertSame('PQ0001', $quote->PriceQuoteCode);
        self::assertCount(1, $quote->PriceQuoteLines);
        self::assertInstanceOf(PriceQuoteLine::class, $quote->PriceQuoteLines[0]);
        self::assertSame(1, $quote->PriceQuoteLines[0]->Identifier);
        self::assertSame('Web development', $quote->PriceQuoteLines[0]->Description);
        self::assertSame('1500.00', $quote->PriceQuoteLines[0]->PriceExcl);
        self::assertSame(1, $quote->PriceQuoteLines[0]->Periods);
        self::assertSame(Periodic::Year, $quote->PriceQuoteLines[0]->Periodic);
        self::assertInstanceOf(\DateTimeImmutable::class, $quote->PriceQuoteLines[0]->StartPeriod);
        self::assertInstanceOf(\DateTimeImmutable::class, $quote->PriceQuoteLines[0]->EndPeriod);
    }

    public function testFromBagWithoutPriceQuoteLines(): void
    {
        $quote = PriceQuote::fromBag(new DataBag([]));

        self::assertEmpty($quote->PriceQuoteLines);
    }

    public function testPriceQuoteLineBagIsAccessible(): void
    {
        $bag = new DataBag([
            'PriceQuoteLines' => [
                ['Identifier' => '1', 'Extra' => 'info'],
            ],
        ]);

        $quote = PriceQuote::fromBag($bag);

        self::assertSame('info', $quote->PriceQuoteLines[0]->bag->string('Extra'));
    }
}
