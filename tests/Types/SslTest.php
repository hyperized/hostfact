<?php

use Hyperized\Hostfact\Types\Ssl;
use PHPUnit\Framework\TestCase;

class SslTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Ssl::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Ssl::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Ssl::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Ssl::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Ssl::class);
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
        $this->object = new Ssl();
    }

}