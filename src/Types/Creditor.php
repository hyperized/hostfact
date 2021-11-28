<?php

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Creditor
 *
 * @package Hyperized\Hostfact\Types
 */
class Creditor extends HostfactAPI
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
