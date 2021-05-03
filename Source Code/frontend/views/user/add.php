<script language="JavaScript" type="text/javascript">
    function checkAdd() {
        return confirm("Bạn Có Chắc Muốn Thêm Người Dùng Mới");
    }
</script>
<a href="<?php echo base_url('user/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Tạo mới một người dùng</h3>
    <form action="<?php echo base_url('user/store') ?>" method="post" enctype="multipart/form-data" style="margin-left: 30px;">
        <div class="form-group">
            <label for="Name">Tên Người Dùng</label>
            <input type="text" class="form-control" id="Name" name="name" placeholder="Tên người dùng" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa Chỉ</label>
            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ" required>
        </div>
        <div class="form-group">
            <label for="phone">Số Điện Thoại</label>
            <input type="text" class="form-control" id="phone" name="phone_number" pattern="[0-9]{10,11}" placeholder="Số điện thoại" required>
            <small>Số điện thoại không chứa kí tự và không quá 11 số</small>
            <?php if (!empty($errors['phone_err'])) : ?>
                <?php echo $errors['phone_err'] ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <?php if (!empty($errors['email_err'])) : ?>
                <?php echo $errors['email_err'] ?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="password">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
            <?php if (!empty($errors['password_err'])) : ?>
                <?php echo $errors['password_err'] ?>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-dark" onclick="return checkAdd()">Thêm mới</button>
    </form>
</div>