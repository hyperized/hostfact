<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Response;

use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class DataBagTest extends TestCase
{
    public function testStringReturnsValue(): void
    {
        $bag = new DataBag(['Name' => 'Test']);
        self::assertSame('Test', $bag->string('Name'));
    }

    public function testStringCastsIntToString(): void
    {
        $bag = new DataBag(['Code' => 123]);
        self::assertSame('123', $bag->string('Code'));
    }

    public function testStringThrowsOnMissingKey(): void
    {
        $bag = new DataBag([]);

        try {
            $bag->string('Name');
            self::fail('Expected InvalidArgumentException was not thrown');
        } catch (\InvalidArgumentException $e) {
            self::assertSame("Required field 'Name' is missing", $e->getMessage());
        }
    }

    public function testStringThrowsOnNonScalar(): void
    {
        $bag = new DataBag(['Name' => ['array']]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Field 'Name' cannot be cast to string");
        $bag->string('Name');
    }

    public function testIntThrowsOnNonScalar(): void
    {
        $bag = new DataBag(['Id' => ['array']]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Field 'Id' cannot be cast to int");
        $bag->int('Id');
    }

    public function testFloatThrowsOnNonScalar(): void
    {
        $bag = new DataBag(['Price' => ['array']]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Field 'Price' cannot be cast to float");
        $bag->float('Price');
    }

    public function testBoolThrowsOnNonScalar(): void
    {
        $bag = new DataBag(['Flag' => ['array']]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("cannot be cast to bool");
        $bag->bool('Flag');
    }

    public function testIntReturnsValue(): void
    {
        $bag = new DataBag(['Identifier' => 42]);
        self::assertSame(42, $bag->int('Identifier'));
    }

    public function testIntCastsStringToInt(): void
    {
        $bag = new DataBag(['Identifier' => '42']);
        self::assertSame(42, $bag->int('Identifier'));
    }

    public function testFloatReturnsValue(): void
    {
        $bag = new DataBag(['PriceExcl' => 49.99]);
        self::assertSame(49.99, $bag->float('PriceExcl'));
    }

    public function testFloatCastsStringToFloat(): void
    {
        $bag = new DataBag(['PriceExcl' => '49.99']);
        self::assertSame(49.99, $bag->float('PriceExcl'));
    }

    public function testBoolHandlesYesNo(): void
    {
        $bag = new DataBag(['AutoRenew' => 'yes', 'Blocked' => 'no']);
        self::assertTrue($bag->bool('AutoRenew'));
        self::assertFalse($bag->bool('Blocked'));
    }

    public function testBoolHandlesTrueFalse(): void
    {
        $bag = new DataBag(['Active' => true, 'Deleted' => false]);
        self::assertTrue($bag->bool('Active'));
        self::assertFalse($bag->bool('Deleted'));
    }

    public function testBoolHandlesOneZero(): void
    {
        $bag = new DataBag(['Flag' => 1, 'Off' => 0]);
        self::assertTrue($bag->bool('Flag'));
        self::assertFalse($bag->bool('Off'));
    }

    public function testBoolHandlesStringOneZero(): void
    {
        $bag = new DataBag(['Flag' => '1', 'Off' => '0']);
        self::assertTrue($bag->bool('Flag'));
        self::assertFalse($bag->bool('Off'));
    }

    public function testBoolThrowsOnUnexpectedValue(): void
    {
        $bag = new DataBag(['Status' => 'maybe']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Field 'Status' cannot be cast to bool, got: 'maybe'");
        $bag->bool('Status');
    }

    public function testNullableStringReturnsValue(): void
    {
        $bag = new DataBag(['Comment' => 'hello']);
        self::assertSame('hello', $bag->nullableString('Comment'));
    }

    public function testNullableStringReturnsNullForMissing(): void
    {
        $bag = new DataBag([]);
        self::assertNull($bag->nullableString('Comment'));
    }

    public function testNullableStringReturnsNullForNull(): void
    {
        $bag = new DataBag(['Comment' => null]);
        self::assertNull($bag->nullableString('Comment'));
    }

    public function testNullableStringCastsIntToString(): void
    {
        $bag = new DataBag(['Code' => 123]);
        self::assertSame('123', $bag->nullableString('Code'));
    }

    public function testNullableStringThrowsOnNonScalar(): void
    {
        $bag = new DataBag(['Data' => ['nested']]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Field 'Data' cannot be cast to string");
        $bag->nullableString('Data');
    }

    public function testNullableIntReturnsValue(): void
    {
        $bag = new DataBag(['PackageID' => 5]);
        self::assertSame(5, $bag->nullableInt('PackageID'));
    }

    public function testNullableIntReturnsNullForMissing(): void
    {
        $bag = new DataBag([]);
        self::assertNull($bag->nullableInt('PackageID'));
    }

    public function testNullableIntReturnsNullForNull(): void
    {
        $bag = new DataBag(['PackageID' => null]);
        self::assertNull($bag->nullableInt('PackageID'));
    }

    public function testNullableIntCastsStringToInt(): void
    {
        $bag = new DataBag(['PackageID' => '42']);
        self::assertSame(42, $bag->nullableInt('PackageID'));
    }

    public function testNullableIntThrowsOnNonScalar(): void
    {
        $bag = new DataBag(['Data' => ['nested']]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Field 'Data' cannot be cast to int");
        $bag->nullableInt('Data');
    }

    public function testArrayReturnsValue(): void
    {
        $bag = new DataBag(['Groups' => ['A', 'B']]);
        self::assertSame(['A', 'B'], $bag->array('Groups'));
    }

    public function testArrayThrowsOnNonArray(): void
    {
        $bag = new DataBag(['Groups' => 'notarray']);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('not an array');
        $bag->array('Groups');
    }

    public function testBagReturnsNestedDataBag(): void
    {
        $bag = new DataBag(['Subscription' => ['ProductCode' => 'P001', 'PriceExcl' => 10.0]]);
        $sub = $bag->bag('Subscription');

        self::assertInstanceOf(DataBag::class, $sub);
        self::assertSame('P001', $sub->string('ProductCode'));
        self::assertSame(10.0, $sub->float('PriceExcl'));
    }

    public function testBagsReturnsListOfDataBags(): void
    {
        $bag = new DataBag([
            'Lines' => [
                ['Description' => 'Line 1'],
                ['Description' => 'Line 2'],
            ],
        ]);

        $lines = $bag->bags('Lines');
        self::assertCount(2, $lines);
        self::assertSame('Line 1', $lines[0]->string('Description'));
        self::assertSame('Line 2', $lines[1]->string('Description'));
    }

    public function testBagsWithStringKeysReindexesNumerically(): void
    {
        $bag = new DataBag([
            'Lines' => [
                'first' => ['Description' => 'A'],
                'second' => ['Description' => 'B'],
            ],
        ]);

        $lines = $bag->bags('Lines');
        self::assertCount(2, $lines);
        self::assertSame('A', $lines[0]->string('Description'));
        self::assertSame('B', $lines[1]->string('Description'));
    }

    public function testBagsSkipsNonArrayItems(): void
    {
        $bag = new DataBag([
            'Lines' => [
                ['Description' => 'Valid'],
                'not an array',
                42,
            ],
        ]);

        $lines = $bag->bags('Lines');
        self::assertCount(1, $lines);
        self::assertSame('Valid', $lines[0]->string('Description'));
    }

    public function testHasReturnsTrueForExistingKey(): void
    {
        $bag = new DataBag(['Name' => 'Test']);
        self::assertTrue($bag->has('Name'));
    }

    public function testHasReturnsFalseForMissingKey(): void
    {
        $bag = new DataBag([]);
        self::assertFalse($bag->has('Name'));
    }

    public function testToArrayReturnsRawData(): void
    {
        $data = ['Identifier' => 1, 'Name' => 'Test'];
        $bag = new DataBag($data);
        self::assertSame($data, $bag->toArray());
    }

    public function testArrayAccessOffsetExists(): void
    {
        $bag = new DataBag(['Name' => 'Test']);
        self::assertTrue(isset($bag['Name']));
        self::assertFalse(isset($bag['Missing']));
    }

    public function testArrayAccessOffsetGet(): void
    {
        $bag = new DataBag(['Name' => 'Test']);
        self::assertSame('Test', $bag['Name']);
    }

    public function testArrayAccessOffsetGetReturnsNullForMissing(): void
    {
        $bag = new DataBag([]);
        self::assertNull($bag['Missing']);
    }

    public function testArrayAccessOffsetSetThrows(): void
    {
        $bag = new DataBag([]);
        $this->expectException(\LogicException::class);
        $bag['Name'] = 'Test';
    }

    public function testArrayAccessOffsetUnsetThrows(): void
    {
        $bag = new DataBag(['Name' => 'Test']);
        $this->expectException(\LogicException::class);
        unset($bag['Name']);
    }

    public function testCountReturnsFieldCount(): void
    {
        $bag = new DataBag(['A' => 1, 'B' => 2, 'C' => 3]);
        self::assertCount(3, $bag);
    }

    public function testCountReturnsZeroForEmpty(): void
    {
        $bag = new DataBag([]);
        self::assertCount(0, $bag);
    }
}
