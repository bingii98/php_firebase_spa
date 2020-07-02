<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="menu-wrapper">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logo/logo.png"  alt="VenVen Spa Logo" style="height: 50px;"></a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-lg-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="shop.php?type=product">Sản phẩm</a>
                                <ul class="submenu">
                                    <?php foreach ($arr_list_product as $item){ ?>
                                        <li><a href="shop.php?type=product&id=<?php echo $item->getId()?>"> <?php echo $item->getName() ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="hot"><a href="shop.php?type=service">Dịch vụ</a>
                                <ul class="submenu">
                                    <?php foreach ($arr_list_service as $item){ ?>
                                        <li><a href="shop.php?type=service&id=<?php echo $item->getId()?>"><?php echo $item->getName() ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="submenu">
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="elements.html">Element</a></li>
                                    <li><a href="confirmation.html">Confirmation</a></li>
                                    <li><a href="checkout.html">Product Checkout</a></li>
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
                        <li> <a href="login.php"><span class="flaticon-user">  <?php if($_SESSION['_userSignedIn']->getName() != null) echo $_SESSION['_userSignedIn']->getName(); else echo $_SESSION['_userSignedIn']->getEmail() ?></span></a></li>
                        <li><a href="cart.php"><span class="flaticon-shopping-cart" id="cart-number"> <?php if(isset($_SESSION["cart_item"])) echo count($_SESSION["cart_item"]) ?></span></a> </li>
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