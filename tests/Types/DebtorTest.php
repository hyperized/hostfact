<?php

use Hyperized\Wefact;
use Hyperized\Wefact\Types\Debtor;

class DebtorTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new Debtor();
    }

    // Test if product initiates
    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Debtor::class, $this->object);
    }

    // Testing availability of public class attributes
    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Debtor::class);
    }

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Debtor::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Debtor::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Debtor::class);
    }

    // Test if after initiating the Object has the following attributes:
    public function testObjectHasAllowed()
    {
        $this->assertObjectHasAttribute('allowed', $this->object);
    }

    public function testObjectHasResponse()
    {
        $this->assertObjectNotHasAttribute('response', $this->object);
    }

}