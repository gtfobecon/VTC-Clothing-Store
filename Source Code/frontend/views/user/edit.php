<script language="JavaScript" type="text/javascript">
    function checkUpdate() {
        return confirm("Bạn Có Chắc Muốn Cập Nhật Lại Thông Tin Người Dùng Này");
    }
</script>
<a href="<?php echo base_url('user/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Cập nhật thông tin người dùng</h3>
    <form action="<?php echo base_url("user/update&id={$user['id']}") ?>" method="post" enctype="multipart/form-data">
        <form>
            <div class="form-group">
                <label for="Name">Tên Người Dùng</label>
                <input type="text" class="form-control" id="Name" name="name" placeholder="Tên người dùng" value="<?php echo $user['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="inputAddress">Địa Chỉ</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ" value="<?php echo $user['address'] ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" class="form-control" id="phone" name="phone_number" pattern="[0-9]{10,11}" placeholder="Số điện thoại" value="<?php echo $user['phone_number'] ?>" required>
                <small>Số điện thoại không chứa kí tự và không quá 11 số</small>
            </div>
            <button type="submit" class="btn btn-dark" onclick=" checkUpdate()">Cập Nhật</button>
        </form>
    </form>
</div>