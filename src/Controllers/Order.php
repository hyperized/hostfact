<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Order
 *
 * @package Hyperized\Hostfact\Types
 */
class Order extends HostfactAPI
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
        'lineAdd',
        'lineDelete',
    ];

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function process(array $input)
    {
        return $this->pseudoRequest('process', $input);
    }
}
