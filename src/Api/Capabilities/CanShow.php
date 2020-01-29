<?php


namespace Hyperized\Hostfact\Api\Capabilities;

use Hyperized\Hostfact\Api\Models\Basic;

trait CanShow
{
    public function show(Basic $model): array
    {
        return [];
    }
}
