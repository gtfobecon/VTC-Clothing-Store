<?php
	class Model_Loader {
		public function load($model_name, $new_name = null) {

			$model = ucfirst($model_name) . '_Model';
			$model_path = APP_PATH . "/models/{$model}.php";
			if (!file_exists($model_path)) {
				exit("File not found $model_path");
			}

			require_once $model_path;
			if (!class_exists($model)) {
				exit("Class not found $model");
			}

			if ($new_name !== null) {
				$this->$new_name = new $model;
			} else {
				$this->$model_name = new $model;
			}
		}

	}