<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\Interfaces\ApiInterface;
use Hyperized\Hostfact\Interfaces\FormParameterInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\FormParameter;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Safe\Exceptions\JsonException;

abstract class Api implements ApiInterface
{
    private HttpClientInterface $httpClient;

    protected function __construct(
        HttpClientInterface $httpClient
    ) {
        $this->httpClient = $httpClient;
    }

    /**
     * @return RequestInterface
     *
     * uri will be filled in with HTTPClient uri
     * Body will be empty as this client only sends form parameters via POST
     */
    public static function getRequest(): RequestInterface
    {
        return new Request('POST', '', [], Utils::streamFor());
    }

    /**
     * @param  HttpClientInterface    $client
     * @param  RequestInterface       $request
     * @param  FormParameterInterface $formParameter
     * @param  string                 $controller
     * @param  string                 $action
     * @return ResponseInterface
     *
     * This method slipstreams the api_key and controller information into the form parameters
     */
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
                        'form_params' => array_merge(
                            $formParameter->toArray(),
                            [
                                'api_key' => config('Hostfact.api_v2_key'),
                                'controller' => $controller,
                                'action' => $action,
                            ]
                        ),
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
     * @param  string               $controller
     * @param  string               $action
     * @param  array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function sendRequest(string $controller, string $action, array $input): array
    {
        try {
            /**
             * @var array<string, mixed> $result
             */
            $result = \Safe\json_decode(
                static::getResponseBody(
                    static::getResponse(
                        $this->getHttpClient(),
                        static::getRequest(),
                        FormParameter::fromArray($input),
                        $controller,
                        $action
                    )
                ),
                true
            );
        } catch (JsonException $exception) {
            $result = [
                'controller' => 'invalid',
                'action' => 'invalid',
                'status' => 'error',
                'date' => date('c'),
                'errors' => [
                    $exception
                ]
            ];
        }

        return $result;
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
