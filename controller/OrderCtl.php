<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

require './vendor/autoload.php';
include_once './model/Product.php';
include_once './model/Order.php';
include_once './model/User.php';
include_once './model/OrderDetail.php';
include_once './controller/ListCtl.php';
include_once './controller/ProductCtl.php';


class OrderCtl
{

    protected $firebase;
    protected $product_ctl;
    protected $auth;

    /**
     * UserCtl constructor.
     * @param $firebase
     */
    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount('./secret/key.json');
        $this->firebase = $factory->createDatabase();
        $this->auth = $factory->createAuth();
    }

    public function getFirst10()
    {
        $this->product_ctl = new ProductCtl();
        $list = $this->firebase->getReference('orders')->orderByKey()->limitToLast(10)->getSnapshot()->getValue();
        $arr = array();
        foreach ($list as $key => $item){
            $arr_detail = array();
            $userRS = $this->auth->getUser($item['user']);
            foreach ($item['detail'] as $value) {
                array_push($arr_detail, new OrderDetail($this->product_ctl->get($value['product']), $value['num'], $value['price']));
            }
            array_push($arr,new Order($key, $item['date'], new User($userRS->uid,$userRS->displayName,$userRS->email,$userRS->photoUrl,(isset($userRS->customAttributes['isAdmin']) ? true : false),null,null), $arr_detail));
        }
        return array_reverse($arr);
    }

    public function getContinue10($idLast)
    {
        $this->product_ctl = new ProductCtl();
        $list = $this->firebase->getReference('orders')->orderByKey()->endAt($idLast)->limitToLast(11)->getSnapshot()->getValue();
        $arr = array();
        foreach ($list as $key => $item){
            $arr_detail = array();
            $userRS = $this->auth->getUser($item['user']);
            foreach ($item['detail'] as $value) {
                array_push($arr_detail, new OrderDetail($this->product_ctl->get($value['product']), $value['num'], $value['price']));
            }
            array_push($arr,new Order($key, $item['date'], new User($userRS->uid,$userRS->displayName,$userRS->email,$userRS->photoUrl,(isset($userRS->customAttributes['isAdmin']) ? true : false),null,null), $arr_detail));
        }
        return array_reverse($arr);
    }

    public function insert($uid)
    {
        $this->product_ctl = new ProductCtl();
        $arr_order_detail = array();
        $date = new DateTime();
        foreach ($_SESSION["cart_item"] as $key => $item) {
            array_push($arr_order_detail, new OrderDetail($this->product_ctl->get($key), $item['quantity'], $item['price']));
        }
        $order = new Order(null, $date->getTimestamp(), $uid, $arr_order_detail);
        if (isset($_SESSION["cart_item"])) {
            $result = $this->firebase->getReference('orders')->push($order->pushFB());
        }
    }

    public function order_generation($uid,$date)
    {
        $this->product_ctl = new productCtl();
        $this->table_ctl = new TableCtl();
        $arr_order_detail = array();
        foreach ($_SESSION["cart_item"] as $key => $item) {
            array_push($arr_order_detail, new OrderDetail($this->product_ctl->get($key), $item['quantity'], $item['price']));
        }
        $order = new Order(null, $date, $uid, $arr_order_detail);
        if (isset($_SESSION["cart_item"])) {
            $result = $this->firebase->getReference('orders')->push($order->pushFB());
        }
    }

    public function get($id)
    {
        $this->product_ctl = new productCtl();
        $list = $this->firebase->getReference('orders')->getChild($id)->getSnapshot()->getValue();
        $arr = array();
        $a = $this->auth->getUser($list['user']);
        $user = new User($a->uid,$a->displayName,$a->email,null,null,null,null);
        foreach ($list['detail'] as $value) {
            array_push($arr, new OrderDetail($this->product_ctl->get($value['product']), $value['num'], $value['price']));
        }
        return new Order($id, $list['date'], $user, $arr);
    }

    public function get_range_date($dstart,$dstop)
    {
        $this->product_ctl = new productCtl();
        $list = $this->firebase->getReference('orders')->orderByChild('date')->startAt($dstart)->endAt($dstop)->getSnapshot()->getValue();
        $arr = array();
        foreach ($list as $key => $item){
            $arr_detail = array();
            foreach ($item['detail'] as $value) {
                array_push($arr_detail, new OrderDetail($value['product'], $value['num'], $value['price']));
            }
            array_push($arr,new Order($key, $item['date'], $item['user'], $arr_detail));
        }
        return $arr;
    }

    public function countproduct($id)
    {
        $list = $this->firebase->getReference('orders')->getChild($id)->getSnapshot()->getValue();
        if ($list != null)
            return $list['detail'];
        return 0;
    }

    public function count_sales_week($array, $date){
        $a = array_reduce($array, function ($carry, $value) use ($date) {
            if (date('d-m-yy',$value->getDate()) == $date){
                return $carry + $value->revenueCount();
            }
            return $carry;
        });
        if($a == null)
            return 0;
        return $a;
    }

    public function empty1()
    {
        $list = $this->firebase->getReference('orders')->set(null);
        return 0;
    }
}