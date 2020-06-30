<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

require_once './vendor/autoload.php';
require_once './model/Lists.php';
require_once './controller/ProductCtl.php';

class ListCtl
{

    protected $firebase;
    protected $product_ctl;

    /**
     * UserCtl constructor.
     * @param $firebase
     */
    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount('./secret/key.json');
        $firebase = $factory->createDatabase();
        $this->firebase = $firebase;
        $this->product_ctl = new ProductCtl();
    }


    public function get($id)
    {
        $list = $this->firebase->getReference('list')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Lists($key, $item['name'], $item['description'], $item['isActive'],$item['isService'], array());
        }
        return null;
    }

    public function getAll()
    {
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByChild('name')->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr_list, new Lists($key, $item['name'], $item['description'], $item['isActive'],$item['isService'], array()));
            }
        return $arr_list;
    }


    public function getService()
    {
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByChild('isService')->equalTo(true)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr_list, new Lists($key, $item['name'], $item['description'], $item['isActive'],$item['isService'], array()));
            }
        return $arr_list;
    }


    public function getService_product()
    {
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByChild('isService')->equalTo(true)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                $arr_list = array_merge($arr_list, $this->product_ctl->getByList($key));
            }
        return $arr_list;
    }


    public function getProduct()
    {
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByChild('isService')->equalTo(false)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                array_push($arr_list, new Lists($key, $item['name'], $item['description'], $item['isActive'],$item['isService'], array()));
            }
        return $arr_list;
    }


    public function getProduct_product()
    {
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByChild('isService')->equalTo(false)->getSnapshot()->getValue();
        if (!empty($list))
            foreach ($list as $key => $item) {
                $arr_list = array_merge($arr_list, $this->product_ctl->getByList($key));
            }
        return $arr_list;
    }


    public function getAll_enable(){
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByKey()->getSnapshot()->getValue();
        foreach ($list as $key => $item){
            if($item['isActive']){
                array_push($arr_list,new Lists($key,$item['name'],$item['description'],$item['isActive'],$item['isService'],array()));
            }
        }
        return $arr_list;
    }


    public function insert(Lists $list)
    {
        try {
            $this->firebase->getReference('list')->push([
                'description' => $list->getDescription(),
                'isActive' => $list->getIsActive(),
                'isService' => $list->getIsService(),
                'name' => $list->getName(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function get_by_name($name)
    {
        $list = $this->firebase->getReference('list')->orderByChild('name')->equalTo($name)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Lists($key, $item['name'], $item['description'], $item['isActive'],$item['isService'], array());
        }
        return null;
    }


    public function delete($id)
    {
        try {
            $this->firebase->getReference('list/' . $id)->update([
                'isActive' => false
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function disable($id)
    {
        try {
            if($this->product_ctl->get_is_empty_product($id) == 'true'){
            $this->firebase->getReference('list/' . $id)->set(null);
            return 'true';
            }else{
                return 'double';
            }
        } catch (Exception $e) {
            return 'false';
        }
    }

    public function reactive($id)
    {
        try {
            $this->firebase->getReference('list/' . $id)->update([
                'isActive' => true
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function update($list)
    {
        try {
            $this->firebase->getReference('list/' . $list->getId())->update([
                'description' => $list->getDescription(),
                'name' => $list->getName(),
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}