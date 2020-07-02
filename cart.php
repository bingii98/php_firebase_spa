<?php
include_once __DIR__ . '/model/User.php';
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['_userSignedIn'])) header('Location: login.php');
include_once __DIR__ . '/controller/ListCtl.php';
include_once __DIR__ . '/controller/ProductCtl.php';
$listCtl = new ListCtl();
$productCtl = new ProductCtl();
$arr_list_service = $listCtl->getService();
$arr_list_product = $listCtl->getProduct();
?>
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<header>
    <!-- Header Start -->
    <?php include 'component/header.php' ?>
    <!-- Header End -->
</header>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Cart List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Empty</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $item_total = 0;
                        if (isset($_SESSION["cart_item"])) {
                            foreach ($_SESSION["cart_item"] as $code => $item) { ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <p><?php echo $item["name"]; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5><?php echo number_format($item["price"], 0, '', '.'); ?>₫</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <h5 class="input-number" type="text"> <?php echo $item["quantity"]; ?></h5>
                                        </div>
                                    </td>
                                    <td>
                                        <h5><?php echo number_format(($item["price"] * $item["quantity"]), 0, '', '.'); ?>
                                            ₫</h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <button onclick="cartAction('remove','<?php echo $code ?>')" style="background: red; border: none;">x</button>
                                        </h5>
                                    </td>
                                </tr>
                                <?php
                                $item_total += ($item["price"] * $item["quantity"]);
                            } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5><?php echo number_format($item_total, 0, '', '.'); ?>₫</h5>
                                </td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php if(isset($_SESSION["cart_item"])) { ?>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="shop.php">Tiếp tục mua sắm</a>
                        <button class="btn_1 checkout_btn_1" id="checkout">Đặt hàng</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
</main>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script src="js/ajax/shop.js"></script>
<script>

    //Load table status for choose
    $(document).on('click', "#checkout", function () {
        $.ajax({
            url: "a-handle-cart.php",
            data: {
                "action": "payment"
            },
            type: "POST",
            success: function (data) {
                alert("Thêm đơn thành công!");
            },
            error: function () {
            }
        });
    })
</script>
</body>
</html>