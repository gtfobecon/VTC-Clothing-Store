<?php
class Partner_Controller extends Base_Controller
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
		$partners = $this->model->partner->find();
		$this->layout->set('auth_layout');
		$this->view->load('partner/index', [
			'partners' => $partners
		]);
	}

	public function add()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$this->layout->set('auth_layout');
		$this->view->load('partner/add');
	}

	public function store()
	{
		$name = getParameter('name');
		$address = getParameter('address');
		$phone_number = getParameter('phone_number');
		$email = getParameter('email');
		$price = getParameter('price');
		$delivery_type = getParameter('delivery_type');

		$partner_email = $this->model->partner->get_by_email($email);
		$partner_phone = $this->model->partner->get_by_phone($phone_number);

		$errors = [];

		if (!$name) {
			$errors['name_err'] = 'Vui lòng nhập tên đối tác';
		}
		if (!$address) {
			$errors['address_err'] = 'Vui lòng nhap địa chỉ';
		}
		if ($partner_phone) {
			$errors['phone_err'] = "số điện thoại \"$phone_number\" đã tồn tại";
		}
		if ($partner_email) {
			$errors['email_err'] = "email \"$email\" đã tồn tại";
		}
		if ($delivery_type == "Chọn kiểu giao hàng...") {
			$errors['delivery_type_err'] = 'Vui lòng chọn kiểu giao hàng';
		}
		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load('partner/add', [
				'errors' => $errors
			]);
		} else {
			$partner = $this->model->partner->create([
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number,
				'email' => $email,
				'price' => $price,
				'delivery_type' => $delivery_type
			]);

			if ($partner) {
				redirect('partner/index');
			} else {
				$this->view->load('partner/add', [
					'error_message' => 'Không thêm được đối tác mới'
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
		$partner = $this->model->partner->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('partner/edit', [
			'partner' => $partner
		]);
	}

	public function update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$name = getParameter('name');
		$address = getParameter('address');
		$phone_number = getParameter('phone_number');
		$price = getParameter('price');
		$delivery_type = getParameter('delivery_type');

		$errors = [];

		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load('partner/edit', [
				'errors' => $errors
			]);
		} else {
			$partner = $this->model->partner->update_by_id($id, [
				'name' => $name,
				'address' => $address,
				'phone_number' => $phone_number,
				'price' => $price,
				'delivery_type' => $delivery_type
			]);
			if ($partner) {
				redirect('partner/index');
			} else {
				$this->layout->set('auth_layout');
				$this->view->load('partner/edit', [
					'error_message' => 'Cập nhật không thành công'
				]);
			}
		}
	}
}
