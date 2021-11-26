<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Controllers;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanShow;
use Hyperized\Hostfact\ApiClient;
use Hyperized\Hostfact\Interfaces\GroupInterface;
use Hyperized\Hostfact\Traits\CanCreateNewCustomSelf;
use Hyperized\Hostfact\Traits\CanCreateNewSelf;

class Group extends ApiClient implements GroupInterface
{
    use CanCreateNewSelf;
    use CanCreateNewCustomSelf;

    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;

    protected static string $name = 'group';
}
