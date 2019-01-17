<?php

namespace Hyperized\Hostfact\Controllers;

use PHPUnit\Framework\TestCase;

/**
 * Class AttachmentTest
 * @package Hyperized\Hostfact\Types
 */
class AttachmentTest extends TestCase
{
    protected $product;
    protected $object;

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Attachment::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed(): void
    {
        self::assertClassHasAttribute('allowed', Attachment::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName(): void
    {
        self::assertClassHasAttribute('parentName', Attachment::class);
    }

    public function testClassHasNotResponse(): void
    {
        self::assertClassNotHasAttribute('response', Attachment::class);
    }

    public function testClassHasNotMode(): void
    {
        self::assertClassNotHasAttribute('mode', Attachment::class);
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
        $this->object = new Attachment();
    }

}