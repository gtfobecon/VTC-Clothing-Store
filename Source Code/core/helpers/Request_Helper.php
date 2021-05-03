<?php

	// lấy giá trị của biến GET hoặc POST
	function getParameter($key, $default = '') {
		if (!empty($_REQUEST[$key])) {
			return $_REQUEST[$key];
		}
		return $default;
	}

	// Chỉ lấy đc giá trị của biến GET
	function getGetParameter($key, $default = '') {
		if (!empty($_GET[$key])) {
			return $_GET[$key];
		}
		return $default;
	}

	// Chỉ lấy được giá trị của biến POST
	function getPostParameter($key, $default = '') {
		if (!empty($_POST[$key])) {
			return $_POST[$key];
		}
		return $default;
	}