<?php

use Hyperized\Wefact\Types\Subscription;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Subscription::class, $this->object);
    }

    // Test if product initiates
    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Subscription::class);
    }

    // Testing availability of public class attributes
    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Subscription::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Subscription::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Subscription::class);
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
        $this->object = new Subscription();
    }
}