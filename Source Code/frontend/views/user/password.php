<?php if ($_SESSION['role'] == 2) : ?>
	<div class="bg-light py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-0"><a href="<?php echo base_url("home/index") ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Thay đổi mật khẩu</strong></div>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col-sm-3 border-right">
			<h3>Thông tin tài khoản</h3>
			<ul class="list-group mt-3">
				<li class="list-group-item">
					<a href="<?php echo base_url("user/profile"); ?>">Thông tin cá nhân</a>
				</li>
				<li class="list-group-item bg-dark">
					<a class="text-light" href="<?php echo base_url("user/password"); ?>">Thay đổi mật khẩu</a>
				</li>
				<?php if ($_SESSION['id'] != 1) : ?>
					<li class="list-group-item">
						<a href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="col-sm-9">
			<h3>Đổi mật khẩu</h3>
			<div class="border-bottom"></div>
			<?php if (!empty($successfully)) : ?>
				<?php echo $successfully; ?>
			<?php endif; ?>
			<form style="width: 100%;" class="form-content mt-3 mb" action="<?php echo base_url('user/handle_password') ?>" method="post">
				<input type="password" name="old_password" class="info" id="nme" required />
				<label class="change-input" for="nme"><span class="change-name">Mật khẩu cũ:</span></label>
				<?php if (!empty($errors['old_password'])) : ?>
					<?php echo $errors['old_password']; ?>
				<?php endif; ?>
				<input type="password" name="new_password" class="info" id="nme" required />
				<label class="change-input" for="nme"><span class="change-name">Mật khẩu mới:</span></label>
				<?php if (!empty($errors['new_password'])) : ?>
					<?php echo $errors['new_password']; ?>
				<?php endif; ?>
				<input type="password" name="re_new_password" class="info" id="nme" required />
				<label class="change-input" for="nme"><span class="change-name">Nhập lại mật khẩu mới:</span></label>
				<?php if (!empty($errors['re_new_password'])) : ?>
					<?php echo $errors['re_new_password']; ?>
				<?php endif; ?>
				<p class="button ml-auto"><button type="submit">Thay đổi</button></p>
			</form>
		</div>
	</div>
</div>