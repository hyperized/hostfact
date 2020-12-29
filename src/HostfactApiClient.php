<?php


namespace Hyperized\Hostfact;


use GuzzleHttp\ClientInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\Url;

class HostfactApiClient implements HttpClientInterface
{
    public static function new(Url $url): HttpClientInterface
    {
        // TODO: Implement new() method.
    }

    public static function getHttpClient(): ClientInterface
    {
        // TODO: Implement getHttpClient() method.
    }
}
