<?php

use Hyperized\Wefact\Types\Hosting;
use PHPUnit\Framework\TestCase;

class HostingTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Hosting::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Hosting::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Hosting::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Hosting::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Hosting::class);
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
        $this->object = new Hosting();
    }

}