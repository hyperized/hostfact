<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Hosting
 *
 * @package Hyperized\Hostfact\Types
 */
class Hosting extends HostfactAPI
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
    public function create(array $input)
    {
        return $this->pseudoRequest('create', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function getDomainList(array $input)
    {
        return $this->pseudoRequest('getdomainlist', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function removeFromServer(array $input)
    {
        return $this->pseudoRequest('removefromserver', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function sendAccountInfoByEmail(array $input)
    {
        return $this->pseudoRequest('sendaccountinfobyemail', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function suspend(array $input)
    {
        return $this->pseudoRequest('suspend', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function terminate(array $input)
    {
        return $this->pseudoRequest('terminate', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function unsuspend(array $input)
    {
        return $this->pseudoRequest('unsuspend', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function upDownGrade(array $input)
    {
        return $this->pseudoRequest('updowngrade', $input);
    }
}
