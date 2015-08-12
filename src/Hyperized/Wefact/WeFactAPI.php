<?php namespace Hyperized\Wefact;

class WefactAPI {

  private   $response;
  private   $mode;      // Set the sendRequest 'mode' based on inhenited classname
  protected $parentName = 'Hyperized\Wefact\WefactAPI';

  public function __construct()
  {
    // Check if mode is set by extended class, if not fall back to naming
    if(!isset($this->mode)) {
      // Set mode to classname, strip namespaces :)
      $function_call = explode('\\', strtolower(get_class($this)));
      $this->mode = last($function_call);
    }
  }

  public function __call($method, $arguments)
  {
    // Rename functions from inhented instances from method to _method for internal use.
    if(get_class($this) != $this->parentName) {
      if(in_array($method, $this->allowed)) {
        $methodName = '_'.$method;
        if(method_exists($this, $methodName)) {
          return call_user_func_array([$this,$methodName], [$arguments]);
        }
      }
      else
      {
        $error = 'No such method: '.get_class($this).'::'.$method;
        dd($error);
        die(); // Todo: add proper Laravel error handling
      }
    }
  }

  // Generic function implementations
  protected function _add(array $input) {
    return $this->pseudoRequest('add', $input);
  }
  protected function _delete(array $input) {
    return $this->pseudoRequest('delete', $input);
  }
  protected function _download(array $input) {
    return $this->pseudoRequest('download', $input);
  }
  protected function _edit(array $input) {
    return $this->pseudoRequest('edit', $input);
  }
  protected function _list(array $input) {
    return $this->pseudoRequest('list', $input);
  }
  protected function _show(array $input) {
    return $this->pseudoRequest('show', $input);
  }
  protected function _terminate(array $input) {
    return $this->pseudoRequest('terminate', $input);
  }
  protected function _lineAdd(array $input) {
    return $this->sendRequest($this->mode.'line', 'add', $input);
  }
  protected function _lineDelete(array $input) {
    return $this->sendRequest($this->mode.'line', 'delete', $input);
  }
  protected function sendByEmail(array $input) {
    return $this->pseudoRequest('sendbyemail', $input);
  }

  // Mocks a generic request
  protected function pseudoRequest($action, array $input)
  {
    return $this->sendRequest($this->mode, $action, $input);
  }

  // Sends request from the server and resturns results
  protected function sendRequest($controller, $action, $params)
  {
    if(is_array($params)) {
      $params['api_key']      = config('Wefact.api_v2_key'); 
      $params['controller']   = $controller;
      $params['action']       = $action;
    }

    $ch = curl_init();

    $curlOptions = [
      CURLOPT_URL             => config('Wefact.api_v2_url'),
      CURLOPT_SSL_VERIFYHOST  => 0,
      CURLOPT_SSL_VERIFYPEER  => FALSE,
      CURLOPT_RETURNTRANSFER  => 1,
      CURLOPT_TIMEOUT         => config('Wefact.api_v2_timeout'),
      CURLOPT_POST            => 1,
      CURLOPT_POSTFIELDS      => http_build_query($params),
    ];

    curl_setopt_array($ch, $curlOptions);

    $curlResp         = curl_exec($ch);
    $curlError        = curl_error($ch);

    if ($curlError != '') {
      $result = [
        'controller'  => 'invalid',
        'action'      => 'invalid',
        'status'      => 'error',
        'date'        => date('c'),
        'errors'      => [ $curlError ]
      ];
    } else {
      $result = json_decode($curlResp, true);
    }

    return $result;
  }

}
