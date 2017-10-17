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
        'list',
    ];

    /**
     * @param array $input
     * @return array|mixed
     */
    public function checkLogin(array $input)
    {
        return $this->pseudoRequest('checkLogin', $input); // Yep, _now_ all the sudden its camelCase.
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function updateLoginCredentials(array $input)
    {
        return $this->pseudoRequest('updatelogincredentials', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function generatePdf(array $input)
    {
        return $this->pseudoRequest('generatepdf', $input);
    }
}
