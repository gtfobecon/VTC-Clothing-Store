<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách các loại sản phẩm
                <a class="btn btn-dark float-right" href="<?php echo base_url('category/add') ?>">Thêm</a>
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">Mã loại</th>
                                <th scope="col">Loại Sản Phẩm</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td><?php echo $category['id'] ?></td>
                                    <td><?php echo $category['name'] ?></td>
                                    <td>
                                        <a class="btn btn-dark btn-block" style="text-decoration: none;" href="<?php echo base_url("category/edit?id={$category['id']}") ?>">Cập nhật</a>
                                        <a class="btn btn-dark btn-block" onclick="return checkDelete()" style="text-decoration: none;" href="<?php echo base_url("category/destroy?id={$category['id']}") ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
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