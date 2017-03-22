<?php

use Hyperized\Wefact\Types\Invoice;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Invoice::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Invoice::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Invoice::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Invoice::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Invoice::class);
    }

    public function testObjectHasAllowed()
    {
        self::assertObjectHasAttribute('allowed', $this->object);
    }

    // Test if after initiating the Object has the following attributes:

    public function testObjectHasResponse()
    {
        self::assertObjectNotHasAttribute('response', $this->object);
    }

    protected function setUp()
    {
        $this->object = new Invoice();
    }

}