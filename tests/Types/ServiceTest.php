<?php

use Hyperized\Wefact\Types\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Service::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Service::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Service::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Service::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Service::class);
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
        $this->object = new Service();
    }

}