<?php
include_once './controller/ProductCtl.php';
include_once './controller/ListCtl.php';
include_once './controller/OrderCtl.php';
include_once __DIR__ . '/model/User.php';
if (!isset($_SESSION)) session_start();
$productCtl = new ProductCtl();
$listCtl = new ListCtl();
$orderCtl = new OrderCtl();

if (!empty($_POST["action"])) {
    switch ($_POST["action"]) {
        case "add":
            $productByCode = $productCtl->get($_POST["code"], $listCtl);
            if ($productByCode->getIsSale() == 'true') {
                $price = $productByCode->getPrice() - $productByCode->getPrice() / 100 * $productByCode->getSale();
            } else {
                $price = $productByCode->getPrice();
            }
            $itemArray = array($productByCode->getId() => array('name' => $productByCode->getName(), 'quantity' => 1, 'price' => $price));

            if (!empty($_SESSION["cart_item"])) {
                if (array_key_exists($productByCode->getId(), $_SESSION["cart_item"])) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($productByCode->getId() == $k) {
                            $_SESSION["cart_item"][$k]["quantity"] += 1;
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_POST["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "payment":
            $orderCtl->insert($_SESSION['_userSignedIn']->getId());
            unset($_SESSION["cart_item"]);
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>


