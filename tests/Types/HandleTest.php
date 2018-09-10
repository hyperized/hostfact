<?php

use Hyperized\Hostfact\Types\Handle;
use PHPUnit\Framework\TestCase;

class HandleTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Handle::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Handle::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Handle::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Handle::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Handle::class);
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
        $this->object = new Handle();
    }

}