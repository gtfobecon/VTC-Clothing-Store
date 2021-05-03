<?php
class Home_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!empty($_SESSION['id'])) {
			$id = $_SESSION['id'];
			$carts = $this->model->cart->find_product_from_cart($id);
			$count = count($carts);
			$_SESSION['cart'] = $count;
		}
		$products = $this->model->product->find_by_new_products();
		$this->view->load('home/index', [
			'products' => $products,
		]);
	}
	public function search()
	{
		$name = getParameter('name');
		$pageno = getParameter('pageno');

		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}

		$no_of_records_per_page = 9;
		$offset = ($pageno - 1) * $no_of_records_per_page;

		$searchs = $this->model->product->search_products($name);
		$total_rows = count($searchs);
		$total_pages = ceil($total_rows / $no_of_records_per_page);
		$products = $this->model->product->pagination($name, $offset, $no_of_records_per_page);

		$this->view->load("home/search_product", [
			'pageno' => $pageno,
			'total_pages' => $total_pages,
			'products' => $products,
			'name' => $name
		]);
	}
}
