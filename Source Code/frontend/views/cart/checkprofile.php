<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span><a href="<?php echo base_url('cart/index') ?>">Giỏ hàng</a><span class="mx-2 mb-0">/</span><strong class="text-black">Xác nhận thông tin</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row ml-auto mr-auto">
            <div class="col-md-7 mb-5 mb-md-0 mr-auto ml-auto">
                <h2 class="h3 mb-3 text-black">Thông tin khách hàng</h2>
                <div class="p-3 p-lg-5 border">
                    <form action="<?php echo base_url("cart/checkout") ?>" method="post">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Tên khách hàng<span class="text-danger">*</span></label>
                                <h3><b><?php echo $_SESSION['name'] ?></b></h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
                                <h3><b><?php echo $_SESSION['address'] ?></b></h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                                <h3><b><?php echo $_SESSION['phone_number'] ?></b></h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <b>Mặc định giao hàng tiêu chuẩn ( từ 7 - 10 ngày ).</b>
                            </div>
                            <div class="col-md-12">
                                <b>Bạn có thể chọn giao hàng nhanh (nếu muốn) :</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="delivery_type" name="delivery_type" value="Giao hàng nhanh">
                                <label class="form-check-label" for="delivery_type">Giao hàng nhanh ( từ 3 - 5 ngày )</label>
                            </div>
                            <?php if (!empty($error_message)) : ?>
                                <?php echo $error_message ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <input type="submit" value="Tiếp tục" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>