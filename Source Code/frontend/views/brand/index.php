<script language="JavaScript" type="text/javascript">
    function checkDelete() {
        return confirm('Bạn có chắc muốn xóa hãng này');
    }
</script>

<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách thương hiệu
                <a class="btn btn-dark float-right" href="<?php echo base_url('brand/add') ?>">Thêm</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Mã hãng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Tên<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($brands as $brand) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $brand['id'] ?></td>
                                    <td class="text-center"><?php echo $brand['name'] ?></td>
                                    <td>
                                        <a class="btn btn-dark btn-block" style="text-decoration: none;" href="<?php echo base_url("brand/edit?id={$brand['id']}") ?>">Cập nhật</a>
                                        <a class="btn btn-dark btn-block" onclick="return checkDelete()" style="text-decoration: none;" href="<?php echo base_url("brand/destroy?id={$brand['id']}") ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                    // foreach ($product_sizes as $product_size) {
                    //     echo $product_size['product_id'] . '<br>';
                    // }
                    ?>

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