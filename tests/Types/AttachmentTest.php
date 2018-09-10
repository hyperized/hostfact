<?php

namespace Hyperized\Hostfact\Types;

use PHPUnit\Framework\TestCase;

/**
 * Class AttachmentTest
 * @package Hyperized\Hostfact\Types
 */
class AttachmentTest extends TestCase
{
    protected $product;
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Attachment::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Attachment::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Attachment::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Attachment::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Attachment::class);
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
        $this->object = new Attachment();
    }

}