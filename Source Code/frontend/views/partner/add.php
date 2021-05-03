<script language="JavaScript" type="text/javascript">
    function checkAdd() {
        return confirm('Bạn có chắc muốn thêm đối tác này');
    }
</script>

<a href="<?php echo base_url('partner/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>

<div class="form-container mt-5">
    <h2>Thêm đối tác giao hàng</h2>

    <form action="<?php echo base_url('partner/store') ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Name">Tên đối tác</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder="Tên đối tác" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <?php if (!empty($errors['email_err'])) : ?>
                        <?php echo $errors['email_err'] ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone_number" pattern="[0-9]{10,11}" placeholder="Số điện thoại" required>
                    <small>Số điện thoại không chứa kí tự và không quá 11 số</small>
                    <?php if (!empty($errors['phone_err'])) : ?>
                        <?php echo $errors['phone_err'] ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Giá vận chuyển</label>
                    <input type="number" class="form-control" id="phone" name="price" placeholder="Giá vận chuyển" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Kiểu giao hàng</label>
                    <select name="delivery_type" id="inputState" class="form-control">
                        <option selected>Chọn kiểu giao hàng...</option>
                        <option>Giao hàng nhanh</option>
                        <option>Giao hàng tiêu chuẩn</option>
                    </select>
                    <?php if (!empty($errors['delivery_type_err'])) : ?>
                        <?php echo $errors['delivery_type_err'] ?>
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary bt1 " onclick="return checkAdd()">Thêm mới</button>
        </form>
    </form>