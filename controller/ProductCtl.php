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
        $list = $this->firebase->getReference('product/product')->orderByKey()->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        $list = $this->firebase->getReference('product/service')->orderByKey()->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getServiceLimit($num)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/service')->orderByKey()->limitToFirst($num)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getProductLimit($num)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/product')->orderByKey()->limitToFirst($num)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getService()
    {
        $arr = array();
        $list = $this->firebase->getReference('product/service')->orderByKey()->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getProduct()
    {
        $arr = array();
        $list = $this->firebase->getReference('product/product')->orderByKey()->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getProductFirst($num)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/product')->orderByKey()->limitToLast($num)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getProductContinue($idLast,$num)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/product')->orderByKey()->endAt($idLast)->limitToLast($num)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getServiceFirst($num)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/service')->orderByKey()->limitToLast($num)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getServiceContinue($idLast,$num)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/service')->orderByKey()->endAt($idLast)->limitToLast($num)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    //LOAD BY LIST
    public function getProductByList($idlist)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/product')->orderByChild('list')->equalTo($idlist)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getServiceByList($idlist)
    {
        $arr = array();
        $list = $this->firebase->getReference('product/service')->orderByChild('list')->equalTo($idlist)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getByList($id)
    {
        $arr = array();
        $list = $this->firebase->getReference('product')->orderByChild('list')->equalTo($id)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function getNew()
    {
        $arr = array();
        $list = $this->firebase->getReference('product/service')->orderByKey()->limitToFirst(3)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
            }
        return $arr;
    }

    public function get_from_list_id($id)
    {
        $arr = array();
        $list = $this->firebase->getReference('product')->orderByChild('list')->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            array_push($arr, new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']));
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
        $list = $this->firebase->getReference('product/service')->orderByChild('name')->equalTo($name)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']);
        }
        $list = $this->firebase->getReference('product/product')->orderByChild('name')->equalTo($name)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']);
        }
        return null;
    }


    public function get($id)
    {
        if($this->getProductProduct($id) != null){
            $list = $this->firebase->getReference('product/product')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
            foreach ($list as $key => $item) {
                return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']);
            }
        }else{
            $list = $this->firebase->getReference('product/service')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
            foreach ($list as $key => $item) {
                return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']);
            }
        }
        return null;
    }


    public function getProductService($id)
    {
        $list = $this->firebase->getReference('product/service')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']);
        }
        return null;
    }


    public function getProductProduct($id)
    {
        $list = $this->firebase->getReference('product/product')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Product($key, $item['name'], $item['description'], $item['price'], $item['image'], $item['sale'], $item['view'], $item['isSale'], $item['isService'], $item['isActive']);
        }
        return null;
    }

    public function delete($id)
    {
        try {
            if($this->getProductProduct($id) != null){
                $this->firebase->getReference('product/product/' . $id)->update([
                    'isActive' => false
                ]);
            }else{
                $this->firebase->getReference('product/service/' . $id)->update([
                    'isActive' => false
                ]);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function reactive($id)
    {
        try {
            if($this->getProductProduct($id) != null){
                $this->firebase->getReference('product/product/' . $id)->update([
                    'isActive' => true
                ]);
            }else{
                $this->firebase->getReference('product/service/' . $id)->update([
                    'isActive' => true
                ]);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insert(Product $product, $list)
    {
        try {
            if($product->getIsService() == true){
                $path = 'service';
            }else{
                $path = 'product';
            }
            $this->firebase->getReference('product/'.$path)->push([
                'description' => $product->getDiscription(),
                'image' => $product->getImage(),
                'isActive' => true,
                'isService' => (($product->getIsService()) == 'true' ? true : false),
                'isSale' => (($product->getIsSale()) == 'true' ? true : false),
                'list' => $list,
                'name' => $product->getName(),
                'view' => 0,
                'price' => $product->getPrice(),
                'sale' => $product->getSale()
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function update(Product $product)
    {
        try {
            if($this->getProductProduct($product->getId()) != null){
                $this->firebase->getReference('product/product/' . $product->getId())->update([
                    'description' => $product->getDiscription(),
                    'isSale' => (($product->getIsSale()) == 'true' ? true : false),
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'sale' => $product->getSale()
                ]);
            }else{
                $this->firebase->getReference('product/service/' . $product->getId())->update([
                    'description' => $product->getDiscription(),
                    'isSale' => (($product->getIsSale()) == 'true' ? true : false),
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'sale' => $product->getSale()
                ]);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateView($id)
    {
        try {
            $product = $this->getProductProduct($id);
            if($product != null){
                $this->firebase->getReference('product/product/' . $id)->update([
                    'view' => (intval($product->getView()) + 1),
                ]);
            }
            $service = $this->getProductService($id);
            if($service != null){
                echo print_r($service);
                $this->firebase->getReference('product/service/' . $id)->update([
                    'view' => (intval($service->getView()) + 1),
                ]);
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}