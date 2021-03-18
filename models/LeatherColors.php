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

    public function getAllColors()
    {
        $query = "SELECT * FROM `color_leather`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if  (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}
