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
if (!isset($_POST['index'])) $index = 0; else $index = $_POST['index'];
if(count($arr) != 1){
foreach ($arr as $i => $item) { ?>
    <tr>
        <th><?php echo ++$index ?></th>
        <td><img src="<?php echo $item->getImage() ?>"
                 style="width: 80px; border-radius: 10px;"</td>
        <th><?php echo $item->getName();
            echo ' <small>' . (!$item->getIsActive() ? '(Ngưng bán)' : '') . '</small>'; ?></th>
        <td><?php echo $item->getDiscription() ?></td>
        <td><?php echo number_format($item->getPrice(), 0, "", ".") ?> ₫</td>
        <td><?php if ($item->getIsSale()) echo $item->getSale() . "%"; else echo '0%'; ?></td>
        <td><p class="tag <?php echo $item->getIsService() ? "service" : "product" ?>"><?php echo $item->getIsService() ? "Dịch vụ" : "Sản phẩm" ?></p></td>
        <td>
            <button class="btn-edit-product btn btn-primary btn-circle btn-sm m-1" data="<?php echo $item->getId() ?>" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                <span class="icon text-white-50">
                    <i class="fa fa-info" aria-hidden="true"></i>
                </span>
            </button>
            <?php if ($item->getIsActive()) { ?>
                <button class="btn-del-product btn btn-danger btn-circle btn-sm m-1" data="<?php echo $item->getId() ?>" name="<?php echo $item->getName() ?>" data-toggle="tooltip" data-placement="top" title="Ngưng bán sản phẩm">
                    <span class="icon text-white-50">
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                </button>
            <?php } else { ?>
                <button class="btn-reactive-product btn btn-warning btn-circle btn-sm m-1" data="<?php echo $item->getId() ?>" name="<?php echo $item->getName() ?>" data-toggle="tooltip" data-placement="top" title="Mở bán lại">
                    <span class="icon text-white-50">
                      <i class="fa fa-undo" aria-hidden="true"></i>
                    </span>
                </button>
            <?php } ?>
        </td>
    </tr>
<?php } ?>
<tr id="div-load-more">
    <td colspan="8">
        <button class="btn btn-link mr-auto" style="margin: 0 auto;width: 100%;" id="btn-load-more" data="<?php echo $item->getId() ?>" index="<?php echo $index; ?>">Load more</button>
    </td>
</tr>
<?php } else{ ?>
    <tr id="div-load-more">
        <td colspan="8">
            <a class="btn btn-link mr-auto" style="margin: 0 auto;width: 100%;" id="btn-load-more">Đã load hết</a>
        </td>
    </tr>
<?php } ?>