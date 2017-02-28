<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Handle
 * @package Hyperized\Wefact
 */
class Handle extends WefactAPI
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

    /**
     * @param array $input
     * @return array|mixed
     */
    public function listDomain(array $input)
    {
        return $this->pseudoRequest('listdomain', $input);
    }
}
