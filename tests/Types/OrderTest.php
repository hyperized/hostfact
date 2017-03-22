<?php

use Hyperized\Wefact\Types\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Order::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Order::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Order::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Order::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Order::class);
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
        $this->object = new Order();
    }

}