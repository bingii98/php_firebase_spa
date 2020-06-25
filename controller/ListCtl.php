<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

require_once './vendor/autoload.php';
require_once './model/Lists.php';

class ListCtl{

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


    public function get($id)
    {
        $list = $this->firebase->getReference('list')->orderByKey()->equalTo($id)->getSnapshot()->getValue();
        foreach ($list as $key => $item) {
            return new Lists($key, $item['name'], $item['description'], $item['isActive'],array());
        }
        return null;
    }


    public function getAll(){
        $arr_list = array();
        $list = $this->firebase->getReference('list')->orderByChild('name')->getSnapshot()->getValue();
        foreach ($list as $key => $item){
            array_push($arr_list,new Lists($key,$item['name'],$item['description'],$item['isActive'],array()));
        }
        return $arr_list;
    }


    public function insert($list)
    {
        try {
            $this->firebase->getReference('list')->push([
                'description' => $list->getDescription(),
                'isActive' => $list->getIsActive(),
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
            return new Lists($key, $item['name'], $item['description'], $item['isActive'],array());
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
            if($this->food_ctl->get_is_empty_food($id) == 'true'){
                $this->firebase->getReference('list/'.$id)->set(null);
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

}