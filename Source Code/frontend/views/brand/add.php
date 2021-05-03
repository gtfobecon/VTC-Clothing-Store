<script language="JavaScript" type="text/javascript">
    function checkAdd() {
        return confirm('Bạn có chắc muốn thêm hãng này');
    }
</script>

<a href="<?php echo base_url('brand/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h3>Tạo mới một thương hiệu</h3>
    <form action="<?php echo base_url('brand/store') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên <span class="red">*</span></label>
            <input type="text" name="name" class="form-control" required>
            <span class="invalid-feedback"></span>
        </div>
        <input type="submit" class="btn btn-dark" value="Thêm mới" />
    </form>
</div>