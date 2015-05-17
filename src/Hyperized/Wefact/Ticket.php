<?php

namespace Hyperized\Wefact;

class Ticket extends WefactAPI {

	protected $allowed = ['add', 'delete', 'edit', 'list', 'show'];

	public function addMessage(array $input) {
		return $this->pseudoRequest('addmessage', $input);
	}
	public function changeOwner(array $input) {
		return $this->pseudoRequest('changeowner', $input);
	}
	public function changeStatus(array $input) {
		return $this->pseudoRequest('changeStatus', $input);
	}

}
