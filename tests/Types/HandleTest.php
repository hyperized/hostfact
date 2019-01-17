<?php

use Hyperized\Hostfact\Controllers\Handle;
use PHPUnit\Framework\TestCase;

class HandleTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Handle::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Handle::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Handle::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Handle::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Handle::class);
    }

    public function testObjectHasAllowed(): void
    {
        self::assertObjectHasAttribute('allowed', $this->object);
    }

    // Test if after initiating the Object has the following attributes:

    public function testObjectHasResponse(): void
    {
        self::assertObjectNotHasAttribute('response', $this->object);
    }

    protected function setUp()
    {
        $this->object = new Handle();
    }

}