<?php

use Hyperized\Wefact\Types\Hosting;

class HostingTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Hosting::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Hosting::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Hosting::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Hosting::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Hosting::class);
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
        $this->object = new Hosting();
    }

}