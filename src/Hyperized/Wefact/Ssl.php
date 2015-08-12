<?php namespace Hyperized\Wefact;

class Ssl extends WefactAPI {

  protected $allowed = [
    'add',
    'download',
    'edit',
    'list',
    'show',
  ];

  public function getStatus(array $input) {
    return $this->pseudoRequest('getstatus', $input);
  }
  public function installed(array $input) {
    return $this->pseudoRequest('installed', $input);
  }
  public function reissue(array $input) {
    return $this->pseudoRequest('reissue', $input);
  }
  public function renew(array $input) {
    return $this->pseudoRequest('renew', $input);
  }
  public function request(array $input) {
    return $this->pseudoRequest('request', $input);
  }
  public function resendApproverMail(array $input) {
    return $this->pseudoRequest('resendapprovermail', $input);
  }
  public function revoke(array $input) {
    return $this->pseudoRequest('revoke', $input);
  }
  public function terminate(array $input) {
    return $this->pseudoRequest('terminate', $input);
  }

}
