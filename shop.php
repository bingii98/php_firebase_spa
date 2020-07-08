<?php
include_once __DIR__ . '/model/User.php';
if (!isset($_SESSION)) session_start();
include_once __DIR__ . '/controller/ListCtl.php';
include_once __DIR__ . '/controller/ProductCtl.php';
$listCtl = new ListCtl();
$productCtl = new ProductCtl();
$arr_list_service = $listCtl->getService();
$arr_list_product = $listCtl->getProduct();
if(isset($_GET['id'] ))
    $list = $listCtl->get($_GET['id']);
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<!-- Preloader Start -->
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
                            <h2><?php if(isset($list)) echo $list->getName(); else if(isset($_GET['type']) && $_GET['type'] == 'product') echo 'Sản phẩm'; else echo 'Dịch vụ'; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row" id="list">
                        <div id="div-load-more" style="    width: 100%;">
                            <p id="loading-svg" style="width: 100%; text-align: center">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                                <rect x="0" y="7.337" width="4" height="15.326" fill="#333" opacity="0.2">
                                                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                                                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                                                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                                                </rect>
                                    <rect x="8" y="9.837" width="4" height="10.326" fill="#333" opacity="0.2">
                                        <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                                        <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                                    </rect>
                                    <rect x="16" y="7.663" width="4" height="14.674" fill="#333" opacity="0.2">
                                        <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                                        <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                                    </rect>
                                            </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->
</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod
                                        tem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Offers & Discounts</a></li>
                                <li><a href="#"> Get Coupon</a></li>
                                <li><a href="#"> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>New Products</h4>
                            <ul>
                                <li><a href="#">Woman Cloth</a></li>
                                <li><a href="#">Fashion Accessories</a></li>
                                <li><a href="#"> Man Accessories</a></li>
                                <li><a href="#"> Rubber made Toys</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="#">Frequently Asked Questions</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Report a Payment Issue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
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
<!-- All JS Custom Plugins Link Here here -->
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
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Scroll up, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

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
<script src="js/header.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "a-product-load-more.php",
            data : {
               <?php if(isset($_GET['type']) && $_GET['type'] == 'product') echo '"type" : "product"'; else echo '"type" : "service"'; ?>
               <?php if(isset($_GET['id'])) echo ',"list" : "'.$_GET['id'].'"'; ?>
            },
            type: "POST",
            success: function (data) {
                $("#div-load-more").replaceWith(data)
            }
        })
    })
    $(document).on("click","#btn-load-more",function () {
        $.ajax({
            url: 'a-product-load-more.php',
            data: {
                'id' : $(this).attr('data'),
                <?php if(isset($_GET['type']) && $_GET['type'] == 'product') echo '"type" : "product"'; else echo '"type" : "service"'; ?>
                <?php if(isset($_GET['id'])) echo ',"list" : "'.$_GET['id'].'"'; ?>
            },
            type: "POST",
            beforeSend : function(){
                $("#div-load-more").replaceWith('<tr id="div-load-more"><td colspan="8">\n' +
                    '                                        <p id="loading-svg" style="width: 100%; text-align: center">\n' +
                    '                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">\n' +
                    '                                                <rect x="0" y="7.337" width="4" height="15.326" fill="#333" opacity="0.2">\n' +
                    '                                                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                </rect>\n' +
                    '                                                <rect x="8" y="9.837" width="4" height="10.326" fill="#333" opacity="0.2">\n' +
                    '                                                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                </rect>\n' +
                    '                                                <rect x="16" y="7.663" width="4" height="14.674" fill="#333" opacity="0.2">\n' +
                    '                                                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>\n' +
                    '                                                </rect>\n' +
                    '                                            </svg>\n' +
                    '                                        </p>\n' +
                    '                                    </td></tr>')
            },
            success: function (data) {
                $("#div-load-more").replaceWith(data)
            }
        })
    })

    $(document).on('click','.view-detail',function () {
        window.location.href = $(this).attr('href');
    })
</script>
</body>
</html>