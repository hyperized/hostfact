<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Api;
use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanTerminate;
use Hyperized\Hostfact\Http\HttpClient;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Interfaces\ServiceInterface;
use Hyperized\Hostfact\Types\Url;

class Service extends Api implements ServiceInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanTerminate;

    protected static string $name = 'service';

    public static function new(): self
    {
        return new self(
            HttpClient::new(
                Url::fromString(
                    Api::getUrlFromConfig()
                )
            )
        );
    }

    public static function fromHttpClient(HttpClientInterface $httpClient): self
    {
        return new self($httpClient);
    }
}
