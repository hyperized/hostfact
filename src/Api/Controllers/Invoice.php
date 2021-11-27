<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAddAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanAddLine;
use Hyperized\Hostfact\Api\Capabilities\CanBlock;
use Hyperized\Hostfact\Api\Capabilities\CanCancelSchedule;
use Hyperized\Hostfact\Api\Capabilities\CanCredit;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteLine;
use Hyperized\Hostfact\Api\Capabilities\CanDownload;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanMarkAsPaid;
use Hyperized\Hostfact\Api\Capabilities\CanMarkAsUnpaid;
use Hyperized\Hostfact\Api\Capabilities\CanPaymentProcessPause;
use Hyperized\Hostfact\Api\Capabilities\CanPaymentProcessReactivate;
use Hyperized\Hostfact\Api\Capabilities\CanPayPartial;
use Hyperized\Hostfact\Api\Capabilities\CanSchedule;
use Hyperized\Hostfact\Api\Capabilities\CanSendByEmail;
use Hyperized\Hostfact\Api\Capabilities\CanSendReminderByEmail;
use Hyperized\Hostfact\Api\Capabilities\CanSendSummationByEmail;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanUnblock;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\HttpClient;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Hyperized\Hostfact\Interfaces\InvoiceInterface;
use Hyperized\Hostfact\Types\Url;

class Invoice extends ApiClient implements InvoiceInterface
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;
    use CanCredit;
    use CanPayPartial;
    use CanMarkAsPaid;
    use CanMarkAsUnpaid;
    use CanSendByEmail;
    use CanSendReminderByEmail;
    use CanSendSummationByEmail;
    use CanDownload;
    use CanAddLine;
    use CanDeleteLine;
    use CanAddAttachment;
    use CanDeleteAttachment;
    use CanDownloadAttachment;
    use CanBlock;
    use CanUnblock;
    use CanSchedule;
    use CanCancelSchedule;
    use CanPaymentProcessPause;
    use CanPaymentProcessReactivate;

    protected static string $name = 'invoice';

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
