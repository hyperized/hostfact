<?php declare(strict_types=1);


namespace Hyperized\Hostfact\Api\Models;

use Hyperized\Hostfact\Api\Capabilities\CanAdd;
use Hyperized\Hostfact\Api\Capabilities\CanDelete;
use Hyperized\Hostfact\Api\Capabilities\CanEdit;
use Hyperized\Hostfact\Api\Capabilities\CanList;
use Hyperized\Hostfact\Api\Capabilities\CanShow;

abstract class Basic extends Api
{
    use CanShow;
    use CanList;
    use CanAdd;
    use CanEdit;
    use CanDelete;
}
