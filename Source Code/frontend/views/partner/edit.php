<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm('Bạn có chắc muốn cập nhật thông tin mới');
    }
</script>

<a href="<?php echo base_url('partner/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>

<div class="form-container mt-5">
    <h2>Cập nhật đối tác</h2>
    <form action="<?php echo base_url("partner/update&id={$partner['id']}") ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Name">Tên đối tác</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder="Tên đối tác" value="<?php echo $partner['name'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ" value="<?php echo $partner['address'] ?>" required>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone_number" pattern="[0-9]{10,11}" placeholder="Số điện thoại" value="<?php echo $partner['phone_number'] ?>" required>
                    <small>Số điện thoại không chứa kí tự và không quá 11 số</small>
                    <?php if (!empty($errors['phone_err'])) : ?>
                        <?php echo $errors['phone_err'] ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Giá vận chuyển</label>
                    <input type="number" class="form-control" id="phone" name="price" placeholder="Giá vận chuyển" value="<?php echo $partner['price'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Kiểu giao hàng</label>
                    <select name="delivery_type" id="inputState" class="form-control">
                        <option>Giao hàng nhanh</option>
                        <option>Giao hàng tiêu chuẩn</option>
                    </select>
                    <small style="font-size: 15px;">Kiểu giao hàng hiện tại: <?php echo $partner['delivery_type'] ?></small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary bt2" onclick="return checkUpdate()">Cập nhật</button>
        </form>
    </form>