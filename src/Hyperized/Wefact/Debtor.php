<?php

namespace Hyperized\Wefact;

class Debtor extends WefactAPI {

  protected $allowed = [
    'add',
    'edit',
    'show',
  ];

  protected function checkLogin(array $input) {
    return $this->pseudoRequest('checkLogin', $input); // Yep, _now_ all the sudden its camelCase.
  }

}
