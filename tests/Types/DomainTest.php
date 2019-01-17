<?php

use Hyperized\Hostfact\Controllers\Domain;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Domain::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Domain::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Domain::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Domain::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Domain::class);
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
        $this->object = new Domain();
    }

}