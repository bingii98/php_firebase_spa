<?php
include_once __DIR__ . '/controller/ProductCtl.php';
$productCtl = new ProductCtl();
if($arr_food = $productCtl->delete($_POST['id']))
    echo 'true';
else
    echo 'false';
