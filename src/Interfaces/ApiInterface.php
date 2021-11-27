<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ApiInterface
{
    public static function new(): self;

    /**
     * @param  HttpClientInterface $httpClient
     * @return ApiInterface
     *
     * Allows for easy testing
     */
    public static function fromCustom(
        HttpClientInterface $httpClient
    ): ApiInterface;

    public static function getRequest(): RequestInterface;

    public static function getResponse(
        HttpClientInterface    $client,
        RequestInterface       $request,
        FormParameterInterface $formParameter,
        string                 $controller,
        string                 $action
    ): ResponseInterface;

    public static function getResponseBody(ResponseInterface $response): string;

    public function getHttpClient(): HttpClientInterface;

    /**
     * @param  string               $controller
     * @param  string               $action
     * @param  array<string, mixed> $input
     * @return string
     */
    public function doRequest(string $controller, string $action, array $input): string;
}
