<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactFacade;
use Hyperized\Hostfact\HostfactServiceProvider;
use Orchestra\Testbench\TestCase;

/**
 * Class AttachmentTest
 * @package Hyperized\Hostfact\Types
 */
class CreditorTest extends TestCase
{
    protected $attachment;

    protected function getPackageProviders($app): array
    {
        return [
            HostfactServiceProvider::class
        ];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Hostfact' => HostfactFacade::class
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->attachment = new Attachment();
    }

    public function testProductInstanceOf(): void
    {
        self::assertInstanceOf(Attachment::class, $this->attachment);
    }


//    protected $product;
//    protected $object;
//


//    // Test if product initiates
//
//    public function testClassHasAllowed(): void
//    {
//        self::assertClassHasAttribute('allowed', Attachment::class);
//    }
//
//    // Testing availability of public class attributes
//
//    public function testClassHasParentName(): void
//    {
//        self::assertClassHasAttribute('parentName', Attachment::class);
//    }
//
//    public function testClassHasNotResponse(): void
//    {
//        self::assertClassNotHasAttribute('response', Attachment::class);
//    }
//
//    public function testClassHasNotMode(): void
//    {
//        self::assertClassNotHasAttribute('mode', Attachment::class);
//    }
//
//    public function testObjectHasAllowed(): void
//    {
//        self::assertObjectHasAttribute('allowed', $this->object);
//    }
//
//    // Test if after initiating the Object has the following attributes:
//
//    public function testObjectHasResponse(): void
//    {
//        self::assertObjectNotHasAttribute('response', $this->object);
//    }
}
