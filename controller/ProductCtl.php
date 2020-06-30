<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

require_once './vendor/autoload.php';
require_once './model/Product.php';
require_once './controller/ListCtl.php';


class ProductCtl
{

    protected $firebase;

    /**
     * UserCtl constructor.
     * @param $firebase
     */
    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount('./secret/key.json');
        $firebase = $factory->createDatabase();
        $this->firebase = $firebase;
    }

    public function getAll()
    {
        $arr = array();
        $list = $this->firebase->getReference('product')->orderByChild('list')->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getByList($id)
    {
        $arr = array();
        $list = $this->firebase->getReference('product')->orderByChild('list')->equalTo($id)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getNew()
    {
        $arr = array();
        $list = $this->firebase->getReference('product')->orderByKey()->limitToFirst(3)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function get_from_list_id($id)
    {
        $arr = array();
        $list = $this->firebase->getReference('product')->orderByChild('list')->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['isSale'], $item['isService'], $item['isActive']));
        }
        return $arr;
    }

    public function get_is_empty_product($idList)
    {
        $count = 0;
        $list = $this->firebase->getReference('product')->orderByChild('list')->equalTo($idList)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            $count++;
        }
        if ($count == 0)
            return 'true';
        return 'false';
    }


    public function get_by_name($name)
    {
        $list = $this->firebase->getReference('product')->orderByChild('name')->equalTo($name)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['isSale'], $item['isService'], $item['isActive']);
        }
        return null;
    }


    public function get($id)
    {
        $list = $this->firebase->getReference('product')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['isSale'], $item['isService'], $item['isActive']);
        }
        return null;
    }

    public function delete($id)
    {
        try {
            $this->firebase->getReference('product/' . $id)->update([
                'isActive' => false
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function reactive($id)
    {
        try {
            $this->firebase->getReference('product/' . $id)->update([
                'isActive' => true
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insert(Product $food, $list)
    {
        try {
            $this->firebase->getReference('product')->push([
                'description' => $food->getDiscription(),
                'image' => $food->getImage(),
                'isActive' => true,
                'isService' => $food->getIsService(),
                'isSale' => (($food->getIsSale()) == 'true' ? true : false),
                'list' => $list,
                'name' => $food->getName(),
                'price' => $food->getPrice(),
                'sale' => $food->getSale()
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function update(Product $food)
    {
        try {
            $this->firebase->getReference('product/' . $food->getId())->update([
                'description' => $food->getDiscription(),
                'isSale' => (($food->getIsSale()) == 'true' ? true : false),
                'name' => $food->getName(),
                'price' => $food->getPrice(),
                'sale' => $food->getSale()
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}