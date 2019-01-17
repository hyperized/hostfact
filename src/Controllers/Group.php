<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Group
 *
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
