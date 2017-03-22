<?php

namespace Hyperized\Wefact;

use Illuminate\Support\Facades\Facade;

class WefactFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Wefact';
    }
}
