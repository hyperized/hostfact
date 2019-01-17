<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class Debtor
 *
 * @package Hyperized\Hostfact\Types
 */
class Debtor extends HostfactAPI
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
     * @param  array $input
     * @return array|mixed
     */
    public function checkLogin(array $input)
    {
        return $this->pseudoRequest('checkLogin', $input); // Yep, _now_ all the sudden its camelCase.
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function updateLoginCredentials(array $input)
    {
        return $this->pseudoRequest('updatelogincredentials', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function generatePdf(array $input)
    {
        return $this->pseudoRequest('generatepdf', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function sendEmail(array $input)
    {
        return $this->pseudoRequest('sendemail', $input);
    }
}
