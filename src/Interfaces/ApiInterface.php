<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ApiInterface
{
    public static function new(): self;

    public static function fromHttpClient(
        HttpClientInterface $httpClient
    ): self;

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
     * @return array<string, mixed>
     */
    public function sendRequest(string $controller, string $action, array $input): array;
}
