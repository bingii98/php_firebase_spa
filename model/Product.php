<?php
class Product{
    private $id;
    private $name;
    private $list;
    private $price;
    private $image;
    private $description;
    private $sale;
    private $isSale;
    private $isActive;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $list
     * @param $price
     * @param $image
     * @param $description
     * @param $sale
     * @param $isSale
     * @param $isActive
     */
    public function __construct($id, $name, $list, $price, $image, $description, $sale, $isSale, $isActive)
    {
        $this->id = $id;
        $this->name = $name;
        $this->list = $list;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
        $this->sale = $sale;
        $this->isSale = $isSale;
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param mixed $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param mixed $sale
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
    }

    /**
     * @return mixed
     */
    public function getIsSale()
    {
        return $this->isSale;
    }

    /**
     * @param mixed $isSale
     */
    public function setIsSale($isSale)
    {
        $this->isSale = $isSale;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }



}