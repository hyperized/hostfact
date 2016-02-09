<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class Debtor
 * @package Hyperized\Wefact\Types
 */
class Debtor extends WefactAPI
{

    /**
     * @var array
     */
    protected $allowed = [
        'add',
        'edit',
        'show',
    ];

    /**
     * @param array $input
     * @return array|mixed
     */
    protected function checkLogin(array $input)
    {
        return $this->pseudoRequest('checkLogin', $input); // Yep, _now_ all the sudden its camelCase.
    }

}
