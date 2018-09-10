<?php

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Group
 * @package Hyperized\Hostfact\Types
 */
class Group extends HostfactAPI
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'delete',
        'edit',
        'list',
        'show',
    ];
}
