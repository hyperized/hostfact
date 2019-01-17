<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Ticket
 *
 * @package Hyperized\Hostfact\Types
 */
class Ticket extends HostfactAPI
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
    public function addMessage(array $input)
    {
        return $this->pseudoRequest('addmessage', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function changeOwner(array $input)
    {
        return $this->pseudoRequest('changeowner', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function changeStatus(array $input)
    {
        return $this->pseudoRequest('changeStatus', $input);
    }
}
