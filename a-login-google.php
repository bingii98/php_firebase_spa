<?php
include_once __DIR__ . '/controller/Authentication.php';
include_once __DIR__ . '/model/User.php';
$account = new MyService();
if (!isset($_SESSION)) session_start();

$result = $account->get($_POST['id']);

if($result != null){
    $_SESSION['_userSignedIn'] = $result;
    echo 'true';
}else{
    echo 'false';
}