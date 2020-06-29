<?php
class Lists{
    private $id;
    private $name;
    private $description;
    private $isActive;
    private $isService;
    private $products = array();

    /**
     * Lists constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $isActive
     * @param $isService
     * @param array $products
     */
    public function __construct($id, $name, $description, $isActive, $isService, array $products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->isActive = $isActive;
        $this->isService = $isService;
        $this->products = $products;
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
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }


}