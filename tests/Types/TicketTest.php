<?php

use Hyperized\Hostfact\Types\Ticket;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    protected $object;

    public function testProductInstanceOf()
    {
        self::assertInstanceOf(Ticket::class, $this->object);
    }

    // Test if product initiates

    public function testClassHasAllowed()
    {
        self::assertClassHasAttribute('allowed', Ticket::class);
    }

    // Testing availability of public class attributes

    public function testClassHasParentName()
    {
        self::assertClassHasAttribute('parentName', Ticket::class);
    }

    public function testClassHasNotResponse()
    {
        self::assertClassNotHasAttribute('response', Ticket::class);
    }

    public function testClassHasNotMode()
    {
        self::assertClassNotHasAttribute('mode', Ticket::class);
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
        $this->object = new Ticket();
    }

}