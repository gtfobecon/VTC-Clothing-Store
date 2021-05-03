<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span><a href="<?php echo base_url('cart/index') ?>">Giỏ hàng</a><span class="mx-2 mb-0">/</span><a href="<?php echo base_url('cart/checkprofile') ?>">Xác nhận thông tin</a><span class="mx-2 mb-0">/</span><strong class="text-black">Đặt hàng</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mr-auto ml-auto">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
                        <form action="<?php echo base_url("order/store") ?>" method="post">
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Sản phẩm</th>
                                        <th>Thành tiền</th>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                        $total_price = 0 ?>
                                        <?php foreach ($carts as $cart) : ?>
                                            <?php foreach ($products as $product) : ?>
                                                <?php foreach ($sizes as $size) : ?>
                                                    <?php if ($cart['user_id'] == $_SESSION['id']) : ?>
                                                        <?php if ($cart['product_id'] == $product['id']) : ?>
                                                            <?php if ($cart['size_id'] == $size['id']) : ?>
                                                                <tr>
                                                                    <td><?php echo $product['name'] ?> <strong class="mx-2">x</strong>Kích thước: <?php echo $size['name'] ?><strong class="mx-2">x</strong>Số lượng: <?php echo $cart['quantity'] ?></td>
                                                                    <?php $price = $product['price'] * $cart['quantity'] ?>
                                                                    <td><?php echo number_format($price, 0, '.', ',') . ' VNĐ' ?></td>
                                                                    <?php $total += $price ?>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Giá tạm tính</strong></td>
                                            <td class="text-black"><?php echo number_format($total, 0, '.', ',') . ' VNĐ' ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Giá vận chuyển</strong></td>
                                            <?php if ($delivery_type == 'Giao hàng nhanh') : ?>
                                                <td><?php echo number_format(80000, 0, '.', ',') . ' VNĐ' ?></td>
                                                <input name="delivery_type" type="hidden" value="<?php echo $delivery_type ?>">
                                                <?php $total_price = $total + 80000 ?>
                                            <?php else : ?>
                                                <td><?php echo number_format(40000, 0, '.', ',') . ' VNĐ' ?></td>
                                                <input name="delivery_type" type="hidden" value="<?php echo $delivery_type ?>">
                                                <?php $total_price = $total + 40000 ?>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Số tiền phải trả</strong></td>
                                            <td class="text-black font-weight-bold"><strong> <?php echo number_format($total_price, 0, '.', ',') . ' VNĐ' ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đặt hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>