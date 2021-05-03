<?php
class Order_details_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function store()
	{
		$order_id = getGetParameter('id');
		$carts = $this->model->cart->find();
		$sizes = $this->model->size->find();
		$products = $this->model->product->find();
		foreach ($carts as $cart) {
			$product_size = $this->model->product_size->find_quantity_stock($cart['product_id'], $cart['size_id']);
			$this->model->product_size->update_product_quantity($cart['product_id'], $cart['size_id'], [
				'quantity_stock' => $product_size[0]['quantity_stock'] - $cart['quantity']
			]);
		}
		
		$price = 0;
		foreach ($carts as $cart) {
			foreach ($products as $product) {
				foreach ($sizes as $size) {
					if ($cart['product_id'] == $product['id']) {
						if ($cart['size_id'] == $size['id']) {
							$this->model->order_details->create([
								'order_id' => $order_id,
								'product_id' => $cart['product_id'],
								'size_id' =>  $size['id'],
								'price' => $product['price'] * $cart['quantity'],
								'quantity' => $cart['quantity']
							]);
							$price += $product['price'] * $cart['quantity'];
						}
					}
				}
			}
		}
		$this->model->order->update_by_id($order_id, [
			'price' => $price
		]);
		unset($_SESSION['count']); 
		$this->model->cart->destroy_product_by_user($_SESSION['id']);
		redirect("order/confirm_success");
	}
}
