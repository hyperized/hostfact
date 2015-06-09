<?php

namespace Hyperized\Wefact;

class PriceQuote extends WefactAPI {

  protected $allowed = [
    'add',
    'delete',
    'download',
    'edit',
    'list',
    'sendByEmail',
    'show',
    'lineAdd',
    'lineDelete'
  ];

  public function accept(array $input) {
    return $this->pseudoRequest('accept', $input);
  }
  public function decline(array $input) {
    return $this->pseudoRequest('decline', $input);
  }

}
