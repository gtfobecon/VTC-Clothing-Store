<?php
class Core_Controller {
	protected $layout;
	protected $view;
	protected $model;
	protected $helper;

	public function __construct() {
		session_start();
		// layout loader
		require_once BASE_PATH . '/core/loaders/Layout_Loader.php';
		$this->layout = new Layout_Loader;

		// view loader
		require_once BASE_PATH . '/core/loaders/View_Loader.php';
		$this->view = new View_Loader;

		// model loader
		require_once BASE_PATH . '/core/loaders/Model_Loader.php';
		$this->model = new Model_Loader;

		// helper loader
		require_once BASE_PATH . '/core/loaders/Helper_Loader.php';
		$this->helper = new Helper_Loader;

		$this->autoload();
	}

	public function autoload() {
		$autoload_config = require BASE_PATH . '/config/autoload.php';
        foreach ($autoload_config as $autoload_key => $autoloads) {
            foreach ($autoloads as $autoload) {
                $this->$autoload_key->load($autoload);
            }
        }
    }
}