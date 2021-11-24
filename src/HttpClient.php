<?php declare(strict_types=1);

namespace Hyperized\Hostfact;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\ValueObjects\Interfaces\Strings\ByteArrayInterface;

final class HttpClient implements HttpClientInterface
{
    private string $userAgent = 'hyperized/hostfact (https://github.com/hyperized/hostfact)';
    private HandlerStack $stack;
    private Client $httpClient;

    protected function __construct(ByteArrayInterface $url)
    {
        $this->stack = HandlerStack::create();
        $this->httpClient = (new Client(
            [
                'handler' => $this->stack,
                'base_uri' => $url->getValue(),
                'timeout' => config('Hostfact.api_v2_timeout'),
                'headers' => [
                    'User-Agent' => $this->userAgent
                ]
            ]
        ));
    }

    public static function new(ByteArrayInterface $url): HttpClientInterface
    {
        return new HttpClient($url);
    }

    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    public function getStack(): HandlerStack
    {
        return $this->stack;
    }
}
