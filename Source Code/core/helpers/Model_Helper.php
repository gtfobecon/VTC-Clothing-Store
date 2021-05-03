<?php
/*
Riêng helper này, em chưa biết thì ko nên tự ý viết vào đây nha,
vì nó phục vụ cho cơ chế chung của Base_Model
*/

	// hàm mã hóa password, ko lưu trực tiếp password vào db
	function hash_password($password) {
		return password_hash($password,PASSWORD_DEFAULT);
	}

	// hàm tự động tạo ra câu sql insert
	function gen_insert_fields_form_array($data = []) {
		$result = new stdClass();
		$result->fields = $result->values = $result->bind_values = [];

	    foreach ($data as $key => $value) {
	    	$result->fields[] = "`{$key}`";
	    	$key_name = ":{$key}";
	    	$result->values[] = $key_name;
	    	$result->bind_values[$key_name] = $value;
	    }
	    // to string
	    $result->field_string = implode(', ', $result->fields);
	    $result->value_string = implode(', ', $result->values);

	    return $result;
	}

	// hàm tự tạo ra câu truy vấn sql update
	function gen_update_fields_form_array($data = []) {
		$result = new stdClass();
		$result->fields = $result->bind_values = [];

	    foreach ($data as $key => $value) {
	    	$key_name = ":{$key}";
	    	$result->fields[] = "`{$key}` = {$key_name}";
	    	$result->bind_values[$key_name] = $value;
	    }
	    // to string
	    $result->field_string = implode(', ', $result->fields);

	    return $result;
	}

	// hàm trả ra mảng created khi insert bản ghi mới vào db
	function get_create_time() {
		$current_time = get_current_time();
		return [
			'created_at' => $current_time,
			'updated_at' => $current_time
		];
	}

	// hàm trả ra mảng updated khi insert bản ghi mới vào db
	function get_update_time() {
		$current_time = get_current_time();
		return [
			'updated_at' => $current_time
		];
	}

	// hàm mã hóa array => json data
	// tham số thứ 1: status API_SUCCESS hoặc API_ERROR
	// tham số thứ 2: Nội dung thông báo trả về
	// ____________3: Data là 1 array được trả về
	function to_api_json($status, $message = '', $data) {
		$response = [
			'status' => $status,
			'message' => $message
		];

		// thành công mới trả ra data
		if ($status === API_SUCCESS) {
			$response['data'] = $data;
		}

		exit(json_encode($response));
	}