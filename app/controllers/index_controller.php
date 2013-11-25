<?php
class Index_controller extends AppController{

	public function __construct(){
		parent::__construct();
	}
	
	public function index($pag = null){		
		
		$this->view->setLayout('index');
		$this->render();
	}
}

