<?php
class Brand_Controller extends Base_Controller
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
		$this->layout->set('auth_layout');
		$brands = $this->model->brand->find();
		$this->view->load('brand/index', [
			'brands' => $brands
		]);
	}

	public function add()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$brands = $this->model->brand->find();
		$this->layout->set('auth_layout');
		$this->view->load('brand/add', [
			'brands' => $brands
		]);
	}

	public function store()
	{
		$name = getPostParameter('name');
		$errors = [];

		if (count($errors) > 0) {
			$this->view->load('product/add', [
				'errors' => $errors
			]);
		} else {

			$brand = $this->model->brand->create([
				'name' => $name,
			]);
			if ($brand) {
				redirect("brand/index");
			} else {
				$this->view->load('brand/add', [
					'error_message' => 'Khong them duoc'
				]);
			}
		}
	}

	public function edit()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getParameter('id');
		$this->layout->set('auth_layout');
		$brand = $this->model->brand->find_by_id($id);
		$this->view->load('brand/edit', [
			'brand' => $brand
		]);
	}

	public function update()
	{
		$id = getParameter('id');
		$name = getParameter('name');

		$brand = $this->model->brand->update_by_id($id, [
			'name' => $name,
		]);

		if ($brand) {
			redirect('brand/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('brand/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	public function destroy()
	{
		$id = getParameter('id');
		$brand = $this->model->brand->destroy($id);
		redirect('brand/index');
	}
}
