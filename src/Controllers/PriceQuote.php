<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class PriceQuote
 *
 * @package Hyperized\Hostfact\Types
 */
class PriceQuote extends HostfactAPI
{
    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'delete',
        'download',
        'edit',
        'list',
        'sendByEmail',
        'show',
        'lineAdd',
        'lineDelete'
    ];

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function accept(array $input)
    {
        return $this->pseudoRequest('accept', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function decline(array $input)
    {
        return $this->pseudoRequest('decline', $input);
    }
}
