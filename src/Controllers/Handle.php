<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Handle
 *
 * @package Hyperized\Hostfact
 */
class Handle extends HostfactAPI
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
     * @param  array $input
     * @return array|mixed
     */
    public function listDomain(array $input)
    {
        return $this->pseudoRequest('listdomain', $input);
    }
}
