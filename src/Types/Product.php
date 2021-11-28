<?php

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Product
 *
 * @package Hyperized\Hostfact\Types
 */
class Product extends HostfactAPI
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'delete',
        'edit',
        'list',
        'show'
    ];
}
