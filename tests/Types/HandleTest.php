<?php

use Hyperized\Wefact\Types\Handle;

class HandleTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Handle::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Handle::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Handle::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Handle::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Handle::class);
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
        $this->object = new Handle();
    }

}