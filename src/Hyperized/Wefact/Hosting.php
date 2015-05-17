<?php

namespace Hyperized\Wefact;

class Hosting extends WefactAPI {

	protected $allowed = ['add', 'delete', 'edit', 'list', 'show'];

	public function create(array $input) {
		return $this->pseudoRequest('create', $input);
	}
	public function getDomainList(array $input) {
		return $this->pseudoRequest('getdomainlist', $input);
	}
	public function removeFromServer(array $input) {
		return $this->pseudoRequest('removefromserver', $input);
	}
	public function sendAccountInfoByEmail(array $input) {
		return $this->pseudoRequest('sendaccountinfobyemail', $input);
	}
	public function suspend(array $input) {
		return $this->pseudoRequest('suspend', $input);
	}
	public function terminate(array $input) {
		return $this->pseudoRequest('terminate', $input);
	}
	public function unsuspend(array $input) {
		return $this->pseudoRequest('unsuspend', $input);
	}
	public function upDownGrade(array $input) {
		return $this->pseudoRequest('updowngrade', $input);
	}

}
