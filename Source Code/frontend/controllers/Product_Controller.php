<?php
class Product_Controller extends Base_Controller
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
		$products = $this->model->product->find();
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$product_sizes = $this->model->product_size->find();
		$sizes = $this->model->size->find();
		$this->view->load('product/index', [
			'products' => $products,
			'sizes' => $sizes,
			'categories' => $categories,
			'product_sizes' => $product_sizes,
			'brands' => $brands
		]);
	}

	public function show()
	{
		$id = getGetParameter('id');

		$product = $this->model->product->find_by_id($id);
		$category = $this->model->category->find_by_id($product['category_id']);
		$product_size = $this->model->product_size->find_by_product_size_id($product['id']);
		$sizes = $this->model->size->find();
		$comments = $this->model->comment->find();
		$users = $this->model->user->find();
		$this->view->load('product/show', [
			'product' => $product,
			'comments' => $comments,
			'category' => $category,
			'users' => $users,
			'sizes' => $sizes,
			'product_size' => $product_size

		]);
	}

	public function add()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}

		$id = getParameter('id');
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$this->layout->set('auth_layout');
		$this->view->load('product/add', [
			'categories' => $categories,
			'brands' => $brands
		]);
	}

	public function store()
	{
		$this->layout->set('auth_layout');
		$name = getPostParameter('name');
		$price = getPostParameter('price');
		$category  = getPostParameter('category');
		$brand = getPostParameter('brand');
		$category_id = $category[0];
		$brand_id = $brand[0];
		$target_dir = "";
		if ($category_id == 1) {
			$target_dir = "vest";
		} elseif ($category_id == 2) {
			$target_dir = "so_mi";
		} elseif ($category_id == 3) {
			$target_dir = "caravat";
		} elseif ($category_id == 4) {
			$target_dir = "no";
		} elseif ($category_id == 5) {
			$target_dir = "khan_cai_vest";
		} elseif ($category_id == 6) {
			$target_dir = "giay_da";
		} elseif ($category_id == 7) {
			$target_dir = "ao_da";
		} elseif ($category_id == 8) {
			$target_dir = "quan_au";
		}

		$errors = [];
		$target_file = $target_dir . '/' . basename($_FILES["image"]["name"]);
		
		if (!move_uploaded_file($_FILES["image"]["tmp_name"], 'public/uploads/' . $target_file)) {
			$errors['faild'] = "Sorry, there was an error uploading your file.";
		}
		if (count($errors) > 0) {
			$categories = $this->model->category->find();
			$brands = $this->model->brand->find();
			$sizes = $this->model->size->find();
			$this->view->load('product/add', [
				'sizes' => $sizes,
				'categories' => $categories,
				'brands' => $brands,
				'errors' => $errors
			]);
		} else {
			$product = $this->model->product->create([
				'name' => $name,
				'price' => $price,
				'image' => $target_file,
				'category_id' => $category_id,
				'brand_id' =>  $brand_id
			]);
			if ($product) {
				redirect("product/edit_size?id={$product['id']}");
			} else {
				$this->view->load('product/add', [
					'error_message' => 'Khong them duoc'
				]);
			}
		}
	}
	function edit_size()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$this->layout->set('auth_layout');
		$id = getGetParameter('id');
		$product = $this->model->product->find_by_id($id);
		$this->view->load('product/edit_size', [
			'product' => $product
		]);
	}

	function update_size()
	{
		$this->layout->set(null);
		$product_id = $_SESSION['product_id'];
		$size_id = getPostParameter('size_name');
		$quantity_stock = getPostParameter('quantity');
		$product = $this->model->product->find_by_id($product_id);
		$product_sizes = $this->model->product_size->find_by_product_size_id($product_id);
		$product_size = $this->model->product_size->find_by_product($product_id, $size_id);
		$quantity_stock += $product_size['quantity_stock'];
		if (count($product_sizes) > 0) {
			if ($product_size['id']) {
				$this->model->product_size->update_by_id($product_size['id'], [
					'quantity_stock' => $quantity_stock
				]);
			} else {
				$this->model->product_size->create([
					'product_id' => $product_id,
					'size_id' => $size_id,
					'quantity_stock' =>  $quantity_stock
				]);
			}
		} else {
			$this->model->product_size->create([
				'product_id' => $product_id,
				'size_id' => $size_id,
				'quantity_stock' =>  $quantity_stock
			]);
		}
		redirect('product/index');
	}

	public function edit()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getParameter('id');
		$product = $this->model->product->find_by_id($id);
		$categories = $this->model->category->find();
		$brands = $this->model->brand->find();
		$product_sizes = $this->model->product_size->find();
		$sizes = $this->model->size->find();
		$this->layout->set('auth_layout');
		$this->view->load('product/edit', [
			'product' => $product,
			'sizes' => $sizes,
			'categories' => $categories,
			'product_sizes' => $product_sizes,
			'brands' => $brands
		]);
	}

	function update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$name = getParameter('name');
		$price = getParameter('price');
		$category = getParameter('category');
		$brand = getParameter('brand');
		$category_id = $category[0];
		$brand_id = $brand[0];
		$errors = [];

		$target_dir = "";
		if ($category_id == 1) {
			$target_dir = "vest";
		} elseif ($category_id == 2) {
			$target_dir = "so_mi";
		} elseif ($category_id == 3) {
			$target_dir = "caravat";
		} elseif ($category_id == 4) {
			$target_dir = "no";
		} elseif ($category_id == 5) {
			$target_dir = "khan_cai_vest";
		} elseif ($category_id == 6) {
			$target_dir = "giay_da";
		} elseif ($category_id == 7) {
			$target_dir = "ao_da";
		} elseif ($category_id == 8) {
			$target_dir = "quan_au";
		}

		$target_file = $target_dir . '/' . basename($_FILES["image"]["name"]);
		if (!move_uploaded_file($_FILES["image"]["tmp_name"], 'public/uploads/' . $target_file)) {
			$errors =  "Sorry, there was an error uploading your file.";
		}
		if (count($errors) > 0) {
			$this->layout->set('auth_layout');
			$this->view->load(('partner/edit'), [
				'errors' => $errors
			]);
		} else {
			$product = $this->model->product->update_by_id($id, [
				'name' => $name,
				'price' => $price,
				'image' => $target_file,
				'category_id' => $category_id,
				'brand_id' =>  $brand_id
			]);
			if ($product) {
				redirect("product/edit_size?id={$id}");
			} else {
				$this->layout->set('auth_layout');
				$this->view->load('product/edit', [
					'error_message' => 'Cập nhật không thành công'
				]);
			}
		}
	}

	public function destroy()
	{
		$id = getParameter('id');
		$this->model->product->destroy($id);
		$this->model->product_size->delete_by_product_id($id);
		redirect('product/index');
	}
}
