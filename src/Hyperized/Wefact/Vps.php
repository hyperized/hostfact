<?php namespace Hyperized\Wefact;

class Invoice extends WefactAPI {

  protected $allowed = [
    'add',
    'edit',
    'list',
    'show',
  ];

  public function create(array $input) {
    return $this->pseudoRequest('create', $input);
  }
  public function downloadAccountData(array $input) {
    return $this->pseudoRequest('downloadaccountdata', $input);
  }
  public function pause(array $input) {
    return $this->pseudoRequest('pause', $input);
  }
  public function restart(array $input) {
    return $this->pseudoRequest('restart', $input);
  }
  public function sendAccountDataByEmail(array $input) {
    return $this->pseudoRequest('sendaccountdatabyemail', $input);
  }
  public function start(array $input) {
    return $this->pseudoRequest('start', $input);
  }
  public function suspend(array $input) {
    return $this->pseudoRequest('suspend', $input);
  }
  public function terminate(array $input) {
    return $this->pseudoRequest('terminate', $input);
  }
  public function unsuspend(array, $input) {
    return $this->pseudoRequest('unsuspend', $input);
  }

}
