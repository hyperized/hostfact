<?php declare(strict_types=1);

namespace Hyperized\Hostfact;

use Illuminate\Support\Facades\Facade;

class HostfactFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Hostfact';
    }
}
