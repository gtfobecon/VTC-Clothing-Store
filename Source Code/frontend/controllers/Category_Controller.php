<?php
class Category_Controller extends Base_Controller
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

		$categories = $this->model->category->find();

		$this->view->load('category/index', [
			'categories' => $categories
		]);
	}

	public function show_product()
	{
		$id = getParameter('id');
		$pageno = getParameter('pageno');
		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}
		$no_of_records_per_page = 9;
		$offset = ($pageno - 1) * $no_of_records_per_page;
		$category = $this->model->category->find_by_id($id);
		$total_pages = $this->model->product->count_by_category($category['id'], $no_of_records_per_page);
		$products = $this->model->product->pagination_by_category($category['id'], $offset, $no_of_records_per_page);

		$this->view->load("category/show_product", [
			'category' => $category,
			'products' => $products,
			'total_pages' => $total_pages,
			'pageno' => $pageno
		]);
	}

	public function add()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getParameter('id');
		$categories = $this->model->category->find();
		$this->layout->set('auth_layout');
		$this->view->load('category/add', [
			'categories' => $categories
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

			$category = $this->model->category->create([
				'name' => $name,
			]);
			if ($category) {
				redirect("category/index");
			} else {
				$this->view->load('category/add', [
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
		$category = $this->model->category->find_by_id($id);
		$this->view->load('category/edit', [
			'category' => $category
		]);
	}

	public function update()
	{
		$id = getParameter('id');
		$name = getParameter('name');

		$category = $this->model->category->update_by_id($id, [
			'name' => $name,
		]);

		if ($category) {
			redirect('category/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('category/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	public function destroy()
	{
		$id = getParameter('id');
		$this->model->category->destroy($id);
		redirect('category/index');
	}
}
