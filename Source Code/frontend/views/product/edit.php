<a href="<?php echo base_url('product/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Cập nhật</h3>
    <p>Cập nhật thông tin sản phẩm</p>
    <form action="<?php echo base_url("product/update&id={$product['id']}") ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên <span class="red">*</span></label>
            <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
        </div>
        <div class="form-group">
            <label for="price">Giá <span class="red">*</span></label>
            <input name="price" class="form-control" value="<?php echo $product['price']; ?>">
        </div>
        <div class="form-group">
            <label for="image">Ảnh <span class="red">*</span></label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Loại<span class="red">*</span></label>
            <select id="category" name="category[]" class="form-control category[]">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id'] ?>">
                        <?php echo $category['name']  ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="brand">Thương hiệu <span class="red">*</span></label>
            <select name="brand[]" class="form-control brand[]">
                <?php foreach ($brands as $brand) : ?>
                    <option value="<?php echo $brand['id'] ?>">
                        <?php echo $brand['name']  ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-dark" value="Cập nhật" />
    </form>
</div>
<?php if (!empty($errors)) : ?>

    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>