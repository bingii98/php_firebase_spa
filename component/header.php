<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="menu-wrapper">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logo/logo.png" alt="VenVen Spa Logo" style="height: 50px;"></a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-lg-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="shop.php?type=product">Sản phẩm</a>
                                <ul class="submenu">
                                    <?php foreach ($arr_list_product as $item) { ?>
                                        <li>
                                            <a href="shop.php?type=product&id=<?php echo $item->getId() ?>"> <?php echo $item->getName() ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="hot"><a href="shop.php?type=service">Dịch vụ</a>
                                <ul class="submenu">
                                    <?php foreach ($arr_list_service as $item) { ?>
                                        <li>
                                            <a href="shop.php?type=service&id=<?php echo $item->getId() ?>"><?php echo $item->getName() ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Header Right -->
                <div class="header-right">
                    <ul>
                        <li>
                            <div class="nav-search search-switch">
                                <span class="flaticon-search"></span>
                            </div>
                        </li>
                        <?php if (isset($_SESSION['_userSignedIn'])) { ?>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <?php if ($_SESSION['_userSignedIn']->getPhoto() != null) { ?><img style="border-radius: 100px;width: 30px;height: 30px; margin-right: 10px;" src="<?php echo $_SESSION['_userSignedIn']->getPhoto() ?>" alt="avatar">  <?php } ?>
                                    <?php if ($_SESSION['_userSignedIn']->getName() != null) echo $_SESSION['_userSignedIn']->getName(); else echo $_SESSION['_userSignedIn']->getEmail() ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="user-info.php"><i class="fa fa-user" aria-hidden="true"></i><span style="padding: 5px 19px;">Đổi thông tin</span></a>
                                    <button class="dropdown-item" type="button" id="btn-reset-password"><i class="fa fa-unlock-alt" aria-hidden="true"></i><span style="padding: 5px 19px;">Đổi mật khẩu</span>
                                    </button>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span style="padding: 5px 19px;">Đăng xuất</span></a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <li><a href="login.php"><span class="flaticon-user" style="padding: 5px 19px;"> Đăng nhập</span></a></li>
                        <?php } ?>
                        <li><a href="cart.php"><span class="flaticon-shopping-cart" id="cart-number"> <?php if (isset($_SESSION["cart_item"])) echo count($_SESSION["cart_item"]) ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
</div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="107611897688472"
     theme_color="#44bec7">
</div>