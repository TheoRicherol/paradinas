<?php
class LiningColorsPics extends Database
{
    private $id;
    private $colorLiningPics;

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
     * Get the value of colorLiningPics
     */
    public function getColorLiningPics()
    {
        return $this->colorLiningPics;
    }

    /**
     * Set the value of colorLiningPics
     *
     * @return  self
     */
    public function setColorLiningPics($colorLiningPics)
    {
        $this->colorLiningPics = $colorLiningPics;

        return $this;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public function addPicture($name, $id)
    {
        $query = "INSERT INTO `color_lining_picture` (`color_lining_picture` , `id_color_lining`) VALUES (:color_lining_picture , :id_color_lining)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("color_lining_picture", $name, PDO::PARAM_STR);
        $buildQuery->bindValue("id_color_lining", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function getAllPictures()
    {
        $query = "SELECT * FROM `color_lining_picture`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }


    public function getAllPictureOfOneProduct($id)
    {
        $query = "SELECT * FROM `color_lining_picture` WHERE id_color_lining = :id_color_lining";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id_color_lining", $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }
    public function deletePicture($id)
    {
        $query = "DELETE FROM `color_lining_picture` WHERE `color_lining_picture`.`id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }
}
