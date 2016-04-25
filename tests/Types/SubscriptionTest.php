<?php
use Hyperized\Wefact\Types\Subscription;
class SubscriptionTest extends PHPUnit_Framework_TestCase
{
    protected $product;
    public function testProductInstanceOf()
    {
        $this->assertInstanceOf(Subscription::class, $this->object);
    }
    // Test if product initiates
    public function testClassHasAllowed()
    {
        $this->assertClassHasAttribute('allowed', Subscription::class);
    }
    // Testing availability of public class attributes
    public function testClassHasParentName()
    {
        $this->assertClassHasAttribute('parentName', Subscription::class);
    }
    public function testClassHasNotResponse()
    {
        $this->assertClassNotHasAttribute('response', Subscription::class);
    }
    public function testClassHasNotMode()
    {
        $this->assertClassNotHasAttribute('mode', Subscription::class);
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
        $this->object = new Subscription();
    }
}
