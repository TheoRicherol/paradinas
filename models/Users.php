<?php

class Users extends Database
{
    private $id;
    private $user_firstname;
    private $user_lastname;
    private $user_birthdate;
    private $user_mail;
    private $user_phone;

    public function __construct()
    {
        parent::__construct();
    }

//    /**
//     * @return mixed
//     */
//    public function getUserFirstname()
//    {
//        return $this->user_firstname;
//    }
//
//    /**
//     * @param mixed $user_firstname
//     */
//    public function setUserFirstname($user_firstname)
//    {
//        $this->user_firstname = $user_firstname;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUserLastname()
//    {
//        return $this->user_lastname;
//    }
//
//    /**
//     * @param mixed $user_lastname
//     */
//    public function setUserLastname($user_lastname)
//    {
//        $this->user_lastname = $user_lastname;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUserBirthdate()
//    {
//        return $this->user_birthdate;
//    }
//
//    /**
//     * @param mixed $user_birthdate
//     */
//    public function setUserBirthdate($user_birthdate)
//    {
//        $this->user_birthdate = $user_birthdate;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUserMail()
//    {
//        return $this->user_mail;
//    }
//
//    /**
//     * @param mixed $user_mail
//     */
//    public function setUserMail($user_mail)
//    {
//        $this->user_mail = $user_mail;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUserPhone()
//    {
//        return $this->user_phone;
//    }
//
//    /**
//     * @param mixed $user_phone
//     */
//    public function setUserPhone($user_phone)
//    {
//        $this->user_phone = $user_phone;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @param mixed $id
//     */
//    public function setId($id)
//    {
//        $this->id = $id;
//    }

    public function addUser($arrayParameters)
    {
        $query = 'INSERT INTO `users` (`user_firstname`, `user_lastname` , `user_birthdate` , `user_mail`, `user_phone` , `user_adress_number` , `user_adress_street` , `user_adress_complement` , `user_adress_postal_code` , `user_adress_city`, `user_adress_country`, `user_username`, `user_password`) VALUES (:user_firstname , :user_lastname , :user_birthdate , :user_mail, :user_phone , :user_adress_number , :user_adress_street , :user_adress_complement , :user_adress_postal_code  , :user_adress_city, :user_adress_country, :user_username, :user_password);';
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("user_firstname", $arrayParameters["firstname"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_lastname", $arrayParameters["lastname"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_birthdate", $arrayParameters["birthdate"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_mail", $arrayParameters["mail"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_phone", $arrayParameters["phone"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_number", $arrayParameters["adress-number"], PDO::PARAM_INT);
        $buildQuery->bindValue("user_adress_street", $arrayParameters["adress-street"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_complement", $arrayParameters["adress-complement"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_postal_code", $arrayParameters["postal-code"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_city", $arrayParameters["adress_city"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_country", $arrayParameters["country"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_username", $arrayParameters["username"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_password", $arrayParameters["password"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function updateUser($arrayParameters)
    {
        $query = "UPDATE `users` SET user_firstname = :user_firstname, user_lastname = :user_lastname , user_birthdate = :user_birthdate , user_mail = :user_mail, user_phone = :user_phone , user_adress_number = :user_adress_number , user_adress_street = :user_adress_street , user_adress_complement = :user_adress_complement , user_adress_postal_code = :user_adress_postal_code , user_adress_city = :user_adress_city , user_adress_country = :user_adress_country, user_username = :user_username, user_password = :user_password WHERE `users`.`id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("user_firstname", $arrayParameters["firstname"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_lastname", $arrayParameters["lastname"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_birthdate", $arrayParameters["birthdate"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_mail", $arrayParameters["mail"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_phone", $arrayParameters["phone"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_number", $arrayParameters["adress-number"], PDO::PARAM_INT);
        $buildQuery->bindValue("user_adress_street", $arrayParameters["adress-street"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_complement", $arrayParameters["adress-complement"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_postal_code", $arrayParameters["postal-code"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_city", $arrayParameters["adress_city"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_adress_country", $arrayParameters["country"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_username", $arrayParameters["username"], PDO::PARAM_STR);
        $buildQuery->bindValue("user_password", $arrayParameters["password"], PDO::PARAM_STR);
        $buildQuery->bindValue("id", $arrayParameters["id"], PDO::PARAM_INT);
        return $buildQuery->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteuser($id)
    {
        $query = "DELETE FROM `users`WHERE `id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }


    public function verifyUser($username)
    {
        $query = "SELECT `users`.`id` , user_firstname, user_lastname , user_birthdate , user_mail, user_phone , user_adress_number , user_adress_street , user_adress_complement , user_adress_postal_code , user_adress_city, user_adress_country, user_username, user_password , users_role_role FROM `users` INNER JOIN `roles` on `id_roles` = `roles`.`id` WHERE `user_username` = :username OR `user_mail`=:username";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("username", $username, PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        return !empty($resultQuery) ? $resultQuery : false;
    }

    public function searchUser(string $username)
    {
        $query = "SELECT `users`.`id` FROM `users` WHERE user_username = :username OR user_mail = :username";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("username", $username, PDO::PARAM_STR);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return "Valide";
        }
    }
}
