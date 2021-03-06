<?php

require_once("new_config.php");

class Database {

    public  $connection;  //Create a property to open connection

    function __construct(){  //call the construct method
        $this->open_db_connection();
        }

    public function open_db_connection(){
        // $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->connection = new mysqli (DB_HOST,DB_USER,DB_PASS,DB_NAME);   //create a new object and apply the property

        //here we have assigned connection variable as a new instance of "mysqli" object so we can now tap into all of the mysqli commands
        if($this->connection->connect_errno){
        die("Database connection failed" . $this->connection->connect_error);
        } 
        else {
            echo "We are connected";
             }
        }

    public function query($sql){ // to connect to the database
        $result = $this->connection->query($sql); //pass 2 params, connection and $sql
        $this->confirm_query($result);
        return $result;

    }

    private function confirm_query($result){ //If no result from DB flag an error
        if(!$result) {
            die("Query Failed" . $this->connection->error);
        }

    }

    public function escape_string($string){ //Send a string to the DB
       $escaped_string = $this->connection->real_escape_string($string);
       return $escaped_string;
    }

    public function the_insert_id(){ 
        return $this->connection->insert_id;
    }

}


$database = new Database(); //istaniate the class




?>