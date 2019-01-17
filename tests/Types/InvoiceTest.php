<?php

use Hyperized\Hostfact\Controllers\Invoice;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Invoice::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Invoice::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Invoice::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Invoice::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Invoice::class);
    }

    public function testObjectHasAllowed(): void
    {
        self::assertObjectHasAttribute('allowed', $this->object);
    }

    // Test if after initiating the Object has the following attributes:

    public function testObjectHasResponse(): void
    {
        self::assertObjectNotHasAttribute('response', $this->object);
    }

    protected function setUp()
    {
        $this->object = new Invoice();
    }

}