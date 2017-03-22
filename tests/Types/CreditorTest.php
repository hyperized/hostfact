<?php

use Hyperized\Wefact\Types\Creditor;
use PHPUnit\Framework\TestCase;

class CreditorTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Creditor::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Creditor::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Creditor::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Creditor::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Creditor::class);
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
        $this->object = new Creditor();
    }

}