<?php

class ProductCategorie extends Database
{
    private $id;
    private $productType;




    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of productType
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Set the value of productType
     *
     * @return  self
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProductsType()
    {
        $query = "SELECT * FROM `product_type`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    public function getAllProductsFromOneType($id){
        $query = "SELECT `products`.`id` AS id_produit , `product_name`, `product_description`, `product_price` , `id_product_type` , `product_type`.`id` , `product_type` FROM `product_type` INNER JOIN `products`ON `products`.`id_product_type` = `product_type`.`id` where CONCAT(`product_type`.`id` , `product_type`) = :id" ;
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    public function getThisPageCategorie($id){
        $query = "SELECT * FROM `product_type` WHERE `id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }
}
