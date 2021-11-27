<?php declare(strict_types=1);


namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAddMessage;
use Hyperized\Hostfact\Api\Capabilities\CanChangeOwner;
use Hyperized\Hostfact\Api\Capabilities\CanChangeStatus;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Interfaces\TicketInterface;
use Hyperized\Hostfact\Types\Url;

class Ticket extends ApiClient implements TicketInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;
    use CanAddMessage;
    use CanChangeStatus;
    use CanChangeOwner;
    use CanDownloadAttachment;

    protected static string $name = 'ticket';

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
