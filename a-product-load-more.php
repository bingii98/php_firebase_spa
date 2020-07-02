<?php
include_once __DIR__ . '/controller/ProductCtl.php';
$productCtl = new ProductCtl();
if ($_POST['type'] == 'product' && !isset($_POST['id']))
    $arr = $productCtl->getProductFirst(10);
if ($_POST['type'] == 'service' && !isset($_POST['id']))
    $arr = $productCtl->getServiceFirst(10);
if ($_POST['type'] == 'product' && isset($_POST['id']))
    $arr = $productCtl->getProductContinue($_POST['id'], 10);
if ($_POST['type'] == 'service' && isset($_POST['id']))
    $arr = $productCtl->getServiceContinue($_POST['id'], 10);
$arr = array_reverse($arr);
if (count($arr) != 1) {
    foreach ($arr as $i => $item) {
        if ($i != 9) { ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="<?php echo $item->getImage() ?>" alt="">
                        <div class="img-cap">
                            <span><button type="button" id="add_<?php echo $item->getId() ?>" class="btnAddAction cart-action add-cart-btn" onClick="cartAction('add', '<?php echo $item->getId() ?>')" style="background: none;color: white;font-size: 18px;border: none;cursor: pointer;">Add to cart</button></span>
                        </div>
                        <div class="favorit-items">
                            <span class="flaticon-heart"></span>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="product_details.php?code=<?php echo $item->getId() ?>"><?php echo $item->getName() ?></a></h3>
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
        <?php }
    } ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="div-load-more" style="width: 100%;">
        <button class="btn btn-primary mr-auto" style="margin: 0 auto" id="btn-load-more" data="<?php echo $item->getId() ?>">Load more</button>
    </div>
<?php } else { ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="div-load-more" style="width: 100%;">
        <a class="btn btn-primary mr-auto" style="margin: 0 auto">Load hêt</a>
    </div>
<?php } ?>