<?php
class LeatherColorsPics extends Database
{
    private $id;
    private $colorLeatherPics;

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
     * Get the value of colorleatherPics
     */
    public function getColorLeatherPics()
    {
        return $this->colorLeatherPics;
    }

    /**
     * Set the value of colorLeatherPics
     *
     * @return  self
     */
    public function setColorLeatherPics($colorLeatherPics)
    {
        $this->colorLeatherPics = $colorLeatherPics;

        return $this;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public function addPicture($name, $id)
    {
        $query = "INSERT INTO `color_leather_picture` (`color_leather_picture` , `id_color_leather`) VALUES (:color_leather_picture , :id_color_leather)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("color_leather_picture", $name, PDO::PARAM_STR);
        $buildQuery->bindValue("id_color_leather", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function getAllPictures()
    {
        $query = "SELECT * FROM `color_leather_picture`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }


    public function getAllPictureOfOneProduct($id)
    {
        $query = "SELECT * FROM `color_leather_picture` WHERE id_color_leather = :id_color_leather";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_color_leather", $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }
    public function deletePicture($id)
    {
        $query = "DELETE FROM `color_leather_picture` WHERE `color_leather_picture`.`id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }
}
