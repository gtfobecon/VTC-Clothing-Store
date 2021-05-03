<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách sản phẩm
                <a class="btn btn-dark float-right" href="<?php echo base_url('product/add') ?>">Thêm</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Tên<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Giá(VNĐ)<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Ảnh<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Loại<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Thương hiệu<i class="fa fa-sort float-right" aria-hidden="true"></th>
                                <th>Số lượng/Size<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <?php foreach ($brands as $brand) : ?>
                                        <?php if ($product['category_id'] == $category['id']) : ?>
                                            <?php if ($product['brand_id'] == $brand['id']) : ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $product['id'] ?></td>
                                                    <td class="text-center"><?php echo $product['name'] ?></td>
                                                    <td class="text-center"><?php echo $product['price'] ?></td>
                                                    <td class="text-center">
                                                        <img width="100" src="<?php echo PRODUCT_URL . $product['image'] ?>">
                                                    </td>
                                                    <td class="text-center"><?php echo $category['name'] ?></td>
                                                    <td class="text-center"><?php echo $brand['name'] ?></td>
                                                    <td>
                                                        <?php foreach ($product_sizes as $product_size) {
                                                                                foreach ($sizes as $size) {
                                                                                    if ($product['id'] == $product_size['product_id']) {
                                                                                        if ($product_size['size_id'] == $size['id']) {
                                                                                            echo '' . $size['name'] . ': ' . $product_size['quantity_stock'] . '<br>';
                                                                                        }
                                                                                    }
                                                                                }
                                                                            } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("product/edit?id={$product['id']}") ?>"> Cập nhật</a>
                                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("product/destroy?id={$product['id']}") ?>" onclick="checkDelete()">Xóa</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>
<script>
    function checkDelete() {
        return confirm("Bạn có muốn xóa sản phẩm này");
    }
</script>