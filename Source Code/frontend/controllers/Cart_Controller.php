<?php
class Cart_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$sizes = $this->model->size->find();
		$products = $this->model->product->find();
		$carts = $this->model->cart->find();
		$count = count($carts);
		$_SESSION['count'] = $count;
		$this->view->load("cart/index", [
			'sizes' => $sizes,
			'products' => $products,
			'carts' => $carts
		]);
	}

	public function checkout()
	{
		$sizes = $this->model->size->find();
		$products = $this->model->product->find();
		$carts = $this->model->cart->find();
		$partners = $this->model->partner->find();
		$delivery_type = getPostParameter('delivery_type');
		if (!empty($delivery_type)) {
			$delivery_type = 'Giao hàng nhanh';
		} else {
			$delivery_type = 'Giao hàng tiêu chuẩn';
		}
		$this->view->load("cart/checkout", [
			'sizes' => $sizes,
			'products' => $products,
			'carts' => $carts,
			'partners' => $partners,
			'delivery_type' => $delivery_type
		]);
	}
	public function checkprofile()
	{
		$this->view->load("cart/checkprofile");
	}

	public function add_to_cart()
	{
		$id = $_SESSION['id'];
		$product_id = $_SESSION['product_id'];
		$size_id = getPostParameter('size');
		$quantity = getPostParameter('quantity');
		$carts = $this->model->cart->find_product_from_cart($_SESSION['id']);
		$cart = $this->model->cart->find_by_product_id($product_id, $size_id);
		$product_size = $this->model->product_size->find_by_product_id($product_id, $size_id);
		$product_size_quantity = (int) $product_size['quantity_stock'];
		if ($quantity > $product_size_quantity) {
			$carts = $this->model->cart->find();
			$products = $this->model->product->find();
			$sizes = $this->model->size->find();
			$this->view->load('cart/index', [
				'error_message' => 'Số lượng sản phẩm mà bạn chọn không còn đủ',
				'carts' => $carts,
				'products' => $products,
				'sizes' => $sizes
			]);
		} else {
			if (count($carts) > 0) {
				$quantity += $cart['quantity'];
				if ($cart) {
					$this->model->cart->update_by_id($cart['id'], [
						'user_id' => $id,
						'product_id' => $product_id,
						'size_id' => $size_id,
						'quantity' => $quantity
					]);
				} else {
					$this->model->cart->create([
						'user_id' => $id,
						'product_id' => $product_id,
						'size_id' => $size_id,
						'quantity' => $quantity
					]);
				}
			} else {
				$this->model->cart->create([
					'user_id' => $id,
					'product_id' => $product_id,
					'size_id' => $size_id,
					'quantity' => $quantity
				]);
			}
			unset($_SESSION['product_id']);
			unset($_SESSION['cart']);
			$carts = $this->model->cart->find_product_from_cart($_SESSION['id']);
			$count = count($carts);
			$_SESSION['cart'] = $count;
			redirect("cart/index");
		}
	}

	public function update_to_cart()
	{
		$id = $_SESSION['id'];
		$product_id = getPostParameter('product_id');
		$size_id = getPostParameter('size_id');
		$quantity = getPostParameter('quantity');
		$product_size = $this->model->product_size->find_by_product_id($product_id, $size_id);
		$product_size_quantity = (int) $product_size['quantity_stock'];
		if ($quantity > $product_size_quantity) {
			$carts = $this->model->cart->find();
			$products = $this->model->product->find();
			$sizes = $this->model->size->find();
			$this->view->load('cart/index', [
				'error_message' => 'Số lượng sản phẩm mà bạn chọn không còn đủ',
				'carts' => $carts,
				'products' => $products,
				'sizes' => $sizes
			]);
		} else {
			$this->model->cart->update_product_to_cart($id, $product_id, $size_id, [
				'quantity' => $quantity
			]);
			redirect("cart/index");
		}
	}

	public function destroy_to_cart()
	{
		$this->layout->set(null);
		$id = $_SESSION['id'];
		if ($id) {
			unset($_SESSION['cart']);
			$this->model->cart->destroy_product_by_user($id);
			redirect("cart/index");
		}
	}

	public function destroy_a_product_cart()
	{
		$this->layout->set(null);
		$user_id = $_SESSION['id'];
		$product_id = getPostParameter('product_id');
		$size_id = getPostParameter('size_id');
		$this->model->cart->destroy_product_by_cart($user_id, $product_id, $size_id);
		redirect('cart/index');
	}
}
