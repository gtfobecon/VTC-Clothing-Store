<?php


define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/frontend');
define('BASE_URL', 'http://localhost:8889/ProjectSEM2/');
define('CSS_URL', BASE_URL . '/public/css/');
define('JS_URL', BASE_URL . '/public/js/');
define('FONTS_URL', BASE_URL . '/public/fonts/');
define('IMG_URL', BASE_URL . '/public/images/');
define('PRODUCT_URL', BASE_URL . '/public/uploads/');
define('TEMPLATE_URL', BASE_URL . '/public/assets/');
require BASE_PATH . '/config/constant.php';
require BASE_PATH . '/core/Common.php';

load_app();
