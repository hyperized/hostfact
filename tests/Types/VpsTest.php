<?php

use Hyperized\Hostfact\Types\Vps;
use PHPUnit\Framework\TestCase;

class VpsTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Vps::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Vps::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Vps::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Vps::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Vps::class);
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
        $this->object = new Vps();
    }

}