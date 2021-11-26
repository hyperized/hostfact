<?php

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
use Hyperized\Hostfact\Interfaces\HostingInterface;
use Hyperized\Hostfact\Traits\CanCreateNewCustomSelf;
use Hyperized\Hostfact\Traits\CanCreateNewSelf;

class Hosting extends ApiClient implements HostingInterface
{
    use CanCreateNewSelf;
    use CanCreateNewCustomSelf;

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
}