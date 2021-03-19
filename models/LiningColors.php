<?php

class Liningcolors extends Database
{
    private $id;
    private $color;

    /**
     * @param mixed $id
     */
    public function setID($id)
    {
        $this->id = $id;
    }
    public function getID()
    {
        return $this->id;
    }

    public function setLiningColor($color)
    {
        $this->color = $color;
    }
    public function getLiningColor()
    {
        return $this->color;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function addColor($color)
    {
        $query = "INSERT INTO color_lining (color) VALUES (:color)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("color", $color, PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function deleteColor($id)
    {
        $query = "DELETE FROM color_lining WHERE `color_lining`.`id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function getAllColors()
    {
        $query = "SELECT `color_lining`.`id` , `color_lining`.`color` , `color_lining_picture`.`id` AS id_picture , `color_lining_picture`.`color_lining_picture` FROM `color_lining` LEFT JOIN `color_lining_picture` ON `color_lining_picture`.`id_color_lining` = `color_lining`.`id` ";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}
