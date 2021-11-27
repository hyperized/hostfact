<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\GroupInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\Url;

class Group extends ApiClient implements GroupInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;

    protected static string $name = 'group';

    public static function new(): self
    {
        return new self(
            HttpClient::new(
                Url::fromString(
                    ApiClient::getUrlFromConfig()
                )
            )
        );
    }

    public static function fromHttpClient(HttpClientInterface $httpClient): self
    {
        return new self($httpClient);
    }
}
