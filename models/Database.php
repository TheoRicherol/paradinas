<?php

    class Database{
        private $db;

        /**
         * @return mixed
         */
        public function getDb()
        {
            return $this->db;
        }

        /**
         * @param mixed $db
         */
        public function setDb($db)
        {
            $this->db = $db;
        }
        /**
         * Function construt, defines the connection to the database
         */

        public function __construct(){
            $this->setDb(new PDO("mysql:dbname=paradinas;host=localhost;charset=utf8", "root", "theoricherol", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
        }
    }