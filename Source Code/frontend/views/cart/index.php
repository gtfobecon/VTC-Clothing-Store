<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Giỏ hàng</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="site-blocks-table">
                <?php $total_price = 0 ?>
                <?php if (empty($carts) || empty($_SESSION['id'])) : ?>
                    <div class="text-center">
                        <?php if (!empty($error_message)) : ?>
                            <?php echo $error_message ?>
                        <?php endif; ?>
                        <h3 class="ml-3">Giỏ hàng chưa có sản phẩm</h3>
                    </div>
                <?php else : ?>
                    <?php if (!empty($error_message)) : ?>
                        <?php echo $error_message ?>
                    <?php endif; ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Kích thước</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                                <th>Cập nhật</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <?php foreach ($carts as $cart) : ?>
                            <?php foreach ($products as $product) : ?>
                                <?php foreach ($sizes as $size) : ?>
                                    <?php if ($cart['user_id'] == $_SESSION['id']) : ?>
                                        <?php if ($cart['product_id'] == $product['id']) : ?>
                                            <?php if ($cart['size_id'] == $size['id']) : ?>
                                                <tbody>
                                                    <tr>
                                                        <form action="<?php echo base_url("cart/update_to_cart") ?>" method="post">
                                                         <input type="hidden" class="form-control text-center" name="product_id" value="<?php echo $product['id']; ?>">
                                                            <td>
                                                                <img width="100" src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid">
                                                            </td>
                                                            <td>
                                                                <a href='<?php echo base_url("product/show?id={$product['id']}") ?>'>
                                                                    <h2 class="h5 text-black"><?php echo $product['name']; ?></h2>
                                                                </a>
                                                            </td>
                                                            <td><input class="form-control text-center" type="hidden" name="size_id" value=" <?php echo $size['id']; ?>"><h5><?php echo $size['name']; ?></h5></td>
                                                            <td><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></td>
                                                            <td width='100px'>
                                                                <input type="text" class="form-control text-center" name="quantity" value="<?php echo $cart['quantity']; ?>">
                                                            </td>
                                                            <?php $total = ((float) $cart['quantity']) *  $product['price'] ?>
                                                            <td><?php echo number_format($total, 0, '.', ',') . ' VNĐ' ?></td>
                                                            <?php $total_price += $total; ?>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary height-auto btn-sm">Cập nhật</button>
                                                            </td>
                                                        </form>
                                                        <td>
                                                            <form action="<?php echo base_url("cart/destroy_a_product_cart") ?>" method="post">
                                                                <input type="hidden" class="form-control text-center" name="product_id" value="<?php echo $product['id']; ?>">
                                                                <input class="form-control text-center" type="hidden" name="size_id" value=" <?php echo $size['id']; ?>">
                                                                <button type="submit" class="btn btn-primary height-auto btn-sm">X</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <form action="<?php echo base_url("cart/destroy_to_cart") ?>" method="post">
                            <button type="submit" class="btn btn-outline-primary btn-sm btn-block">Xóa tất cả sản phẩm</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url("home/index") ?>" class="btn btn-outline-primary btn-sm btn-block pt-lg-2">Tiếp tục mua hàng</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Khuyến mại</label>
                        <p>Nhập mã phiếu giảm giá nếu có.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Mã giảm giá">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm px-4">Xác nhận</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Tổng giỏ hàng</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Giá tạm tính</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">
                                    <?php echo number_format($total_price, 0, '.', ',') . ' VNĐ' ?>
                                </strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo base_url("cart/checkprofile") ?>" class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Xác nhận đơn hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>