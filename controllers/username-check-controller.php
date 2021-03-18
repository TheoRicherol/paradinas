<?php
require "../models/Database.php";
require "../models/Users.php";

if(isset($_GET["username"])){
    $User = new Users();
    $result = $User->searchUser($_GET["username"]);
    echo json_encode($result);
}