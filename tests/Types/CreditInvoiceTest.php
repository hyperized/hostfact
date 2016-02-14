<?php

use Hyperized\Wefact\Types\CreditInvoice;

class CreditInvoiceTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(CreditInvoice::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', CreditInvoice::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', CreditInvoice::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', CreditInvoice::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', CreditInvoice::class);
    }

    public function testObjectHasAllowed()
    {
        $this->assertObjectHasAttribute('allowed', $this->object);
    }

    // Test if after initiating the Object has the following attributes:

    public function testObjectHasResponse()
    {
        $this->assertObjectNotHasAttribute('response', $this->object);
    }

    protected function setUp()
    {
        $this->object = new CreditInvoice();
    }

}