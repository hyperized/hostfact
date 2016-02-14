<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Vps
 * @package Hyperized\Wefact\Types
 */
class Vps extends WefactAPI
{

    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'edit',
        'list',
        'show',
    ];

    /**
     * @param array $input
     * @return array|mixed
     */
    public function create(array $input)
    {
        return $this->pseudoRequest('create', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function downloadAccountData(array $input)
    {
        return $this->pseudoRequest('downloadaccountdata', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function pause(array $input)
    {
        return $this->pseudoRequest('pause', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function restart(array $input)
    {
        return $this->pseudoRequest('restart', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function sendAccountDataByEmail(array $input)
    {
        return $this->pseudoRequest('sendaccountdatabyemail', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function start(array $input)
    {
        return $this->pseudoRequest('start', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function suspend(array $input)
    {
        return $this->pseudoRequest('suspend', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function terminate(array $input)
    {
        return $this->pseudoRequest('terminate', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function unsuspend(array $input)
    {
        return $this->pseudoRequest('unsuspend', $input);
    }

}
