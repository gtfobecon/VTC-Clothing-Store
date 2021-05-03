<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách đơn hàng được nhận</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Đối tác nhận đơn hàng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Giá vận chuyển<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                                <th>Tình trạng giao hàng<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($partners as $partner) : ?>
                                <?php foreach ($orders as $order) : ?>
                                    <?php if ($order['status'] != "Đang xử lý" && $order['status'] != "Đã hủy") : ?>
                                        <?php if ($order['partner_id'] == $partner['id']) : ?>
                                            <tr>
                                                <td><?php echo $order['id'] ?></td>
                                                <td><?php echo $partner['name'] ?></td>
                                                <td><?php echo $partner['price'] ?></td>
                                                <td><?php echo $order['status'] ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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