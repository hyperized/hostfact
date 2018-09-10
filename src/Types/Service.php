<?php

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Service
 * @package Hyperized\Hostfact\Types
 */
class Service extends HostfactAPI
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'edit',
        'list',
        'show',
        'terminate',
    ];
}
