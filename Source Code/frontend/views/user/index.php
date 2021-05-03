<script language="JavaScript" type="text/javascript">
    function checkDelete() {
        return confirm("Bạn Có Chắc Chắn Muốn Xoá Người Dùng Này");
    }
</script>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Danh sách người dùng<a class="btn btn-dark float-right" href="<?php echo base_url('user/add') ?>">Thêm</a>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                            <th>Xóa Người Dùng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['name'] ?></td>
                                <td><?php echo $user['address'] ?> </td>
                                <td><?php echo $user['phone_number'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td>
                                    <?php if ($user['role'] == 1) : ?>
                                        <?php echo 'Quản trị' ?>
                                    <?php elseif ($user['role'] == 2) : ?>
                                        <?php echo 'Khách hàng' ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($user['role'] == 1) : ?>
                                        <input class="btn btn-dark btn-block" value="Cập Nhật" disabled>
                                    <?php else : ?>
                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("user/edit?id={$user['id']}") ?>"> Cập Nhật</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($user['role'] == 1) : ?>
                                        <input class="btn btn-dark btn-block" value="Xóa" disabled>
                                    <?php else : ?>
                                        <a class="btn btn-dark btn-block" href="<?php echo base_url("user/destroy?id={$user['id']}") ?>" onclick="return checkDelete()">Xóa</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>