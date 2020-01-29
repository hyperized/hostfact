<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Models\Basic;

trait CanDelete
{
    public function delete(Basic $model): bool
    {
        return true;
    }
}
