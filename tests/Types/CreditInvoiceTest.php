<?php

use Hyperized\Wefact\Types\CreditInvoice;
use PHPUnit\Framework\TestCase;

class CreditInvoiceTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(CreditInvoice::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', CreditInvoice::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', CreditInvoice::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', CreditInvoice::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', CreditInvoice::class);
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
        $this->object = new CreditInvoice();
    }

}