<a href="<?php echo base_url('product/add') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở lại</a>
<div class="card card-body bg-light mt-5">
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h3>Update quantity stock of a Product</h3>
    <p>Update size of product: <?php echo $product['name'] ?></p>
    <form action="<?php echo base_url('product/update_size') ?>" method="post">
        <div class="form-group">
            <?php if ($product['category_id'] == '1' || $product['category_id'] == '2' || $product['category_id'] == '7' || $product['category_id'] == '8') : ?>
                <label for="size_name">Size name <span class="red">*</span></label>
                <select name="size_name" id="size_name" class="form-control">
                    <option value="1">M</option>
                    <option value="2">L</option>
                    <option value="3">XL</option>
                    <option value="4">XXL</option>
                </select>
            <?php elseif ($product['category_id'] == '6') : ?>
                <label for="size_name">Size name <span class="red">*</span></label>
                <select name="size_name" id="size_name" class="form-control">
                    <option value="5">39</option>
                    <option value="6">40</option>
                    <option value="7">41</option>
                    <option value="8">42</option>
                    <option value="9">43</option>
                </select>
            <?php else : ?>
                <label for="size_name">Size name <span class="red">*</span></label>
                <select name="size_name" id="size_name" class="form-control">
                    <option value="10">Only size</option>
                </select>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity<span class="red">*</span></label>
            <input type="number" name="quantity" id="quantity" class="form-control" require>
        </div>
        <input type="submit" class="btn btn-dark" value="Cập nhật" />
        <?php $_SESSION['product_id'] = $product['id'] ?>
    </form>
</div>