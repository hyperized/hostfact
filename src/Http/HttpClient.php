<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\ValueObjects\Contracts\Strings\UrlInterface;

final class HttpClient implements HttpClientInterface
{
    private readonly string $userAgent;
    private readonly HandlerStack $stack;
    private readonly GuzzleClient $httpClient;

    protected function __construct(UrlInterface $url)
    {
        $this->userAgent = 'hyperized/hostfact (https://github.com/hyperized/hostfact)';
        $this->stack = HandlerStack::create();
        $this->httpClient = new GuzzleClient([
            'handler' => $this->stack,
            'base_uri' => $url->getValue(),
            'timeout' => config('Hostfact.api_v2_timeout'),
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

    public function getStack(): HandlerStack
    {
        return $this->stack;
    }
}
