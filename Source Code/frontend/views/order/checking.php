<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Trạng thái đơn hàng</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Trạng thái đơn hàng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <?php if ($order['status'] != "Đang xử lý" && $order['status'] != "Đã hủy") : ?>
                                    <tr>
                                        <td><?php echo $order['id'] ?></td>
                                        <td><?php echo $order['status'] ?></td>
                                        <td>
                                            <?php if ($order['status'] != "Đã giao") : ?>
                                                <a class="btn btn-dark btn-block" href="<?php echo base_url("order/edit_checking?id={$order['id']}") ?>">Cập nhật</a>
                                            <?php else : ?>
                                                <a class="btn btn-dark btn-block disabled" href="<?php echo base_url("order/edit_checking?id={$order['id']}") ?>">Cập nhật</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
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