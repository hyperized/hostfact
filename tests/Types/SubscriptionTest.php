<?php

use Hyperized\Hostfact\Controllers\Subscription;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Subscription::class, $this->object);
    }

    // Test if product initiates
    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Subscription::class);
    }

    // Testing availability of public class attributes
    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Subscription::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Subscription::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Subscription::class);
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
        $this->object = new Subscription();
    }
}