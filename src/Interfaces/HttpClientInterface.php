<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

use GuzzleHttp\ClientInterface;
use Hyperized\ValueObjects\Interfaces\Strings\ByteArrayInterface;

interface HttpClientInterface
{
    public static function new(ByteArrayInterface $url): HttpClientInterface;

    public function getHttpClient(): ClientInterface;
}
