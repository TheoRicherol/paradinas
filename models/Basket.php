<?php

class Basket extends Database
{
    /**
     * @var int
     */
    private int $id;
    private int $idUser;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): int
    {
        $this->id = $id;
        return $this->id;
    }

    public function getIdUser(): int
    {
        return $this->id;
    }

    public function setIdUser($idUser): int
    {
        $this->idUser = $idUser;
        return $this->idUser;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function verifyBasket(){
        
    }

    public function createBasket($id)
    {
        $query = "INSERT INTO `basket` (id_users) VALUES ( :user_id )";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("user_id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }


    public function controlUsersBasket($id){
        $query = "SELECT `basket`.`id` FROM  `basket` WHERE `basket`.`id_users` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    /**
     * @param $id
     * @return int
     * Count the number of items of the basket
     */
    public function countItemsInBasket($id)
    {
        $query = "SELECT SUM(quantity) AS 'nbrItems' FROM is_in WHERE id_basket = :id_basket";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_basket" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    public function deleteBasket($id){
        $query = "DELETE FROM `basket` WHERE basket.id = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT );
        return $buildQuery->execute();
    }

    public function getBasketContents($id){
        $query = "SELECT products.product_name , product_type.product_type , products.product_price , is_in.quantity , is_in.quantity * product_price AS total , is_in.id , color_leather.color AS leather  , color_lining.color AS lining FROM basket INNER JOIN is_in on basket.id = is_in.id_basket INNER JOIN products ON is_in.id_product = products.id INNER JOIN product_type ON products.id_product_type = product_type.id INNER JOIN color_leather ON is_in.id_color_leather = color_leather.id INNER JOIN color_lining ON is_in.id_color_lining = color_lining.id WHERE basket.id = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id" , $id , PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

}
