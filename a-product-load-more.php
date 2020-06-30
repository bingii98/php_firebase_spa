<?php

use GuzzleHttp\Client;

require_once __DIR__ . '/controller/ProductCtl.php';
require_once __DIR__ . '/model/Product.php';

$prCtl = new ProductCtl();

$arr = $prCtl->getProductContinue9($_POST['id']);

foreach ($arr as $item) { ?>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
                <img src="<?php echo $item->getImage() ?>" alt="">
                <div class="img-cap">
                    <span>Add to cart</span>
                </div>
                <div class="favorit-items">
                    <span class="flaticon-heart"></span>
                </div>
            </div>
            <div class="popular-caption">
                <h3><a href="product_details.html"><?php echo $item->getName() ?></a></h3>
                <span>
                    <?php if ($item->getIsSale() == 1) { ?>
                        <span><?php echo number_format($item->getPrice() - $item->getPrice() / 100 * $item->getSale(), 0, "", ".") ?> đ</span>
                    <?php } else { ?>
                        <span><?php echo number_format($item->getPrice(), 0, "", ".") ?> đ</span>
                    <?php } ?>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="div-load-more">
    <button class="btn btn-primary mr-auto" style="margin: 0 auto" id="btn-load-more" data="<?php echo $arr[0]->getId() ?>">Load more</button>
</div>
