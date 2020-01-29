<?php


namespace Hyperized\Hostfact\Api\Capabilities;


use Hyperized\Hostfact\Api\Models\Basic;

trait CanEdit
{
    public function edit(Basic $model): bool {
        return true;
    }
}