<?php

use Hyperized\Wefact\Types\Ticket;

class TicketTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Ticket::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Ticket::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Ticket::class);
    }

    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Ticket::class);
    }

    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Ticket::class);
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
        $this->object = new Ticket();
    }

}