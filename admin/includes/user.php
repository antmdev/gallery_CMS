<?php

class User {

    public static function find_all_users() {
    global $database; //making the inherited class $database public 
    $result_set = $database->query("SELECT * FROM users");
    return $result_set;

    }

}



?>