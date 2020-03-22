<?php

class User {


    //create objects that we can control later (Admin content)
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users() {

    return self::find_this_query("SELECT * FROM users");

    // return self::find_this_query("SELECT * FROM users");
    // global $database; //making the inherited class $database public 
    // $result_set = $database->query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        global $database; 
        $result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();                                //create an empty array to put objects

        while($row = mysqli_fetch_array($result_set)){              //loop throughs the objects and the properties
            $the_object_array[] = self::instantiation($row);        //bringing back objects and properties into the array
        }
        return $the_object_array;

    }

    //Automatically instantiate a class
    //The_object will now instantiate itself
    //this is the long version
    public static function instantiation($the_record){ //get record from DB
        
        $the_object = new self; //means to instantiate a new version of the same class

        // $the_object->id         = $found_user['id'];
        // $the_object->username   = $found_user['username'];
        // $the_object->password   = $found_user['password'];
        // $the_object->first_name = $found_user['first_name'];
        // $the_object->last_name  = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {             //loop through and get key and value
                                                                     //first check that the object has a property!
            if($the_object->has_the_attribute($the_attribute)){     //if the key attribute exists
                $the_object->$the_attribute = $value;               //then assign the object the value
            }
            
            //we want to set the actual value of the $the_attribute variable. If you omit the $ sign you will literally set the the_attribute property on $the_object and we do not want to do that. We want the value of the $the_attribute to be set on the object, so that's why you need to put the $ sign in front of it. Remember that we are here setting the properties and it's values. 
        }

        return $the_object;

    }

    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this); //need to pass in the existing class and use PHP function to grab all variables
        return array_key_exists($the_attribute, $object_properties);
        

    }
}



?>