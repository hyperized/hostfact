<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Ticket
 * @package Hyperized\Wefact\Types
 */
class Ticket extends WefactAPI
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
    public function addMessage(array $input)
    {
        return $this->pseudoRequest('addmessage', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function changeOwner(array $input)
    {
        return $this->pseudoRequest('changeowner', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function changeStatus(array $input)
    {
        return $this->pseudoRequest('changeStatus', $input);
    }

}
