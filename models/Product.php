<?php


class Product extends Database
{
    private $id;
    private $product_name;
    private $product_description;
    private $product_price;
    private $id_product_type;


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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_description
     */
    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }

    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->product_description;
    }

    /**
     * @param mixed $product_price
     */
    public function setProductPrice($product_price)
    {
        $this->product_price = $product_price;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->product_price;
    }

    /**
     * @param mixed $product_color_lining
     */
    public function setProductColorLining($product_color_lining)
    {
        $this->product_color_lining = $product_color_lining;
    }

    /**
     * @return mixed
     */
    public function getProductColorLining()
    {
        return $this->product_color_lining;
    }


    /**
     * @param mixed $product_engraving
     */
    public function setProductEngraving($product_engraving)
    {
        $this->product_engraving = $product_engraving;
    }

    /**
     * @return mixed
     */
    public function getProductEngraving()
    {
        return $this->product_engraving;
    }

    /**
     * @param mixed $product_leather_color
     */
    public function setProductLeatherColor($product_leather_color)
    {
        $this->product_leather_color = $product_leather_color;
    }

    /**
     * @return mixed
     */
    public function getProductLeatherColor()
    {
        return $this->product_leather_color;
    }


    /**
     * Get the value of Id Product Type
     *
     * @return mixed
     */
    public function getIdProductType()
    {
        return $this->id_product_type;
    }

    /**
     * Set the value of Id Product Type
     *
     * @param mixed $id_product_type
     *
     * @return self
     */
    public function setIdProductType($id_product_type)
    {
        $this->id_product_type = $id_product_type;

        return $this;
    }


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return false
     */

    public function getAllProduct()
    {
        $query = "SELECT `products`.`id` , `product_name`, `product_description`, `product_price` , `product_type` FROM `products` INNER JOIN `product_type` ON`product_type`.`id` = `id_product_type`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery :false;
    }

    public function getOneProductInfo($id)
    {
        $query = "SELECT `products`.`id` , `product_name`, `product_description`, `product_price` , `id_product_type` , `product_type` FROM `products` INNER JOIN `product_type` ON  `id_product_type` = `product_type`.`id` where products.`id` = :id ";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery :false;
    }

    public function getAllProductsFromOneType($id)
    {
        $query = "SELECT `products`.`id` , `product_name`, `product_description`, `product_price` , `id_product_type` , `product_type` FROM `products` INNER JOIN `product_type` ON  `id_product_type` = `product_type`.`id` where products.`id_product_type` = :id ";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery :false;
    }

    public function addProduct($arrayParameters){
        $query = "INSERT INTO `products` (product_name, product_description, product_price , id_product_type) VALUES (:product_name, :product_description , :product_price , :id_product_type)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("product_name" , $arrayParameters["product_name"] , PDO::PARAM_STR);
        $buildQuery->bindValue("product_description" , $arrayParameters["product_description"] , PDO::PARAM_STR);
        $buildQuery->bindValue("product_price" , $arrayParameters["product_price"] , PDO::PARAM_STR);
        $buildQuery->bindValue("id_product_type" , $arrayParameters["product_type"] , PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function updateProduct($arrayParameters){
        $query = "UPDATE `products` SET product_name = :product_name, product_description = :product_description, product_price = :product_price , id_product_type = :id_product_type WHERE `id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $arrayParameters["id"] , PDO::PARAM_INT);
        $buildQuery->bindValue("product_name" , $arrayParameters["product_name"] , PDO::PARAM_STR);
        $buildQuery->bindValue("product_description" , $arrayParameters["product_description"] , PDO::PARAM_STR);
        $buildQuery->bindValue("product_price" , $arrayParameters["product_price"] , PDO::PARAM_STR);
        $buildQuery->bindValue("id_product_type" , $arrayParameters["product_type"] , PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

}
