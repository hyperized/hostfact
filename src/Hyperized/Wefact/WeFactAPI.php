<?php

namespace Hyperized\Wefact;

class WeFactAPI implements WeFactInterface {

	private $response;
	private $mode; // Set the sendRequest 'mode' based on inhenited classname

	public function __construct()
	{
		$this->mode = strtolower(get_class($this));
	}

	public function __call($method, $arguments)
	{
		echo 'Calling method '.$method.' <br />';
		echo config('Wefact.api_v2_url');
	}

	public function verifyAPI() {}
	public function sendRequest() {}
	public function getResponse() {}

	public function getMode() {}

	// Generic functions
	public function add(array $input) {
		return $this->sendRequest($this->mode, 'add', $input);
	}

}