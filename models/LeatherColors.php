<?php

class Leathercolors extends Database
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

    public function setLeatherColor($color)
    {
        $this->color = $color;
    }
    public function getLeatherColor()
    {
        return $this->color;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function addColor($color)
    {
        $query = "INSERT INTO color_leather (color) VALUES (:color)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("color", $color, PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function deleteColor($id)
    {
        $query = "DELETE FROM color_leather WHERE `color_leather`.`id` = :id ";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    public function getAllColors()
    {
        $query = "SELECT `color_leather`.`id` , `color_leather`.`color` , `color_leather_picture`.`id` AS id_picture , `color_leather_picture`.`color_leather_picture` FROM `color_leather` LEFT JOIN `color_leather_picture` ON `color_leather_picture`.`id_color_leather` = `color_leather`.`id` ";
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
