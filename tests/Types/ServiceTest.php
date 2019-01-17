<?php

use Hyperized\Hostfact\Controllers\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Service::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Service::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Service::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Service::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Service::class);
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
        $this->object = new Service();
    }

}