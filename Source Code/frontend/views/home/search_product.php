<div class="bg-light py-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?php echo base_url('home/index') ?>">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tìm kiếm sản phẩm</strong></div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row mb-5">
        <?php if (empty($products)) : ?>
            <div class="col-lg">
                <br><br>
                <h3 class="text-center">Không tìm thấy sản phẩm</h3>
                <br><br>
            </div>
        <?php else : ?>
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-4 col-md-4 mb-4">
                    <a href="<?php echo base_url("product/show?id={$product['id']}") ?>" class="item-entry">
                        <img src="<?php echo PRODUCT_URL . $product['image'] ?>" alt="Image" class="img-fluid">
                        <h2 class="item-title"><?php echo $product['name']; ?></h2>
                        <p class="item-price"><?php echo number_format($product['price'], 0, '.', ',') . ' VNĐ' ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url("home/search&name={$name}") . '&pageno=1' ?>">&lt;&lt;</a></li>
            <li class="page-item <?php if ($pageno <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="<?php if ($pageno <= 1) echo '#';
                                            else echo base_url("home/search&name={$name}") . '&pageno=' . ($pageno - 1); ?>">&lt;</a></li>
            <li class="page-item disabled"><a class="page-link"><?php echo $pageno ?>/<?php echo $total_pages ?></a></li>
            <li class="page-item <?php if ($pageno >= $total_pages) echo 'disabled'; ?>">
                <a class="page-link" href="<?php if ($pageno >= $total_pages) echo '#';
                                            else echo base_url("home/search&name={$name}") . '&pageno=' . ($pageno + 1); ?>">&gt;</a>
            </li>
            <li class="page-item"><a class="page-link" href="<?php echo base_url("home/search&name={$name}") . '&pageno=' . $total_pages; ?>">&gt;&gt;</a></li>
        </ul>
    </nav>
</div>