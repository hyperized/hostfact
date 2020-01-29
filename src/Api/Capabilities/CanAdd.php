<?php


namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Models\Api;

trait CanAdd
{
    public function add(Api $model): array
    {
        return [];
    }
}
