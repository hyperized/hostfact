<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\Api\Response\ApiResponse;
use Hyperized\Hostfact\Api\Response\ErrorResponse;
use Hyperized\Hostfact\Api\Response\ResponseFactory;
use Hyperized\Hostfact\Api\Response\Status;
use Hyperized\Hostfact\Interfaces\ApiInterface;
use Hyperized\Hostfact\Interfaces\FormParameterInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\FormParameter;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use JsonException;

abstract class Api implements ApiInterface
{
    protected function __construct(
        private readonly HttpClientInterface $httpClient
    ) {
    }

    public static function getRequest(): RequestInterface
    {
        return new Request('POST', '', [], Utils::streamFor());
    }

    public static function getResponse(
        HttpClientInterface    $client,
        RequestInterface       $request,
        FormParameterInterface $formParameter,
        string                 $controller,
        string                 $action
    ): ResponseInterface {
        try {
            return $client
                ->getHttpClient()
                ->send(
                    $request,
                    [
                        'form_params' => [
                            ...$formParameter->toArray(),
                            'api_key' => config('Hostfact.api_v2_key'),
                            'controller' => $controller,
                            'action' => $action,
                        ],
                    ]
                );
        } catch (GuzzleException $exception) {
            throw InvalidArgumentException::apiFailed($exception);
        }
    }

    public static function getResponseBody(ResponseInterface $response): string
    {
        return $response
            ->getBody()
            ->getContents();
    }

    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param  array<string, mixed> $input
     */
    public function sendRequest(string $controller, string $action, array $input): ApiResponse
    {
        try {
            /**
             * @var array<string, mixed> $result
             */
            $result = json_decode(
                json: static::getResponseBody(
                    static::getResponse(
                        $this->getHttpClient(),
                        static::getRequest(),
                        FormParameter::fromArray($input),
                        $controller,
                        $action
                    )
                ),
                associative: true,
                flags: JSON_THROW_ON_ERROR,
            );
        } catch (JsonException $exception) {
            return new ErrorResponse(
                $controller,
                $action,
                Status::Error,
                new \DateTimeImmutable(),
                [$exception->getMessage()],
                [],
            );
        }

        return ResponseFactory::fromArray($result);
    }

    public static function getUrlFromConfig(): string
    {
        $url = config('Hostfact.api_v2_url');
        if (!is_string($url)) {
            throw InvalidArgumentException::configVariableNotAString();
        }
        return $url;
    }
}
