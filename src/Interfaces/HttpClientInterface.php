<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use GuzzleHttp\ClientInterface;
use Hyperized\ValueObjects\Contracts\Strings\UrlInterface;

interface HttpClientInterface
{
    public static function new(UrlInterface $url): HttpClientInterface;

    public function getHttpClient(): ClientInterface;
}
