<?php

class Orders extends Database
{

    private $id;
    private $idBasket;


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
     * @param $id
     * @return  self
     */
    public function setId($id): Orders
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idBasket
     */
    public function getIdBasket()
    {
        return $this->idBasket;
    }

    /**
     * Set the value of idBasket
     *
     * @return  self
     */
    public function setIdBasket($idBasket): Orders
    {
        $this->idBasket = $idBasket;
        return $this;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public function createOrder(){
        $query = "INSERT INTO orders (id_order_status) VALUES  (1) ";
        $buildQuery = parent::getDb()->prepare($query);
        return $buildQuery->execute();
    }

    public function getOrdersOfOneUser($id): int
    {
        $query = "SELECT `orders`.`id` , `order_status`.`statut` AS `Statut` , SUM(`products`.`product_price`) FROM `orders` INNER JOIN `basket` ON `basket`.`id` = `orders`.`id_basket` INNER JOIN `users` ON `users`.`id` = `basket`.`id_users` INNER JOIN `is_in` ON `is_in`.`id_basket` = `basket`.`id` INNER JOIN `products` ON `products`.`id` = `is_in`.`id` INNER JOIN `order_status` on `order_status`.`id` = `orders`.`id_order_status` WHERE `users`.`id` = :id GROUP BY `orders`.`id`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }
}
