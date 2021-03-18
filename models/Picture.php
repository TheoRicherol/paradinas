<?php

class Picture extends Database{
    private $id;
    private $product_pics;


    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Product Pics
     *
     * @return mixed
     */
    public function getProductPics()
    {
        return $this->product_pics;
    }

    /**
     * Set the value of Product Pics
     *
     * @param mixed $product_pics
     *
     * @return self
     */
    public function setProductPics($product_pics)
    {
        $this->product_pics = $product_pics;

        return $this;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public function addPicture($name , $id){
        $query = "INSERT INTO `products_pics` (`product_pics` , `id_products`) VALUES (:product_pics , :id_products)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("product_pics" , $name , PDO::PARAM_STR);
        $buildQuery->bindValue("id_products" , $id , PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function getAllPictures(){
        $query = "SELECT * FROM `products_pics`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }


    public function getAllPictureOfOneProduct($id){
        $query = "SELECT * FROM `products_pics` WHERE id_products = :id_products";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_products" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    public function countAllPictureOfOneProduct($id){
        $query = "SELECT COUNT(*) AS numberOfPics FROM `products_pics` WHERE id_products = :id_products";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_products" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    public function deletePicture($id){
        $query = "DELETE FROM `products_pics` WHERE `products_pics`.`id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        return $buildQuery->execute();
    }

}
