<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Types\Url;
use Orchestra\Testbench\TestCase;

class HostfactApiClientTest extends TestCase
{
    private HttpClient $instance;

    protected function setUp(): void
    {
        parent::setUp();
        $this->instance = HttpClient::new(
            Url::fromString('test://hostfact.api/')
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testDoFakeRequest(): void
    {
        $this->expectException(RequestException::class);
        $this->instance->getHttpClient()->request('GET', '', []);
    }

    public function testInvalidUrl(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Url::fromString('!?Invalid');
    }

    public function testHttpClient(): void
    {
        self::assertIsObject(
            $this->instance->getHttpClient()
        );
    }

    public function testCanGetStack(): void
    {
        self::assertIsObject(
            $this->instance->getStack()
        );
    }
}