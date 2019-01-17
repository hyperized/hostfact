<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Domain
 *
 * @package Hyperized\Hostfact\Types
 */
class Domain extends HostfactAPI
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
    public function autoRenew(array $input)
    {
        return $this->pseudoRequest('autorenew', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function changeNameserver(array $input)
    {
        return $this->pseudoRequest('changenameserver', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function check(array $input)
    {
        return $this->pseudoRequest('check', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function editDnsZone(array $input)
    {
        return $this->pseudoRequest('editdnszone', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function getDnsZone(array $input)
    {
        return $this->pseudoRequest('getdnszone', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function getToken(array $input)
    {
        return $this->pseudoRequest('gettoken', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function listDnsTemplates(array $input)
    {
        return $this->pseudoRequest('listdnstemplates', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function lock(array $input)
    {
        return $this->pseudoRequest('lock', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function register(array $input)
    {
        return $this->pseudoRequest('register', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function syncWHOIS(array $input)
    {
        return $this->pseudoRequest('syncwhois', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function editWHOIS(array $input)
    {
        return $this->pseudoRequest('editwhois', $input);
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
    public function transfer(array $input)
    {
        return $this->pseudoRequest('transfer', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function unlock(array $input)
    {
        return $this->pseudoRequest('unlock', $input);
    }
}
