<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Traits;

use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Types\Url;

trait CanCreateNewSelf
{
    public static function new(): self
    {
        return new self(
            HttpClient::new(
                Url::fromMixed(config('Hostfact.api_v2_url'))
            ),
        );
    }
}