<?php

class Engraving extends Database{
    private $id;
    private $engraving;

    public function setID($id){
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEngraving($engraving)
    {
        $this->engraving = $engraving;
    }

    public function getEngraving()
    {
        return $this->engraving;
    }

    public function __construct()
    {   
        parent::__construct();
    }

}