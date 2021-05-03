<?php if ($_SESSION['role'] == 2) : ?>
	<div class="bg-light py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-0"><a href="<?php echo base_url("home/index") ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Thông tin cá nhân</strong></div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="container mt-3 mb-3">
		<div class="row">
			<div class="col-sm-3 border-right">
				<h3>Thông tin tài khoàn</h3>
				<ul class="list-group mt-3">
					<li class="list-group-item bg-dark">
						<a class="text-light" href="<?php echo base_url("user/profile"); ?>">Thông tin cá nhân</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo base_url("user/password"); ?>">Thay đổi mật khẩu</a>
					</li>
					<?php if ($_SESSION['id'] != 1) : ?>
						<li class="list-group-item">
							<a href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a>
						</li>
					<?php endif; ?>

				</ul>
			</div>
			<div class="col-sm-9">
				<h3>Thông tin cá nhân</h3>
				<div class="border-bottom"></div>
				<?php if (!empty($successfully)) : ?>
					<?php echo $successfully; ?>
				<?php endif; ?>
				<form style="width: 100%;" class="form-content mt-3 mb" action="<?php echo base_url('user/handle_update') ?>" method="post">
					<input type="text" name="name" class="info" id="nme" placeholder="<?php echo $_SESSION['name'] ?>" required />
					<label class="change-input" for="nme"><span class="change-name">Tên:</span></label>
					<?php if (!empty($errors['name'])) : ?>
						<?php echo $errors['name']; ?>
					<?php endif; ?>
					<input type="text" name="address" class="info" id="nme" placeholder="<?php echo $_SESSION['address'] ?>" required />
					<label class="change-input" for="nme"><span class="change-name">Địa chỉ:</span></label>
					<?php if (!empty($errors['address'])) : ?>
						<?php echo $errors['address']; ?>
					<?php endif; ?>
					<input type="text" name="phone_number" class="info" id="nme" placeholder="<?php echo $_SESSION['phone_number'] ?>" required />
					<label class="change-input" for="nme"><span class="change-name">Số điện thoại:</span></label>
					<?php if (!empty($errors['phone_number'])) : ?>
						<?php echo $errors['phone_number']; ?>
					<?php endif; ?>
					<p class="button ml-auto"><button type="submit">Thay đổi</button></p>
				</form>
			</div>
		</div>
	</div>
</div>