<?php

	// lấy ngày giờ hiện tại
	function get_current_time($format = 'Y-m-d H:i:s') {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		return date($format);
	}

	// thằng Util hepler này là để em viết tất cả các hàm không thuôc những helper kia, ok ko?
	// là các hàm mak e muốn sử lý đều viết ở đây ạ
	// tức là những tiện ích mới viết ở đây, helper mà, dạ. cái gì mà em thấy có thể dùng lại nhé
	// ví dụ như hàm trên, get_current_time, ở bất cứ đâu em muốn lấy ngày giờ hiện tại đều dùng đc
	// đó, tiện ích nó hiểu như vậy. dạ. anh để ghi chú này lại cho e nha. ok 
?>