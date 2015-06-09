<?php

namespace Hyperized\Wefact;

class Handle extends WefactAPI {

  protected $allowed = [
    'add',
    'delete',
    'edit',
    'list',
    'show',
  ];

  public function listDomain(array $input) {
    return $this->pseudoRequest('listdomain', $input);
  }

}
