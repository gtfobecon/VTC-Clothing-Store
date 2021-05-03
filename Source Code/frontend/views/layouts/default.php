<!DOCTYPE html>
<html lang="en">

<head>
    <title>VTC Store &mdash; Phong cách phái mạnh</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php echo IMG_URL . 'logo2.png' ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo FONTS_URL . 'icomoon/style.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'magnific-popup.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'jquery-ui.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'owl.theme.default.min.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'aos.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'style.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_URL . 'home.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 60px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
    <div class="site-wrap">
        <div class="site-navbar bg-white py-2">
            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="<?php echo base_url('home/search') ?>" method="post">
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm...">
                    </form>
                </div>
            </div>
            <div class="container">
                <a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet" href="tel:19001008">
                    <div id="calltrap-ico"></div>
                    <div id="box-title">
                        <p>Hotline:19001008</p>
                    </div>
                </a>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="<?php echo base_url("home/index") ?>"><img src="<?php echo IMG_URL . 'logo2.png' ?>" alt="logo" width="100px" height="auto"></a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="<?php echo base_url("category/show_product?id=1"); ?>"><b>VEST</b></a></li>
                                <li><a href="<?php echo base_url("category/show_product?id=7"); ?>"><b>ÁO DA</b></a></li>
                                <li><a href="<?php echo base_url("category/show_product?id=2"); ?>"><b>SƠ MI</b></a></li>
                                <li><a href="<?php echo base_url("category/show_product?id=8"); ?>"><b>QUẦN ÂU</b></a></li>
                                <li><a href="<?php echo base_url("category/show_product?id=6"); ?>"><b>GIÀY DA</b></a></li>
                                <li class="has-children active">
                                    <a href=""><b>PHỤ KIỆN VEST</b></a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url("category/show_product?id=3"); ?>"><b>CARAVAT</b></a></li>
                                        <li><a href="<?php echo base_url("category/show_product?id=4"); ?>"><b>NƠ</b></a></li>
                                        <li><a href="<?php echo base_url("category/show_product?id=5"); ?>"><b>KHĂN CÀI VEST</b></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <nav class="site-navigation ">
                            <ul class="site-menu js-clone-nav d-none d-lg-block ">
                                <li> <a href="#" class="icons-btn d-inline-block js-search-open">
                                        <i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                                </li>
                                <?php if (empty($_SESSION['name'])) : ?>
                                    <a href="<?php echo base_url('user/login') ?>" class="icons-btn d-inline-block" style="color: black;"><i class="fa fa-user fa-lg" aria-hidden="true"></i></a>
                                <?php else : ?>
                                    <li class="has-children ">
                                        <a class="icons-btn d-inline-block"><b>Chào <?php echo $_SESSION['name'] ?></b></a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url('user/profile') ?>">Thông tin cá nhân</a></li>
                                            <li><a href="<?php echo base_url('user/password'); ?>">Thay đổi mật khẩu</a></li>
                                            <li><a href="<?php echo base_url('order/transaction_history'); ?>">Lịch sử giao dịch</a></li>
                                            <!-- <small>-----------------------------------------</small> -->
                                            <li><a class="border-top" href="<?php echo base_url('user/handle_logout') ?>">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                                <li><a href="<?php echo base_url('cart/index') ?>" class="icons-btn d-inline-block bag">
                                        <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                                        <?php if (!empty($_SESSION['id']) && !empty($_SESSION['cart'])) : ?>
                                            <span class="number ">
                                                <?php echo $_SESSION['cart']; ?>
                                            </span>
                                        <?php endif ?>
                                    </a></li>

                            </ul>
                            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $content ?>

        <footer class="site-footer custom-border-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Thông tin liên hệ</h3>
                            <ul class="list-unstyled">
                                <li class="address">Tầng 4, Tòa nhà VTC Online,<br> Hai Bà Trưng, Hà Nội </li>
                                <li class="phone"><a href="tel://23923929210">19001008</a></li>
                                <li class="email">vtcstore@vtc.fashion.vn</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <h3 class="footer-heading mb-3">Dịch vụ <br> khách hàng</h3>
                                <ul class="list-unstyled">
                                    <li><a href="#">New</a></li>
                                    <li><a href="#">Khuyến mại</a></li>
                                    <li><a href="#">VTC và báo chí</a></li>
                                    <li><a href="#">Ưu đãi đối tác</a></li>
                                    <li><a href="#">VTC Video's</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <!-- <div class="col-md-12"> -->
                                <h3 class="footer-heading mb-3">Loại sản phẩm</h3>
                                <ul class="list-unstyled">
                                    <li><a href="#">Vest</a></li>
                                    <li><a href="#">Áo Da</a></li>
                                    <li><a href="#">Sơ Mi</a></li>
                                    <li><a href="#">Quần Âu</a></li>
                                    <li><a href="#">Giày Da</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <h3 class="footer-heading" style="margin-bottom: 32px;"></h3>
                                <ul class="list-unstyled">
                                    <li><a href="#">Caravat</a></li>
                                    <li><a href="#">Nơ</a></li>
                                    <li><a href="#">Khăn Cài Vest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="block-7">
                            <form method="post">
                                <label for="email_subscribe" class="footer-heading">Hãy đăng ký để nhận được thông tin mới nhất</label>
                                <div class="form-group">
                                    <input type="email" class="form-control py-4" id="email_subscribe" placeholder="Nhập email..." require>
                                    <button type="submit" class="btn  btn-primary" onclick="subscribe()">Gửi</button>
                                    <script>
                                        var a = document.getElementById("email_subscribe").value;

                                        function subscribe(a) {
                                            if (a == "") {
                                                return alert("Email không được để trống hoặc không đúng định dạng");
                                            } else {
                                                return alert("Cảm ơn bạn đã đăng ký nhận tin!");
                                            }
                                        }
                                    </script>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12 border-top">
                        <p class="mb-0">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            by <a href="<?php echo BASE_URL ?>" target="_blank" class="text-primary">VTC Store</a>
                        </p>
                    </div>
                </div>
            </div>


            <script>
                //Get the button
                var mybutton = document.getElementById("myBtn");

                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
            <script src="<?php echo JS_URL . 'jquery-3.3.1.min.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'jquery-ui.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'popper.min.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'bootstrap.min.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'owl.carousel.min.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'jquery.magnific-popup.min.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'aos.js'; ?>"></script>
            <script src="<?php echo JS_URL . 'main.js'; ?>"></script>
</body>

</html>