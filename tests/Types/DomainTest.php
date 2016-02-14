<?php

use Hyperized\Wefact;
use Hyperized\Wefact\Types\Domain;

class DomainTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Domain();
    }

    // Test if product initiates
    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Domain::class, $this->object);
    }

    // Testing availability of public class attributes
    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Domain::class);
    }

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Domain::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Domain::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Domain::class);
    }

    // Test if after initiating the Object has the following attributes:
    public function testObjectHasAllowed()
    {
        $this->assertObjectHasAttribute('allowed', $this->object);
    }

    public function testObjectHasResponse()
    {
        $this->assertObjectNotHasAttribute('response', $this->object);
    }

}