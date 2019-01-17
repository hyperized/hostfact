<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Subscription
 *
 * @package Hyperized\Hostfact\Types
 */
class Subscription extends HostfactAPI
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
