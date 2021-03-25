<?php

class IsIn extends Database{
    private $id;
    private $basketId;
    private $colorLeatherID;
    private $colorLiningID;
    private $engraving;
    private $quantity;

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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBasketId()
    {
        return $this->basketId;
    }

    /**
     * @param mixed $basketId
     */
    public function setBasketId($basketId): void
    {
        $this->basketId = $basketId;
    }

    /**
     * @return mixed
     */
    public function getColorLeatherID()
    {
        return $this->colorLeatherID;
    }

    /**
     * @param mixed $colorLeatherID
     */
    public function setColorLeatherID($colorLeatherID): void
    {
        $this->colorLeatherID = $colorLeatherID;
    }

    /**
     * @return mixed
     */
    public function getColorLiningID()
    {
        return $this->colorLiningID;
    }

    /**
     * @param mixed $colorLiningID
     */
    public function setColorLiningID($colorLiningID): void
    {
        $this->colorLiningID = $colorLiningID;
    }

    /**
     * @return mixed
     */
    public function getEngraving()
    {
        return $this->engraving;
    }

    /**
     * @param mixed $engraving
     */
    public function setEngraving($engraving): void
    {
        $this->engraving = $engraving;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }


    public function __construct(){
        parent::__construct();
    }

    public function addToBasket($arrayParameters){
        $query = "INSERT INTO `is_in` ( `id_product`  , `id_basket`, `id_color_leather`, `id_color_lining`, `engraving` , `quantity`) VALUES (:id_product, :id_basket, :id_color_leather , :id_color_lining , :engraving , default )";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_product" , $arrayParameters["id_product"] , PDO::PARAM_INT);
        $buildQuery->bindValue("id_basket" , $arrayParameters["id_basket"] , PDO::PARAM_INT);
        $buildQuery->bindValue("id_color_leather" , $arrayParameters["id_color_leather"]);
        $buildQuery->bindValue("id_color_lining" , $arrayParameters["id_color_lining"] , PDO::PARAM_INT);
        $buildQuery->bindValue("engraving" , $arrayParameters["engraving"] , PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function increaseQuantity($id){
        $query = "UPDATE `is_in` SET `quantity` = `quantity` + 1 WHERE `id` = :id" ;
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
    }

    public function decreaseQuantity($id){
        $query = "UPDATE `is_in` SET `quantity` = `quantity` + 1 WHERE `id` = :id" ;
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
    }

    public function goToOrder($arrayParameters){
        $query = "UPDATE is_in SET id_basket = NULL , id_order = :id_order WHERE id_basket = :id_basket";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_order" , $arrayParameters["id_order"] , PDO::PARAM_INT);
        $buildQuery->bindValue("id_basket" , $arrayParameters["id_basket"] ,PDO::PARAM_INT);
    }

}