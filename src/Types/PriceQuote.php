<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class PriceQuote
 * @package Hyperized\Wefact\Types
 */
class PriceQuote extends WefactAPI
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
     * @param array $input
     * @return array|mixed
     */
    public function accept(array $input)
    {
        return $this->pseudoRequest('accept', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function decline(array $input)
    {
        return $this->pseudoRequest('decline', $input);
    }
}
