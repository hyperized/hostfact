<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Entity\Enum\ProductType;
use Hyperized\Hostfact\Api\Entity\Product;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class ProductEntityTest extends TestCase
{
    public function testFromBagExtractsAllFields(): void
    {
        $bag = new DataBag([
            'Identifier' => '3',
            'ProductCode' => 'P001',
            'ProductName' => 'Hosting Basic',
            'ProductKeyPhrase' => 'Basic hosting',
            'ProductDescription' => 'A basic plan',
            'NumberSuffix' => '',
            'PriceExcl' => '250',
            'PricePeriod' => 'm',
            'TaxPercentage' => '21',
            'Cost' => '0',
            'ProductType' => 'hosting',
            'ProductTld' => '',
            'PackageID' => '1',
            'HasCustomPrice' => 'no',
            'Created' => '2022-11-24 11:00:00',
            'Modified' => '2022-11-24 11:00:00',
            'Groups' => [],
            'Translations' => [
                ['ProductType' => 'Hosting', 'PricePeriod' => 'per maand'],
            ],
        ]);

        $product = Product::fromBag($bag);

        self::assertSame(3, $product->Identifier);
        self::assertSame('P001', $product->ProductCode);
        self::assertSame('Hosting Basic', $product->ProductName);
        self::assertSame('Basic hosting', $product->ProductKeyPhrase);
        self::assertSame('250', $product->PriceExcl);
        self::assertSame('21', $product->TaxPercentage);
        self::assertSame(ProductType::Hosting, $product->ProductType);
        self::assertSame(false, $product->HasCustomPrice);
        self::assertInstanceOf(\DateTimeImmutable::class, $product->Created);
        self::assertSame('2022-11-24 11:00:00', $product->Created->format('Y-m-d H:i:s'));
        self::assertEmpty($product->Groups);
        self::assertCount(1, $product->Translations);
    }

    public function testMissingFieldsReturnNull(): void
    {
        $bag = new DataBag(['Identifier' => '1']);

        $product = Product::fromBag($bag);

        self::assertSame(1, $product->Identifier);
        self::assertNull($product->ProductCode);
        self::assertNull($product->ProductName);
        self::assertNull($product->PriceExcl);
        self::assertNull($product->TaxPercentage);
        self::assertNull($product->Created);
        self::assertEmpty($product->Groups);
        self::assertEmpty($product->Translations);
    }

    public function testBagPropertyProvidesRawAccess(): void
    {
        $bag = new DataBag([
            'Identifier' => '1',
            'UndocumentedField' => 'secret',
        ]);

        $product = Product::fromBag($bag);

        self::assertSame('secret', $product->bag->string('UndocumentedField'));
    }

    public function testEmptyBagProducesAllNulls(): void
    {
        $product = Product::fromBag(new DataBag([]));

        self::assertNull($product->Identifier);
        self::assertNull($product->ProductCode);
        self::assertNull($product->ProductName);
        self::assertEmpty($product->Groups);
    }
}
