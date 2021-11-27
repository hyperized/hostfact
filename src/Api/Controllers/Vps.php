<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanCreate;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAccountData;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanEmailAccountData;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanPause;
use Hyperized\Hostfact\Api\Capabilities\CanRestart;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanStart;
use Hyperized\Hostfact\Api\Capabilities\CanSuspend;
use Hyperized\Hostfact\Api\Capabilities\CanTerminate;
use Hyperized\Hostfact\Api\Capabilities\CanUnsuspend;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Interfaces\VpsInterface;
use Hyperized\Hostfact\Types\Url;

class Vps extends ApiClient implements VpsInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanTerminate;
    use CanCreate;
    use CanStart;
    use CanPause;
    use CanRestart;
    use CanSuspend;
    use CanUnsuspend;
    use CanDownloadAccountData;
    use CanEmailAccountData;

    protected static string $name = 'vps';

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
