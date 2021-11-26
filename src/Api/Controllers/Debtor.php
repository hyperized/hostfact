<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAddAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanCheckLogin;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanGeneratePdf;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanSendEmail;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanUpdateLoginCredentials;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\Interfaces\DebtorInterface;
use Hyperized\Hostfact\Traits\CanCreateNewCustomSelf;
use Hyperized\Hostfact\Traits\CanCreateNewSelf;

class Debtor extends ApiClient implements DebtorInterface
{
    use CanCreateNewSelf;
    use CanCreateNewCustomSelf;

    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanCheckLogin;
    use CanUpdateLoginCredentials;
    use CanGeneratePdf;
    use CanSendEmail;
    use CanAddAttachment;
    use CanDeleteAttachment;
    use CanDownloadAttachment;

    protected static string $name = 'debtor';
}
