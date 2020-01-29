<?php declare(strict_types=1);


namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Models\Basic;

trait CanList
{
    public function list(Basic $model): array
    {
        return [];
    }
}
