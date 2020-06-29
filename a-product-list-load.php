<?php
include_once __DIR__ . '/controller/ListCtl.php';
$listCtl = new ListCtl();
if($_POST['isService'] == 'true'){
    $arr_list = $listCtl->getService();
}else{
    $arr_list = $listCtl->getProduct();
}

foreach ($arr_list as $item) { ?>
    <option value="<?php echo $item->getId() ?>"><?php echo $item->getName() ?></option>
<?php } ?>