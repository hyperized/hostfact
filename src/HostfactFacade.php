<?php declare(strict_types=1);

namespace Hyperized\Hostfact;

use Illuminate\Support\Facades\Facade;

class HostfactFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Hostfact';
    }
}
