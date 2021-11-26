<?php

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\Api\Capabilities\CanTerminate;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\Interfaces\ServiceInterface;
use Hyperized\Hostfact\Traits\CanCreateNewCustomSelf;
use Hyperized\Hostfact\Traits\CanCreateNewSelf;

class Service extends ApiClient implements ServiceInterface
{
    use CanCreateNewSelf;
    use CanCreateNewCustomSelf;

    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanTerminate;

    protected static string $name = 'service';
}