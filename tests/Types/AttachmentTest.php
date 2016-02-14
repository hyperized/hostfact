<?php

namespace Hyperized\Wefact\Types;

class AttachmentTest extends \PHPUnit_Framework_TestCase
{
    protected $product;
    protected $object;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Attachment::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Attachment::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Attachment::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Attachment::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Attachment::class);
    }

    public function testObjectHasAllowed()
    {
        $this->assertObjectHasAttribute('allowed', $this->object);
    }

    // Test if after initiating the Object has the following attributes:

    public function testObjectHasResponse()
    {
        $this->assertObjectNotHasAttribute('response', $this->object);
    }

    protected function setUp()
    {
        $this->object = new Attachment();
    }

}