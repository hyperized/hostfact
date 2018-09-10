<?php

namespace Hyperized\Hostfact;

use Illuminate\Support\Facades\Facade;

class HostfactFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Hostfact';
    }
}
