<?php

use Hyperized\Hostfact\Controllers\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Product::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Product::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Product::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Product::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Product::class);
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
        $this->object = new Product();
    }

}