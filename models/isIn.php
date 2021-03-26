<?php

class IsIn extends Database
{
    private $id;
    private $idProduct;
    private $basketId;
    private $orderId;
    private $colorLeatherID;
    private $colorLiningID;
    private $engraving;
    private $quantity;

    public function __construct()
    {
        parent::__construct();
    }

    // Fonction hydratation automatique

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucFirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param mixed $idProduct
     */
    public function setIdProduct($idProduct): void
    {
        $this->idProduct = $idProduct;
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
        $quantity = (int)$quantity;
        if (0 < (int)$quantity && $quantity >= 99) {
            $this->quantity = $quantity;
        }
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $orderId = (int)$orderId;
        $this->orderId = $orderId;
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
     * @return int
     */
    public function setId($id): int
    {
        $id = (int)$id;
        $this->id = $id;
        return $this->id;
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
    public function setBasketId($basketId): int
    {
        $basketId = (int)$basketId;
        $this->basketId = $basketId;
        return $this->basketId;

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
    public function setColorLeatherID($colorLeatherID): int
    {
        $colorLeatherID = (int)$colorLeatherID;
        $this->colorLeatherID = $colorLeatherID;
        return $this->colorLeatherID;
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
    public function setColorLiningID($colorLiningID): int
    {
        $colorLiningID = (int)$colorLiningID;
        $this->colorLiningID = $colorLiningID;
        return $this->colorLiningID;
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
    public function setEngraving($engraving): string
    {
        if (is_string($engraving)) {
            if (0 < strlen($engraving) && strlen($engraving) >= 3) {
                $this->engraving = $engraving;
            }
        }
        return $this->engraving;
    }

    public function increaseQuantity($id)
    {
        $query = "UPDATE `is_in` SET `quantity` = `quantity` + 1 WHERE `id` = :id;
                  UPDATE is_in INNER JOIN products on is_in.id_product = products.id  SET `total` = `quantity` * `products`.`product_price` WHERE `id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
    }

    public function decreaseQuantity($id)
    {
        $query = "UPDATE `is_in` SET `quantity` = `quantity` - 1 WHERE is_in.`id` = :id;
                UPDATE is_in INNER JOIN products on is_in.id_product = products.id  SET `total` = `quantity` * `products`.`product_price` WHERE is_in.`id` = :id;
                DELETE FROM is_in WHERE `quantity`< 1";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
    }

    public function deleteFromBasket($id)
    {
        $query = "DELETE FROM is_in WHERE is_in.id = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
    }

    public function goToOrder($arrayParameters)
    {
        $query = "UPDATE is_in SET id_basket = NULL , id_order = :id_order WHERE id_basket = :id_basket";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_order", $arrayParameters["id_order"], PDO::PARAM_INT);
        $buildQuery->bindValue("id_basket", $arrayParameters["id_basket"], PDO::PARAM_INT);
    }

    public function addToBasket($arrayParameters)
    {
        $query = "INSERT INTO `is_in` ( `id_product`  , `id_basket`, `id_color_leather`, `id_color_lining`, `engraving` , `quantity` , `total`) VALUES (:id_product, :id_basket, :id_color_leather , :id_color_lining , :engraving , default , default )";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_product", $arrayParameters["id_product"], PDO::PARAM_INT);
        $buildQuery->bindValue("id_basket", $arrayParameters["id_basket"], PDO::PARAM_INT);
        $buildQuery->bindValue("id_color_leather", $arrayParameters["id_color_leather"], PDO::PARAM_INT);
        $buildQuery->bindValue("id_color_lining", $arrayParameters["id_color_lining"], PDO::PARAM_INT);
        $buildQuery->bindValue("engraving", $arrayParameters["engraving"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }


}