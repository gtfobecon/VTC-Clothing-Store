<?php $_SESSION['transaction'] = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>
<div class="bg-light py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-0"><a href="<?php echo base_url("home/index") ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Lịch sử giao dịch</strong></div>
		</div>
	</div>
</div>
<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col-sm-3 border-right">
			<h3>Thông tin tài khoản</h3>
			<ul class="list-group mt-3">
				<li class="list-group-item">
					<a href="<?php echo base_url("user/profile"); ?>">Thông tin cá nhân</a>
				</li>
				<li class="list-group-item">
					<a href="<?php echo base_url("user/password"); ?>">Thay đổi mật khẩu</a>
				</li>
				<?php if ($_SESSION['id'] != 1) : ?>
					<li class="list-group-item bg-dark">
						<a class="text-light" href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="col-sm-9">
			<h3>Lịch sử giao dịch</h3>
			<div class="border-bottom"></div>
			<?php if (count($orders) == 0) : ?>
				<br>
				<p class="text-center mt-4">------------------------------------------------------------------------------------</p>
				<h3 class="text-center"><a href="<?php echo base_url("home/index"); ?>">Bạn chưa mua hàng lần nào</a></h3>
				<p class="text-center">------------------------------------------------------------------------------------</p>
				<br>
			<?php else : ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col" style="text-align: center;">Mã đơn hàng</th>
							<th scope="col" style="text-align: center;">Kiểu giao hàng</th>
							<th scope="col" style="text-align: center;">Trạng thái</th>
							<th scope="col" style="text-align: center;">Tổng giá</th>
							<th scope="col" style="text-align: center;">Ngày tạo</th>
							<th scope="col" style="text-align: center;">Thao tác</th>
						</tr>
					</thead>
					<?php foreach ($orders as $order) : ?>
						<tr>
							<?php if ($_SESSION['id'] == $order['user_id']) : ?>
								<td> <?php echo $order['id'] ?> </td>
								<td> <?php echo $order['delivery_type'] ?></td>
								<td> <?php echo $order['status'] ?> </td>
								<td>
									<?php
									if ($order['delivery_type'] == 'Giao hàng nhanh') {
										// echo $price = $order['price'] + 80000;
										echo number_format($price = $order['price'] + 80000, 0, '.', ',') . ' VNĐ';
									} else {
										// echo $price = $order['price'] + 40000;
										echo number_format($price = $order['price'] + 40000, 0, '.', ',') . ' VNĐ';
									}
									?>
								</td>
								<td> <?php echo $order['created_at'] ?></td>
								<td>
									<a href="<?php echo base_url("order/show?id={$order['id']}") ?>" class="btn btn-sm btn-primary btn-block mb-2" style="padding-top:10px;">Chi tiết</a>
									<?php if ($order['status'] == 'Đang xử lý') : ?>
										<a href="<?php echo base_url("order/cancel?id={$order['id']}") ?>" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter" style="padding-top:10px;">Hủy</a>
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<form action="<?php echo base_url("order/cancel?id={$order['id']}"); ?>" method="post">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Tại sao bạn muốn hủy đơn hàng?</h5>
															<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="radio">
																<label><input type="radio" name="reason_cancel" value="Muốn mua sản phẩm khác">Muốn mua sản phẩm khác</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="reason_cancel" value="Thủ tục thanh toán quá rắc rối">Thủ tục thanh toán quá rắc rối</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="reason_cancel" value="Tìm thấy giá rẻ hơn ở một nơi khác">Tìm thấy giá rẻ hơn ở một nơi khác</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="reason_cancel" value="Đổi ý, không muốn mua nữa">Đổi ý, không muốn mua nữa</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="reason_cancel" value="Lý do khác">Lý do khác</label>
															</div>
															<div class="form-group">
																<?php if (!empty($errors['reason_empty'])) : ?>
																	<?php echo $errors['reason_empty'] ?>
																<?php endif; ?>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Quay lại</button>
															<button type="submit" class="btn btn-sm btn-primary">Xác nhận</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php endif; ?>
								</td>

							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item">
						<a class="page-link" href="<?php echo base_url("order/transaction_history") . '&pageno=1' ?>">&lt;&lt;</a></li>
					<li class="page-item <?php if ($pageno <= 1) echo 'disabled'; ?>">
						<a class="page-link" href="<?php if ($pageno <= 1) echo '#';
													else echo base_url("order/transaction_history") . '&pageno=' . ($pageno - 1); ?>">&lt;</a></li>
					<li class="page-item disabled"><a class="page-link"><?php echo $pageno ?>/<?php echo $total_pages ?></a></li>
					<li class="page-item <?php if ($pageno >= $total_pages) echo 'disabled'; ?>">
						<a class="page-link" href="<?php if ($pageno >= $total_pages) echo '#';
													else echo base_url("order/transaction_history") . '&pageno=' . ($pageno + 1); ?>">&gt;</a>
					</li>
					<li class="page-item"><a class="page-link" href="<?php echo base_url("order/transaction_history") . '&pageno=' . $total_pages; ?>">&gt;&gt;</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>