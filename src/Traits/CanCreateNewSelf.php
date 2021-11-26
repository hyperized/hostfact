<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Traits;

use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Types\Url;

trait CanCreateNewSelf
{
    public static function new(): self
    {
        return new self(
            HttpClient::new(
                Url::fromString(self::getUrlFromConfig())
            ),
        );
    }


    protected static function getUrlFromConfig(): string
    {
        $url = config('Hostfact.api_v2_url');
        if (!is_string($url)) {
            throw InvalidArgumentException::configVariableNotAString();
        }
        return $url;
    }
}
