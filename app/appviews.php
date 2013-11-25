<?php

class AppViews extends Views {

	protected $messages;

	public function __construct() {
		parent::__construct();

		$this->messages = Message::getInstance();
	}
	
}

?>
