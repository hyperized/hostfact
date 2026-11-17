<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\PromiseInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\ValueObjects\Contracts\Strings\UrlInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @phpstan-type Handler callable(RequestInterface, array<array-key, mixed>): PromiseInterface<ResponseInterface, mixed>
 */
final class HttpClient implements HttpClientInterface
{
    private const float DEFAULT_TIMEOUT = 20.0;

    private readonly string $userAgent;
    /**
     * @var HandlerStack<Handler>
     */
    private readonly HandlerStack $stack;
    private readonly GuzzleClient $httpClient;

    protected function __construct(UrlInterface $url)
    {
        $this->userAgent = 'hyperized/hostfact (https://github.com/hyperized/hostfact)';
        $this->stack = HandlerStack::create();
        $timeout = config('Hostfact.api_v2_timeout');
        $this->httpClient = new GuzzleClient([
            'handler' => $this->stack,
            'base_uri' => $url->getValue(),
            'timeout' => is_numeric($timeout) ? (float) $timeout : self::DEFAULT_TIMEOUT,
            'headers' => [
                'User-Agent' => $this->userAgent,
            ],
        ]);
    }

    public static function new(UrlInterface $url): HttpClientInterface
    {
        return new self($url);
    }

    public function getHttpClient(): GuzzleClient
    {
        return $this->httpClient;
    }

    /**
     * @return HandlerStack<Handler>
     */
    public function getStack(): HandlerStack
    {
        return $this->stack;
    }
}
