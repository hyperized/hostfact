<?php

use Hyperized\Wefact\Types\Service;

class ServiceTest extends PHPUnit_Framework_TestCase
{
    protected $product;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Service::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Service::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Service::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Service::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Service::class);
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
        $this->object = new Service();
    }

}