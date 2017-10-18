<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Group
 * @package Hyperized\Wefact\Types
 */
class Group extends WefactAPI
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
