<?php

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
use Hyperized\Hostfact\Interfaces\InvoiceInterface;
use Hyperized\Hostfact\Traits\CanCreateNewCustomSelf;
use Hyperized\Hostfact\Traits\CanCreateNewSelf;

class Invoice extends ApiClient implements InvoiceInterface
{
    use CanCreateNewSelf;
    use CanCreateNewCustomSelf;

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
}