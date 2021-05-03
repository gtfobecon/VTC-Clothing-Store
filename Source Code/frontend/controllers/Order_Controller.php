<?php
class Order_Controller extends Base_Controller
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
		$orders = $this->model->order->find();
		$count = 0;
		foreach ($orders as $order) {
			if ($order['status'] == 'Đang xử lý') {
				$count++;
			}
		}
		$_SESSION['countOrder'] = $count;
		$comments = $this->model->comment->find();
		$countcomment = 0;
		foreach ($comments as $comment) {
			if ($comment['active'] == 'Tắt') {
				$countcomment++;
			}
		}
		$_SESSION['activecomment'] = $countcomment;
		$this->layout->set('auth_layout');
		$this->view->load('order/index', [
			'orders' => $orders
		]);
	}

	public function show()
	{
		$id = getParameter('id');
		if (empty($_SESSION['role'])) {
			redirect('home/index');
		} elseif ($_SESSION['role'] == 1) {
			$this->layout->set('auth_layout');
		}
		$order = $this->model->order->find_by_id($id);
		$products = $this->model->product->find();
		$sizes = $this->model->size->find();
		$partners = $this->model->partner->find();
		$order_details = $this->model->order_details->find_order_by_order_id($order['id']);
		$this->view->load('order/show', [
			'order' => $order,
			'products' => $products,
			'sizes' => $sizes,
			'partners' => $partners,
			'order_details' => $order_details
		]);
	}

	public function edit()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$id = getGetParameter('id');
		$partners = $this->model->partner->find();
		$order = $this->model->order->find_by_id($id);
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/edit', [
			'order' => $order,
			'partners' => $partners,
			'orders' => $orders
		]);
	}

	public function update()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$status = getParameter('status');
		$partner_id = getPostParameter('partner');
		if ($status == null) {
			$status = 'Đã xử lý';
		}
		$order = $this->model->order->update_by_id($id, [
			'partner_id' => $partner_id,
			'status' => $status
		]);
		if ($order) {
			redirect('order/index');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('order/edit', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}
	public function cancel()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$reason_cancel = getPostParameter('reason_cancel');
		$order_details = $this->model->order_details->find_order_by_order_id($id);
		$product_sizes = $this->model->product_size->find();
		$quantity = 0;
	
		foreach ($order_details as $order_detail) {
			foreach ($product_sizes as $product_size) {
				if ($order_detail['product_id'] == $product_size['product_id'] && $order_detail['size_id'] == $product_size['size_id']) {
					$quantity = $order_detail['quantity'] + $product_size['quantity_stock'];
					$this->model->product_size->update_product_quantity($product_size['product_id'], $product_size['size_id'], [
						'quantity_stock' => $quantity
					]);
				}
			}
		}
		$order = $this->model->order->update_by_id($id, [
			'status' => 'Đã hủy',
			'reason_cancel' => $reason_cancel
		]);
		if ($order) {
			header('location:' . $_SESSION['transaction']);
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('order/transaction', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}
	public function delivery_status()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$partners = $this->model->partner->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/delivery_status', [
			'orders' => $orders,
			'partners' => $partners
		]);
	}

	public function checking()
	{
		if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
			redirect('home/index');
		}
		$orders = $this->model->order->find();
		$this->layout->set('auth_layout');
		$this->view->load('order/checking', [
			'orders' => $orders,
		]);
	}

	public function edit_checking()
	{
		$id = getGetParameter('id');
		$order = $this->model->order->find_by_id($id);
		$this->layout->set('auth_layout');
		$this->view->load('order/edit_checking', [
			'order' => $order
		]);
	}

	public function update_checking()
	{
		$this->layout->set(null);
		$id = getParameter('id');
		$status = getPostParameter('status');
		$order = $this->model->order->update_by_id($id, [
			'status' => $status
		]);
		if ($order) {
			redirect('order/checking');
		} else {
			$this->layout->set('auth_layout');
			$this->view->load('order/edit_checking', [
				'error_message' => 'Cập nhật không thành công'
			]);
		}
	}

	public function transaction_history()
	{
		$pageno = getParameter('pageno');
		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}
		$no_of_records_per_page = 5;
		$offset = ($pageno - 1) * $no_of_records_per_page;
		$total_pages = $this->model->order->count_by_order($_SESSION['id'], $no_of_records_per_page);
		$orders = $this->model->order->pagination_by_order($_SESSION['id'], $offset, $no_of_records_per_page);
		$partners = $this->model->partner->find();
		$this->view->load('order/transaction', [
			'orders' => $orders,
			'partners' => $partners,
			'total_pages' => $total_pages,
			'pageno' => $pageno
		]);
	}
	public function store()
	{
		$this->layout->set(null);
		$id = $_SESSION['id'];
		$delivery_type = getPostParameter('delivery_type');
		$status = 'Đang xử lý';
		$order = $this->model->order->create([
			'user_id' => $id,
			'delivery_type' => $delivery_type,
			'status' => $status
		]);

		redirect("order_details/store?id={$order['id']}");
	}

	public function confirm_success()
	{
		unset($_SESSION['count']);
		$this->view->load('order/confirm_success');
	}
}
