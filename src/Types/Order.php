<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Order
 * @package Hyperized\Wefact\Types
 */
class Order extends WefactAPI
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
     * @param array $input
     * @return array|mixed
     */
    public function process(array $input)
    {
        return $this->pseudoRequest('process', $input);
    }
}
