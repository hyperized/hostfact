<?php

use Hyperized\Hostfact\Types\PriceQuote;
use PHPUnit\Framework\TestCase;

class PriceQuoteTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(PriceQuote::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', PriceQuote::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', PriceQuote::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', PriceQuote::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', PriceQuote::class);
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
        $this->object = new PriceQuote();
    }

}