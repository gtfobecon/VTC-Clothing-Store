<?php  $_SESSION['url'] = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?php echo base_url("home/index") ?>">Trang chủ</a>
                <span class="mx-2 mb-0">/</span>
                <a href="<?php echo base_url("category/show_product?id={$category['id']}") ?>"><?php echo $category['name'] ?></a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black"><?php echo $product['name'] ?></strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="<?php echo base_url("cart/add_to_cart") ?>" method="post">
            <?php $_SESSION['product_id'] = $product['id'] ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="item-entry">
                        <a href="#product_detail" class="product-item md-height bg-gray d-block">
                            <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid">
                        </a>
                    </div>
                    <a href="#1" class="lightbox trans" id="product_detail"><img src="<?php echo PRODUCT_URL . $product['image'] ?>"></a>
                </div>
                <div class="col-md-6">
                    <h2 class="text-black"><?php echo $product['name'] ?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.</p>
                    <p class="mb-4">Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p>
                    <p><b>Loại sản phẩm : <?php echo $category['name'] ?></b></p>
                    <p><strong class="text-primary h4"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></strong></p>
                    <div id="label" class="mb-1 d-flex">
                        <p class="mr-2"><b>Chọn kích thước : </b></p>
                        <label for="option-sm" class="d-flex mr-3 mb-3">
                            <select name="size" id="sources" class="custom-select sources js-btn-plus" placeholder="Source Type">
                                <?php foreach ($product_size as $product_size) : ?>
                                    <?php foreach ($sizes as $size) : ?>
                                        <?php if ($product_size['size_id'] == $size['id']) : ?>
                                            <option value="<?php echo $size['id'] ?>"><?php echo $size['name'] . ' : ' . $product_size['quantity_stock']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>

                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" name="quantity" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </div>
                    <?php if (empty($_SESSION['id'])) : ?>
                        Bạn cần <a class="btn btn-primary" style="padding-top:10px;" href="<?php echo base_url('user/login') ?>">Đăng nhập</a> để thêm sản phẩm vào giỏ hàng!
                    <?php else : ?>
                        <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Thêm vào giỏ hàng</button></p>
                    <?php endif; ?>
                </div>
        </form>
        <div class="col-md-6">
            <br>
            <form action="<?php echo base_url("comment/store&id={$product['id']}") ?>" method="post">
                <div class="form-content">
                    <div>
                        <?php if (empty($_SESSION['id'])) : ?>
                            <div class="question">
                                <label>Bình luận:</label>
                                <input type="text" class="form-control border-0" name="comment" id="form-href" disabled>
                                <label>Hãy <a href="<?php echo base_url('user/login') ?>">Đăng nhập</a> để bình luận</label>
                            </div>
                            <br>
                        <?php else : ?>
                            <div class="question">
                                <label>Bình luận:</label>
                                <input type="text" name="comment" placeholder="Bình luận......" require>
                                <p><?php echo $_SESSION['name']; ?></p>
                                <div class="buttoncomment">
                                    <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Bình luận</button>
                                </div>
                            </div>
                            <br>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
            <?php foreach ($comments as $comment) : ?>
                <?php foreach ($users as $user) : ?>
                    <?php if ($comment['user_id'] == $user['id']) : ?>
                        <?php if ($comment['product_id'] == $product['id']) : ?>
                            <?php if ($comment['active'] == 'Bật') : ?>
                                <div class="">
                                    <p class=""><?php echo $user['name'] . ' : ' . $comment['content'] ?></p>
                                    <p class=""><?php echo $comment['created_at']; ?></p>
                                    <hr>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <br>
    </div>
</div>
</div>