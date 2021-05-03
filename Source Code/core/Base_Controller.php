<?php
class Base_Controller extends Core_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function __destruct() {
		ob_start();
		$this->view->show();
		$content = ob_get_contents();
		ob_end_clean();

		$this->layout->load([
			'content' => $content
		]);
		
	}

}