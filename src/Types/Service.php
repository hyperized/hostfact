<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Service
 * @package Hyperized\Wefact\Types
 */
class Service extends WefactAPI
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
