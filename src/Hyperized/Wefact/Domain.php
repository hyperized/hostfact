<?php

namespace Hyperized\Wefact;

class Domain extends WefactAPI {

  protected $allowed = [
    'add',
    'delete',
    'edit',
    'list',
    'show',
  ];

  public function changeNameserver(array $input) {
    return $this->pseudoRequest('changenameserver', $input);
  }
  public function check(array $input) {
    return $this->pseudoRequest('check', $input);
  }
  public function getToken(array $input) {
    return $this->pseudoRequest('gettoken', $input);
  }
  public function lock(array $input) {
    return $this->pseudoRequest('lock', $input);
  }
  public function register(array $input) {
    return $this->pseudoRequest('register', $input);
  }
  public function syncWHOIS(array $input) {
    return $this->pseudoRequest('syncwhois', $input);
  }
  public function transfer(array $input) {
    return $this->pseudoRequest('transfer', $input);
  }
  public function unlock(array $input) {
    return $this->pseudoRequest('unlock', $input);
  }

}
