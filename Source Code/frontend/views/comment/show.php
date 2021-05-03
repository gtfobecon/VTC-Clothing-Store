<a href="<?php echo base_url('comment/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>

<div class="row mt-5">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách bình luận theo sản phẩm
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">Tên sản phẩm </th>
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Bình luận</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $products) : ?>
                                <?php foreach ($comments as $comment) : ?>
                                    <?php foreach ($users as $user) : ?>
                                        <?php if ($products['id'] == $comment['product_id']) : ?>
                                            <?php if ($comment['user_id'] == $user['id']) : ?>
                                                <tr>

                                                    <td><?php echo $products['name'] ?> </td>
                                                    <td><?php echo $user['name'] ?> </td>
                                                    <td><?php echo $comment['content'] ?> </td>
                                                    <td><?php echo $comment['active'] ?> </td>
                                                    <td>
                                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("comment/edit?id={$comment['id']}") ?>">Cập nhật</a>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
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