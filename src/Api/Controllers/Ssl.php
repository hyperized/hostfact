<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Api;
use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanDownload;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanGetStatus;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanMarkAsInstalled;
use Hyperized\Hostfact\Api\Capabilities\CanMarkAsUninstalled;
use Hyperized\Hostfact\Api\Capabilities\CanReissue;
use Hyperized\Hostfact\Api\Capabilities\CanRenew;
use Hyperized\Hostfact\Api\Capabilities\CanRequest;
use Hyperized\Hostfact\Api\Capabilities\CanResendApproverEmail;
use Hyperized\Hostfact\Api\Capabilities\CanRevoke;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanTerminate;
use Hyperized\Hostfact\Http\HttpClient;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Interfaces\SslInterface;
use Hyperized\Hostfact\Types\Url;

class Ssl extends Api implements SslInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanTerminate;
    use CanRequest;
    use CanMarkAsInstalled;
    use CanDownload;
    use CanReissue;
    use CanRenew;
    use CanGetStatus;
    use CanResendApproverEmail;
    use CanRevoke;
    use CanMarkAsUninstalled;

    protected static string $name = 'ssl';

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
