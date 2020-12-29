<?php


namespace Hyperized\Hostfact\Interfaces;


use GuzzleHttp\ClientInterface;
use Hyperized\Hostfact\Types\Url;

interface HttpClientInterface
{
    public static function new(Url $url): self;
    public static function getHttpClient(): ClientInterface;
}
