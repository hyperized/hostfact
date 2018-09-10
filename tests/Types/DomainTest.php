<?php

use Hyperized\Hostfact\Types\Domain;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Domain::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Domain::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Domain::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Domain::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Domain::class);
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
        $this->object = new Domain();
    }

}