<?php

function load_app() {
	$config = require BASE_PATH . '/config/config.php';

	$module = !empty($_GET['module']) ? $_GET['module'] : $config['default_module'];
	$action = !empty($_GET['action']) ? $_GET['action'] : $config['default_action'];

	$controller = ucfirst($module) . '_Controller';

	$controller_path = APP_PATH . "/controllers/{$controller}.php";
	if (!file_exists($controller_path)) {
		exit("File not found $controller_path");
	}

	// require core, base controllers
	require BASE_PATH . '/core/Core_Controller.php';
	require BASE_PATH . '/core/Base_Controller.php';

	// require base model
	require BASE_PATH . '/core/Base_Model.php';

	require $controller_path;

	if (!class_exists($controller)) {
		exit("Class not found $controller");
	}

	$object = new $controller;

	if (!method_exists($object, $action)) {
		exit("Method not found $action");
	}

	$object->$action();
}