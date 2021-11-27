<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanCreate;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanEmailAccountData;
use Hyperized\Hostfact\Api\Capabilities\CanGetDomainList;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanRemoveFromServer;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanSuspend;
use Hyperized\Hostfact\Api\Capabilities\CanTerminate;
use Hyperized\Hostfact\Api\Capabilities\CanUnsuspend;
use Hyperized\Hostfact\Api\Capabilities\CanUpDowngrade;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\HostingInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\Url;

class Hosting extends ApiClient implements HostingInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanTerminate;
    use CanDelete;
    use CanSuspend;
    use CanUnsuspend;
    use CanCreate;
    use CanRemoveFromServer;
    use CanGetDomainList;
    use CanEmailAccountData;
    use CanUpDowngrade;

    protected static string $name = 'hosting';

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
