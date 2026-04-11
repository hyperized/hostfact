<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Invoice;
use Hyperized\Hostfact\Api\Entity\InvoiceLine;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class InvoiceEntityTest extends TestCase
{
    public function testFromBagExtractsScalarFields(): void
    {
        $bag = new DataBag([
            'Identifier' => '10',
            'InvoiceCode' => 'F0001',
            'DebtorCode' => 'DB0001',
            'Status' => '2',
            'AmountExcl' => '100.00',
            'AmountIncl' => '121.00',
        ]);

        $invoice = Invoice::fromBag($bag);

        self::assertSame('10', $invoice->Identifier);
        self::assertSame('F0001', $invoice->InvoiceCode);
        self::assertSame('DB0001', $invoice->DebtorCode);
        self::assertSame('100.00', $invoice->AmountExcl);
        self::assertEmpty($invoice->InvoiceLines);
    }

    public function testFromBagHydratesInvoiceLines(): void
    {
        $bag = new DataBag([
            'Identifier' => '10',
            'InvoiceLines' => [
                [
                    'Identifier' => '1',
                    'Description' => 'Web hosting',
                    'PriceExcl' => '49.99',
                    'TaxPercentage' => '21',
                    'ProductCode' => 'P001',
                ],
                [
                    'Identifier' => '2',
                    'Description' => 'Domain .nl',
                    'PriceExcl' => '9.95',
                    'TaxPercentage' => '21',
                ],
            ],
        ]);

        $invoice = Invoice::fromBag($bag);

        self::assertCount(2, $invoice->InvoiceLines);
        self::assertInstanceOf(InvoiceLine::class, $invoice->InvoiceLines[0]);
        self::assertSame('Web hosting', $invoice->InvoiceLines[0]->Description);
        self::assertSame('49.99', $invoice->InvoiceLines[0]->PriceExcl);
        self::assertSame('P001', $invoice->InvoiceLines[0]->ProductCode);
        self::assertSame('Domain .nl', $invoice->InvoiceLines[1]->Description);
    }

    public function testInvoiceLineAccessesUndocumentedFields(): void
    {
        $bag = new DataBag([
            'InvoiceLines' => [
                [
                    'Identifier' => '1',
                    'CustomField' => 'extra',
                ],
            ],
        ]);

        $invoice = Invoice::fromBag($bag);
        $line = $invoice->InvoiceLines[0];

        self::assertSame('extra', $line->bag->string('CustomField'));
    }

    public function testMissingNestedArraysDefaultToEmpty(): void
    {
        $invoice = Invoice::fromBag(new DataBag([]));

        self::assertEmpty($invoice->InvoiceLines);
        self::assertEmpty($invoice->Attachments);
        self::assertEmpty($invoice->Translations);
        self::assertEmpty($invoice->UsedTaxrates);
    }
}
