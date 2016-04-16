<?php

namespace Hyperized\Wefact\Types;

use Hyperized\Wefact\WefactAPI;

/**
 * Class CreditInvoice
 * @package Hyperized\Wefact\Types
 */
class CreditInvoice extends WefactAPI
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
     * @param array $input
     * @return array|mixed
     */
    public function markAsPaid(array $input)
    {
        return $this->pseudoRequest('markaspaid', $input);
    }

    /**
     * @param array $input
     * @return array|mixed
     */
    public function partPayment(array $input)
    {
        return $this->pseudoRequest('partpayment', $input);
    }
}