<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Ssl
 * @package Hyperized\Wefact\Types
 */
class Ssl extends WefactAPI
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'download',
        'edit',
        'list',
        'show',
    ];

    /**
     * @param array $input
     * @return array|mixed
     */
    public function getStatus(array $input)
    {
        return $this->pseudoRequest('getstatus', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function installed(array $input)
    {
        return $this->pseudoRequest('installed', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function reissue(array $input)
    {
        return $this->pseudoRequest('reissue', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function renew(array $input)
    {
        return $this->pseudoRequest('renew', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function request(array $input)
    {
        return $this->pseudoRequest('request', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function resendApproverMail(array $input)
    {
        return $this->pseudoRequest('resendapprovermail', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function revoke(array $input)
    {
        return $this->pseudoRequest('revoke', $input);
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
    public function uninstalled(array $input)
    {
        return $this->pseudoRequest('uninstalled', $input);
    }
}
