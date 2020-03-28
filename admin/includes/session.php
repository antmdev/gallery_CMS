<?php

class Session {
    private $signed_in = false;
    public $user_id;

function __construct() { //start session automatically
    session_start(); //start session
    $this->check_the_login(); //call this method automatically on start
    }

//GETTER METHOD TO GET A PRIVATE VALUE FROM THE CLASS
public function is_signed_in(){
    return $this->$signed_in; //will return true or false depening on if the user is signed in
}

//CHECK THE DB TO LOG IN THE USER
public function login($user){
    if($user){
        //assign the (session ID) to the user & (user ID) from the USER Class
        $this->user_id = $_SESSION['user_id'] = $user->id; 
        $this->signed_in = true; 
    }
}

public function logout(){
    unset($_SESSION['user_id']);            //remove sessionID
    unset($this->user_id);                  //remove USERID
    $this->signed_in = false;                //set signed in to FALSEE
}

private function check_the_login(){

    if(isset($_SESSION['user_id'])){             //check for a session
        $this->user_id = $_SESSION['user_id'];    //Apply what is in the session to our object property
        $this->signed_in = true;
    

        }   else {
        unset($this->$user_id);                  //if we dont find it we unset the userID
        $this->signed_in = false;   
            }
    }
   

}

$session = new Session();

?>