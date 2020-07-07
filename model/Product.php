<?php
class Product
{
    private $id;
    private $name;
    private $discription;
    private $price;
    private $image;
    private $sale;
    private $view;
    private $isSale;
    private $isService;
    private $isActive;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $discription
     * @param $price
     * @param $image
     * @param $sale
     * @param $view
     * @param $isSale
     * @param $isService
     */
    public function __construct($id, $name, $discription, $price, $image, $sale, $view, $isSale, $isService)
    {
        $this->id = $id;
        $this->name = $name;
        $this->discription = $discription;
        $this->price = $price;
        $this->image = $image;
        $this->sale = $sale;
        $this->view = $view;
        $this->isSale = $isSale;
        $this->isService = $isService;
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
    public function getDiscription()
    {
        return $this->discription;
    }

    /**
     * @param mixed $discription
     */
    public function setDiscription($discription)
    {
        $this->discription = $discription;
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
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
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
    public function getIsService()
    {
        return $this->isService;
    }

    /**
     * @param mixed $isService
     */
    public function setIsService($isService)
    {
        $this->isService = $isService;
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
