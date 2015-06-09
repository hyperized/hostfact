<?php

namespace Hyperized\Wefact;

class Order extends WefactAPI {

  protected $allowed = [
    'add',
    'delete',
    'edit',
    'list',
    'show',
    'lineAdd',
    'lineDelete',
  ];

  public function process(array $input) {
    return $this->pseudoRequest('process', $input);
  }

}
