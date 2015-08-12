<?php namespace Hyperized\Wefact;

class Invoice extends WefactAPI {

  protected $allowed = [
    'add',
    'delete',
    'download',
    'edit',
    'list',
    'show',
    'lineAdd',
    'lineDelete',
    'sendByEmail',
  ];

  public function credit(array $input) {
    return $this->pseudoRequest('credit', $input);
  }
  public function markAsPaid(array $input) {
    return $this->pseudoRequest('markaspaid', $input);
  }
  public function markAsUnpaid(array $input) {
    return $this->pseudoRequest('markasunpaid', $input);
  }
  public function partPayment(array $input) {
    return $this->pseudoRequest('partpayment', $input);
  }
  public function paymentProcessPause(array $input) {
    return $this->pseudoRequest('paymentprocesspause', $input);
  }
  public function paymentProcessReactivate(array $input) {
    return $this->pseudoRequest('paymentprocessreactivate', $input);
  }
  public function sendReminderByEmail(array $input) {
    return $this->pseudoRequest('sendreminderbyemail', $input);
  }
  public function sendSummationByEmail(array $input) {
    return $this->pseudoRequest('sendsummationbyemail', $input);
  }

}