<?php

	/*
	*	Hàm trả ra url gốc nếu chỉ gọi base_url()
	* 	Trả ra url gốc + uri nếu gọi: vd: base_url('controler/action')
	*/
	function base_url($uri = '') {
		$uri = str_replace('?', '&', $uri);
		$uri_array = explode('/', $uri);
		$module = $uri_array[0];
		$action = $uri_array[1];

		if ($module && $action) {
			return "?module={$module}&action={$action}";
		}
		return 'ProjectSEM2/';
	}

	/*
	*	Hàm chuyển hướng, tham số truyền vào giống hàm base_url
	*/
	function redirect($uri) {
		$url = base_url($uri);
		header("location: $url");
		exit;
	}