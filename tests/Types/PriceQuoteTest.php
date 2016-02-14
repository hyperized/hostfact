<?php

use Hyperized\Wefact\Types\PriceQuote;

class PriceQuoteTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(PriceQuote::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', PriceQuote::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', PriceQuote::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', PriceQuote::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', PriceQuote::class);
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
        $this->object = new PriceQuote();
    }

}