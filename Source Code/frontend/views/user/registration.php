<div class="container mt-2">
    <section id="page-wrapper">
        <div class="wrapper">
            <div class="grid">
                <form class="form-content" action="<?php echo base_url('user/handle_registration') ?>" method="post">
                    <h3><b>Tạo tài khoản</b></h3>
                    <div class="question">
                        <input type="text" name="name" required />
                        <label>Họ và Tên</label>
                        <?php if (!empty($errors['name'])) : ?>
                            <?php echo $errors['name']; ?>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="address" required />
                        <label>Địa chỉ</label>
                        <?php if (!empty($errors['address'])) : ?>
                            <?php echo $errors['address']; ?>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="phone_number" required />
                        <label>Số điện thoại</label>
                        <?php if (!empty($errors['phone_number'])) : ?>
                            <?php echo $errors['phone_number']; ?>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="email" name="email" required />
                        <label>Email</label>
                        <?php if (!empty($errors['email']) || !empty($error_message)) : ?>
                            <?php echo $errors['email']; ?>
                            <?php echo $error_message; ?>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="password" name="password" required />
                        <label>Mật khẩu</label>
                        <?php if (!empty($errors['password']) || !empty($error_message)) : ?>
                            <?php echo $errors['password']; ?>
                            <?php echo $error_message; ?>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="password" name="re_password" required />
                        <label>Nhập lại mật khẩu</label>
                        <?php if (!empty($errors['password'])) : ?>
                            <?php echo $errors['password']; ?>
                        <?php elseif (!empty($errors['re_password'])) : ?>
                            <?php echo $errors['re_password']; ?>
                        <?php endif; ?>
                    </div>
                    <p class="button">
                        <a href="<?php echo base_url('user/login') ?>" id="registration"><b>Đăng nhập </b></a>
                        <small> /</small>
                        <button type="submit">Đăng ký</button>
                    </p>
                </form>
            </div>
        </div>
    </section>
</div>