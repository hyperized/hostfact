<?php namespace Hyperized\Wefact;

class CreditInvoice extends WefactAPI {

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

  protected function markAsPaid(array $input) {
    return $this->pseudoRequest('markaspaid', $input);
  }
  protected function partPayment(array $input) {
    return $this->pseudoRequest('partpayment', $input);
  }

}