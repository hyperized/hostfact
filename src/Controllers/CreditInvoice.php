<?php

namespace Hyperized\Hostfact\Controllers;

use Hyperized\Hostfact\HostfactAPI;

/**
 * Class CreditInvoice
 *
 * @package Hyperized\Hostfact\Types
 */
class CreditInvoice extends HostfactAPI
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
        'markAsPaid',
        'partPayment',
        'lineAdd',
        'lineDelete',
    ];

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function markAsPaid(array $input)
    {
        return $this->pseudoRequest('markaspaid', $input);
    }

    /**
     * @param  array $input
     * @return array|mixed
     */
    public function partPayment(array $input)
    {
        return $this->pseudoRequest('partpayment', $input);
    }
}
