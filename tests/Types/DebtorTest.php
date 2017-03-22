<?php

use Hyperized\Wefact\Types\Debtor;
use PHPUnit\Framework\TestCase;

class DebtorTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Debtor::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Debtor::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Debtor::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Debtor::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Debtor::class);
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
        $this->object = new Debtor();
    }

}