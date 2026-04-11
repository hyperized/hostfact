<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use Hyperized\Hostfact\Http\HttpClient;
use Hyperized\ValueObjects\Concretes\Strings\Url;
use Hyperized\ValueObjects\Exceptions\StringException;
use Orchestra\Testbench\TestCase;

class HostfactApiClientTest extends TestCase
{
    private HttpClient $instance;

    protected function setUp(): void
    {
        parent::setUp();
        $this->instance = HttpClient::new(
            Url::fromString('https://example.com/api.php')
        );
    }

    public function testDoFakeRequest(): void
    {
        $this->expectException(RequestException::class);
        $this->instance->getHttpClient()->request('GET', '', []);
    }

    public function testInvalidUrl(): void
    {
        $this->expectException(StringException::class);
        Url::fromString('!?Invalid');
    }

    public function testHttpClientReturnsGuzzleClient(): void
    {
        self::assertInstanceOf(GuzzleClient::class, $this->instance->getHttpClient());
    }

    public function testCanGetStack(): void
    {
        self::assertInstanceOf(HandlerStack::class, $this->instance->getStack());
    }

    public function testHttpClientHasConfiguredBaseUri(): void
    {
        $baseUri = (string) $this->instance->getHttpClient()->getConfig('base_uri');

        self::assertSame('https://example.com/api.php', $baseUri);
    }

    public function testHttpClientHasConfiguredUserAgent(): void
    {
        $headers = $this->instance->getHttpClient()->getConfig('headers');

        self::assertArrayHasKey('User-Agent', $headers);
        self::assertStringContainsString('hyperized/hostfact', $headers['User-Agent']);
    }

    public function testHttpClientHasHandlerStack(): void
    {
        $handler = $this->instance->getHttpClient()->getConfig('handler');

        self::assertInstanceOf(HandlerStack::class, $handler);
        self::assertSame($this->instance->getStack(), $handler);
    }
}
