<?php

class User_Controller extends Base_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$users = $this->model->user->find();
		$this->layout->set('auth_layout');
		$this->view->load('user/index', [
			'users' => $users
		]);
	}

	public function profile()
	{
		// show profile

		if (!$_SESSION['email']) {
			redirect('user/login');
		}
		if ($_SESSION['id'] == 1) {
			$this->layout->set('auth_layout');
		}
		$this->view->load('user/profile');
	}

	public function handle_update()
	{
		// process update

		$id = $_SESSION['id'];
		$name = getPostParameter('name');
		$phone_number = getPostParameter('phone_number');
		$address = getPostParameter('address');
		$errors = [];
		if (!$name) {
			$errors['name'] = 'Vui lòng nhập Họ và Tên';
		}

		if (!$address) {
			$errors['address'] = 'Vui lòng nhập địa chỉ';
		}

		if (!$phone_number || !preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone_number)) {
			$errors['phone_number'] = 'Vui lòng nhập đúng số điện thoại';
		}

		if (count($errors) > 0) {
			$this->view->load('user/profile', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->update_by_id($id, [
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number
			]);
			$_SESSION['name'] = $name;
			$_SESSION['address'] = $address;
			$_SESSION['phone_number'] = $phone_number;
			$this->view->load('user/profile', [
				'successfully' => 'Đổi thông tin thành công'
			]);
		}
	}
	public function password()
	{
		// show change password

		if (!$_SESSION['email']) {
			redirect('user/login');
		}
		if ($_SESSION['id'] == 1) {
			$this->layout->set('auth_layout');
		}
		$this->view->load('user/password');
	}

	public function handle_password()
	{

		// process change password

		$id = $_SESSION['id'];
		$user = $this->model->user->find_by_id($id);

		$old_password = getPostParameter('old_password');
		$new_password = getPostParameter('new_password');
		$re_new_password = getPostParameter('re_new_password');

		$errors = [];
		if (!$old_password) {
			$errors['old_password'] = 'Trường  này không được để trống';
		} elseif (!$new_password) {
			$errors['new_password'] = 'Trường này không được để trống';
		} elseif (!$re_new_password) {
			$errors['re_new_password'] = 'Trường này không được để trống';
		} elseif (password_verify($old_password, $user['password']) == false) {
			$errors['old_password'] = 'Sai mật khẩu hiện tại';
		} elseif ($old_password == $new_password) {
			$errors['new_password'] = 'Mật khẩu mới không được giống mật khẩu cũ';
		} elseif ($new_password != $re_new_password) {
			$errors['re_new_password'] = 'Mật khẩu không trùng khớp';
		}
		$new_password = hash_password($new_password);
		if (count($errors) > 0) {
			$this->view->load('user/password', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->update_by_id($id, [
				'password' => $new_password
			]);

			$this->view->load('user/password', [
				'successfully' => 'Đổi mật khẩu thành công'
			]);
		}
	}

	public function login()
	{
		// show login

		if (!empty($_SESSION['email'])) {
			redirect('home/index');
		}
		$this->view->load('user/login');
	}

	public function handle_login()
	{
		// process login

		$email = getPostParameter('email');
		$password = getPostParameter('password');

		$errors = [];
		if (!$email) {
			$errors['email'] = 'Vui lòng nhập email';
		}

		if (!$password) {
			$errors['password'] = 'Vui lòng nhập password';
		}

		if (count($errors) > 0) {
			$this->view->load('home/login', [
				'errors' => $errors 
			]);
		} else {
			$user = $this->model->user->get_by_email($email);
			if ($email == $user['email'] && password_verify($password, $user['password']) == true) {
				if ($user['role'] == 2) {
					$_SESSION['id'] = $user['id'];
					$_SESSION['email'] = $user['email'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['phone_number'] = $user['phone_number'];
					$_SESSION['address'] = $user['address'];
					$_SESSION['role'] = $user['role'];
					if(!empty($_SESSION['url'])){
						header("Location:" . $_SESSION['url']);
					}else{
						redirect('home/index');
					}
				} elseif ($user['role'] == 1) {
					$_SESSION['id'] = $user['id'];
					$_SESSION['email'] = $user['email'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['phone_number'] = $user['phone_number'];
					$_SESSION['address'] = $user['address'];
					$_SESSION['role'] = $user['role'];
					redirect('order/index');
				}
			} else {
				$this->view->load('user/login', [
					'error_message' => 'Tài khoản hoặc mật khẩu không chính xác !'
				]);
			}
		}
	}

	public function handle_logout()
	{
		// process logout

		unset($_SESSION);
		session_destroy();
		redirect('user/login');
	}

	public function registration()
	{
		// show registration

		$this->view->load('user/registration');
	}

	public function handle_registration()
	{
		// process registration

		$name = getPostParameter('name');
		$address = getPostParameter('address');
		$phone_number = getPostParameter('phone_number');
		$email = getPostParameter('email');
		$password = getPostParameter('password');
		$re_password = getPostParameter('re_password');


		$errors = [];

		if (!$name) {
			$errors['name'] = 'Vui lòng nhập Họ và Tên';
		}

		if (!$address) {
			$errors['address'] = 'Vui lòng nhập địa chỉ';
		}

		if (!$phone_number || !preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone_number)) {
			$errors['phone_number'] = 'Vui lòng nhập đúng số điện thoại';
		}

		if (!$email) {
			$errors['email'] = 'Vui lòng nhập email';
		}

		if (!$password || !$re_password) {
			$errors['password'] = 'Vui lòng nhập mật khẩu';
		}

		if ($password !== $re_password) {
			$errors['re_password'] = 'Mật khẩu không trùng khớp';
		}

		if (count($errors) > 0) {
			$this->view->load('user/registration', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->get_by_email($email);
			if ($email != $user['email']) {
				$role = 2;
				$password = hash_password($password);
				$user = $this->model->user->create([
					'name' => $name,
					'address' => $address,
					'phone_number' => $phone_number,
					'email' => $email,
					'password' => $password,
					'role' => $role
				]);
				$_SESSION['id'] = $user['id'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['name'] = $user['name'];
				$_SESSION['phone_number'] = $user['phone_number'];
				$_SESSION['address'] = $user['address'];
				$_SESSION['role'] = $user['role'];
				if(!empty($_SESSION['url'])){
					header("Location:" . $_SESSION['url']);
				}else{
					redirect('home/index');
				}
			} else {
				$this->view->load('user/registration', [
					'error_message' => 'Email đã được đăng ký'
				]);
			}
		}
	}

	// view form
	public function add()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$this->layout->set('auth_layout');
		$this->view->load('user/add');
	}
	public function store()
	{
		// xu li them san pham

		$name = getParameter('name');
		$address = getParameter('address');
		$phone = getParameter('phone_number');
		$email = getParameter('email');
		$password = getParameter('password');
		$role = 2;

		$user_email = $this->model->user->get_by_email($email);
		$user_phone = $this->model->user->get_by_phone($phone);

		$errors = [];


		if (!$phone || !preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone)) {
			$errors['phone_err'] = 'Vui lòng nhập đúng số điện thoại';
		} elseif ($user_phone) {
			$errors['phone_err'] = "số điện thoại \"$phone\" đã tồn tại!";
		}

		if (!$email) {
			$errors['email_err'] = 'Vui lòng nhập email';
		} elseif ($user_email) {
			$errors['email_err'] = "email \"$email\" đã tồn tại!";
		}


		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load('user/add', [
				'errors' => $errors
			]);
		} else {
			$user = $this->model->user->create([
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone,
				'email' => $email,
				'password' => $password,
				'role' => $role
			]);
			if ($user) {
				redirect('user/index');
			} else {
				$this->view->load('user/add', [
					'error_message' => 'Không thêm được user mới'
				]);
			}
		}
	}
	public function edit()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getGetParameter('id');
		$user = $this->model->user->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('user/edit', [
			'user' => $user
		]);
	}

	public function update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$name = getPostParameter('name');
		$address = getPostParameter('address');
		$phone = getPostParameter('phone_number');
		$role = 2;

		$user = $this->model->user->update_by_id($id, [
			'name' => $name,
			'address' => $address,
			'phone_number' => $phone,
			'role' => $role
		]);

		if ($user) {
			redirect('user/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('user/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	public function destroy()
	{
		$id = getParameter('id');
		$this->model->user->destroy($id);
		redirect('user/index');
	}
}
