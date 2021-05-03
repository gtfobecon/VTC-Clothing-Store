<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách sản phẩm
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody><?php foreach ($comments as $comment) : ?>
                                <?php foreach ($products as $product) : ?>
                                    <?php if ($product['id'] == $comment['product_id']) : ?>
                                        <tr>
                                            <td><?php echo $product['name'] ?>
                                                <?php foreach ($commentActives as $commentActive) : ?>
                                                    <?php if ($product['id'] == $commentActive['product_id']) : ?>
                                                        <?php if ($commentActive['active'] == 0) : ?>
                                                        <?php else : ?>
                                                            <span class="d-inline-block bag border border-danger bg-light" style="font-size: 15px">
                                                                <span class="number text-danger">
                                                                    <?php echo  $commentActive['active']; ?>
                                                                </span>
                                                            </span>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                <?php endforeach; ?>

                                            </td>
                                            <td class="">
                                                <a class="btn btn-dark btn-block" href="<?php echo base_url("comment/show&id={$comment['product_id']}") ?>">Xem Bình Luận</a>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>