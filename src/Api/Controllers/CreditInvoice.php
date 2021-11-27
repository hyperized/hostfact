<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAddAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanAddLine;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteLine;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanMarkAsPaid;
use Hyperized\Hostfact\Api\Capabilities\CanPayPartial;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\CreditInvoiceInterface;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Types\Url;

class CreditInvoice extends ApiClient implements CreditInvoiceInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;
    use CanPayPartial;
    use CanMarkAsPaid;
    use CanAddLine;
    use CanDeleteLine;
    use CanAddAttachment;
    use CanDeleteAttachment;
    use CanDownloadAttachment;

    protected static string $name = 'creditinvoice';

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
