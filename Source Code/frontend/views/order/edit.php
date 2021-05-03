<a href="<?php echo base_url('order/index') ?>" class="btn btn-dark"><i class="fa fa-backward"></i> Trở về</a>
<div class="card card-body bg-light mt-5">
    <h3>Cập nhật đơn hàng</h3>
    <form action="<?php echo base_url("order/update&id={$order['id']}") ?>" method="post">
        <div class="form-group">
            <label for="status">Chọn đối tác giao hàng<span class="red">*</span></label>
            <select name="partner" id="status" class="form-control">
                <?php foreach ($partners as $partner) : ?>
                    <?php if ($partner['delivery_type'] == $order['delivery_type']) : ?>
                        <option value="<?php echo $partner['id'] ?>">
                            <?php echo $partner['name']; ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <?php if ($order['status'] != 'Đang xử lý') : ?>
            <div class="form-group">
                <label for="status">Chọn đối tác giao hàng<span class="red">*</span></label>
                <select name="status" id="" class="form-control">
                    <option value="Đang giao">Đang giao</option>
                    <option value="Đã hủy">Đã hủy</option>
                </select>
            </div>
        <?php endif; ?>
        <input type="submit" class="btn btn-dark" value="Cập nhật" onclick="confirm()" />
    </form>
</div>
<script>
    function confirm() {
        return confirm('Bạn có chắc muốn cập nhật đơn hàng này không?');
    }
</script>
<?php if (!empty($errors)) : ?>

    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>