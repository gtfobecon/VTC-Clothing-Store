<div class="site-blocks-cover" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-start">
                <div class="site-block-cover-content">
                    <h2 class="sub-title">Phong cách của phái mạnh</h2>
                    <h1>Hào hoa phong nhã</h1>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="<?php echo IMG_URL . 'leeminho.png' ?>" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="site-blocks-cover inner-page py-5 aos-init aos-animate" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-start">
                <div class="site-block-cover-content">
                    <h2 class="sub-title">Mua trực tiếp tại cửa hàng được giảm giá 50%</h2>
                    <h1>Áp dụng từ ngày 20-27/11</h1>
                </div>
            </div>
            <div class="col-md-6 order-1 align-self-end">
                <img src="<?php echo IMG_URL . 'promo.png' ?>" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="title-section mb-5">
            <h2 class="text-uppercase">
                <span class="d-block">KHÁM PHÁ</span>
                BỘ SƯU TẬP
            </h2>
        </div>
        <div class="row align-items-stretch text-center">
            <div class="col-lg-8">
                <div class="product-item sm-height full-height bg-gray">
                    <h1>Vest</h1>
                    <a href="<?php echo base_url("category/show_product?id=1"); ?>" class="product-category"><span>Xem.thêm</span></a>
                    <img src="<?php echo IMG_URL . 'vest.png' ?>" alt="Image" class="img-fluid" id="vest">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-item sm-height bg-gray mb-4">
                    <h1>Áo Da</h1>
                    <a href="<?php echo base_url("category/show_product?id=7"); ?>" class="product-category"><span>Xem.thêm</span></a>
                    <img src="<?php echo IMG_URL . 'ao_da.png' ?>" alt="Image" class="img-fluid" id="ao_da">
                </div>
                <div class="product-item sm-height bg-gray">
                    <h1>Sơ Mi</h1>
                    <a href="<?php echo base_url("category/show_product?id=2"); ?>" class="product-category"><span>Xem.thêm</span></a>
                    <img src="<?php echo IMG_URL . 'so_mi.png' ?>" alt="Image" class="img-fluid" id="so_mi">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12 p-5">
                <h2 class="text-uppercase">Bộ sưu tập VEST mới</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3">
                <div class="nonloop-block-3 owl-carousel">
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['category_id'] == 1) : ?>
                            <div class="item">
                                <a href="<?php echo base_url("product/show?id={$product['id']}") ?>" class="item-entry">
                                    <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid"> <br>
                                    <h2 class="item-title"><?php echo $product['name'] ?></h2>
                                    <p class="item-price"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></p>
                                </a>
                            </div>
                            <?php if (empty($count_vest)) : ?>
                                <?php $count_vest = 1; ?>
                            <?php else : ?>
                                <?php $count_vest += 1 ?>
                            <?php endif; ?>
                            <?php if ($count_vest >= 6) : ?>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12 p-5">
                <h2 class="text-uppercase">Bộ sưu tập Áo Da mới</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3">
                <div class="nonloop-block-3 owl-carousel">
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['category_id'] == 7) : ?>
                            <div class="item">
                                <a href="<?php echo base_url("product/show?id={$product['id']}") ?>" class="item-entry">
                                    <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid"> <br>
                                    <h2 class="item-title"><?php echo $product['name'] ?></h2>
                                    <p class="item-price"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></p>
                                </a>
                            </div>
                            <?php if (empty($count_aoda)) : ?>
                                <?php $count_aoda = 1; ?>
                            <?php else : ?>
                                <?php $count_aoda += 1 ?>
                            <?php endif; ?>
                            <?php if ($count_aoda >= 6) : ?>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12 p-5">
                <h2 class="text-uppercase">Bộ sưu tập Sơ Mi mới</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-3">
                <div class="nonloop-block-3 owl-carousel">
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['category_id'] == 2) : ?>
                            <div class="item">
                                <a href="<?php echo base_url("product/show?id={$product['id']}") ?>" class="item-entry">
                                    <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid"> <br>
                                    <h2 class="item-title"><?php echo $product['name'] ?></h2>
                                    <p class="item-price"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></p>
                                </a>
                            </div>
                            <?php if (empty($count_somi)) : ?>
                                <?php $count_somi = 1; ?>
                            <?php else : ?>
                                <?php $count_somi += 1 ?>
                            <?php endif; ?>
                            <?php if ($count_somi >= 6) : ?>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>