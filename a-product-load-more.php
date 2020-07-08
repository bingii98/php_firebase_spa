<?php
include_once __DIR__ . '/controller/ProductCtl.php';
$productCtl = new ProductCtl();
if (!isset($_POST['type']) && !isset($_POST['id']) && !isset($_POST['list']))
    $arr = $productCtl->getProductFirst(10);
if ($_POST['type'] == 'product' && !isset($_POST['id']) && !isset($_POST['list']))
    $arr = $productCtl->getProductFirst(10);
if ($_POST['type'] == 'service' && !isset($_POST['id']) && !isset($_POST['list']))
    $arr = $productCtl->getServiceFirst(10);
if ($_POST['type'] == 'product' && isset($_POST['id']) && !isset($_POST['list']))
    $arr = $productCtl->getProductContinue($_POST['id'], 10);
if ($_POST['type'] == 'service' && isset($_POST['id']) && !isset($_POST['list']))
    $arr = $productCtl->getServiceContinue($_POST['id'], 10);
if ($_POST['type'] == 'product' && isset($_POST['list']))
    $arr = $productCtl->getProductByList($_POST['list']);
if ($_POST['type'] == 'service' && isset($_POST['list']))
    $arr = $productCtl->getServiceByList($_POST['list']);
$arr = array_reverse($arr);
if ($arr != null) {
    foreach ($arr as $i => $item) {
        if ($i != 9) { ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="<?php echo $item->getImage() ?>" alt="">
                        <div class="img-cap">
                                <span>
                                    <button type="button" id="add_<?php echo $item->getId() ?>" class="btnAddAction cart-action add-cart-btn" onClick="cartAction('add', '<?php echo $item->getId() ?>')">Add to cart</button>
                                </span>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <a class="view-detail" href="product_details.php?code=<?php echo $item->getId() ?>">
                            <h3><?php echo $item->getName() ?></h3></a>
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
    }
    if (count($arr) == 10 && !isset($_POST['list'])) { ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="div-load-more" style="width: 100%;">
            <button class="btn btn-primary mr-auto" style="margin: 0 auto; width: 100%;" id="btn-load-more"
                    data="<?php echo $item->getId() ?>">Load more
            </button>
        </div>
    <?php }
}
if (count($arr) == 0 || $arr == null) {
    echo "<div class=\"col-xl-4 col-lg-4 col-md-6 col-sm-6\"><p style='width: 100%; text-align: center;'>Không có gì để hiển thị</p>";
} ?>
