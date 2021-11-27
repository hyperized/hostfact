<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAddLine;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteLine;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanProcess;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Interfaces\OrderInterface;
use Hyperized\Hostfact\Types\Url;

class Order extends ApiClient implements OrderInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;
    use CanProcess;
    use CanAddLine;
    use CanDeleteLine;

    protected static string $name = 'order';

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
