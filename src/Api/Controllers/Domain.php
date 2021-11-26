<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanAutoRenew;
use Hyperized\Hostfact\Api\Capabilities\CanChangeNameserver;
use Hyperized\Hostfact\Api\Capabilities\CanCheck;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanEditDnsZone;
use Hyperized\Hostfact\Api\Capabilities\CanEditWhois;
use Hyperized\Hostfact\Api\Capabilities\CanGetDnsZone;
use Hyperized\Hostfact\Api\Capabilities\CanGetToken;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanListDnsTemplates;
use Hyperized\Hostfact\Api\Capabilities\CanLock;
use Hyperized\Hostfact\Api\Capabilities\CanRegister;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanSyncWhois;
use Hyperized\Hostfact\Api\Capabilities\CanTerminate;
use Hyperized\Hostfact\Api\Capabilities\CanTransfer;
use Hyperized\Hostfact\Api\Capabilities\CanUnlock;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\Interfaces\DomainInterface;
use Hyperized\Hostfact\Traits\CanCreateNewCustomSelf;
use Hyperized\Hostfact\Traits\CanCreateNewSelf;

class Domain extends ApiClient implements DomainInterface
{
    use CanCreateNewSelf;
    use CanCreateNewCustomSelf;

    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanTerminate;
    use CanDelete;
    use CanGetToken;
    use CanLock;
    use CanUnlock;
    use CanChangeNameserver;
    use CanSyncWhois;
    use CanEditWhois;
    use CanCheck;
    use CanTransfer;
    use CanRegister;
    use CanAutoRenew;
    use CanListDnsTemplates;
    use CanGetDnsZone;
    use CanEditDnsZone;

    protected static string $name = 'domain';
}
