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

    /**
     * @param $id
     * @return int
     * Count the number of items of the basket
     */
    public function countItemsInBasket($id)
    {
        $query = "SELECT COUNT(*) AS 'nbrItems' FROM is_in WHERE id_basket = :id_basket ";
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

}
