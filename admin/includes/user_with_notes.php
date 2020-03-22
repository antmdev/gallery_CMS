<?php

class User {


    //create objects (Attribute) that we can control later (Admin content)
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    //************************************************************************************************/
    //***** FIND ALL USERS:
    //  Calls the function $find_this_query 
    //
    //************************************************************************************************/

    public static function find_all_users() {

    return self::find_this_query("SELECT * FROM users");
    // return self::find_this_query("SELECT * FROM users");
    // global $database; //making the inherited class $database public 
    // $result_set = $database->query("SELECT * FROM users");
    }
    
    //************************************************************************************************/
    //***** FIND USERS BY ID:
    //  pass in the parameter USERID
    // Connect to the Database
    // instantiate the user class and select object find_this_query
    // Tap into the find_this_query function and SELECT all of the user IDs where userID = $user_id
    // $user_id - is not used in this class but we can call the variable anywhere else in the program
    // assign the output to $the_result_array variable
    // 
    //************************************************************************************************/

    public static function find_user_by_id($user_id) {
        global $database; 
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        return $found_user;


        // LONG HAND VERSION OF IF STATEMENT
        // if(!empty($user_result_array)) {
        //     $first_item = array_shift($the_result_array);
        //     return $first_item;
        // }   else {
        //     return false;
        // }
        // SHORT HAND VERSION OF IF STATEMENT
        // return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    //************************************************************************************************/
    //***** FIND THIS QUERY:
    //  1) Connnect to Database
    //  2) Make a request to the DB ($result_set = $database->query($sql);)
    //  3) Crate an array to store the objects that are returned ($the_object_array = array();)
    //  4) Use a while loop to fecth the result set (while($row = mysqli_fetch_array($result_set)){ )
    //  5) Assign result set to the variable $row (so now the table is in $row
    //  6) Instantiatie the instantiation method using self
    //  7) We use the INSTANTIATTION METHOD and pass in the Array we have just captured
    //  7) Which returns a parameter $the_record
    //   
    //************************************************************************************************/
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

    //************************************************************************************************/
    //***** INSTANTIATION METHOD:
    //  1) pass in $the_record which is the same as $row
    //  2) We instantiate the object (  $the_object = new self;)
    //  3) Then we use the ForEach loop to loop through $the_record - which is the same as $row
    //  4) We get out a Key and a Value (foreach ($the_record as $the_attribute => $value) ) 
    //  5) Then we do an IF statement just to make sure it contains a key (property/object) soemthing
    //  6) We use this other method "->has_the_attribute" to test for this (SEE BELOW the ATTRIBUTE)
    //  7) If the ATtribtute returns TRUE then we assign it the OBJECT ($the_object) property  value
    //  8) That VALUE would be i.e ['last_name']; ['username'];
    //  9) That KEY would be i.e $found_user
    //************************************************************************************************/
    public static function instantiation($the_record){ //get record from DB
        
        $the_object = new self; //means to instantiate a new version of the same class
        foreach ($the_record as $the_attribute => $value) {             //loop through and get key and value
                                                                     //first check that the object has a property!
            if($the_object->has_the_attribute($the_attribute)){     //if the key attribute exists
                $the_object->$the_attribute = $value;               //then assign the object the value
            }

        // $the_object->id         = $found_user['id'];
        // $the_object->username   = $found_user['username'];
        // $the_object->password   = $found_user['password'];
        // $the_object->first_name = $found_user['first_name'];
        // $the_object->last_name  = $found_user['last_name'];

        //we want to set the actual value of the $the_attribute variable. If you omit the $ sign you will literally set the the_attribute property on $the_object and we do not want to do that. We want the value of the $the_attribute to be set on the object, so that's why you need to put the $ sign in front of it. Remember that we are here setting the properties and it's values. 
        }

        return $the_object;

    }
    //************************************************************************************************/
    //***** HAS THE ATTRIBUTE:
    //  1) Pass in $the_attribute (which is the KEY) from Key value pair
    //  2) Use the Building function get_object_vars($this); to pick up all the attributes from this whole class  - specific with $this -> for the USER class
    //  3) i.e public $id;  public $username public $password; public $first_name; public $last_name;
    //  4) This returns an ARRAY and assigns to $object_properties
    //  5) then we use array_key_exists to check that the parameter $the_attribute exist in the array
    //  6) $object_properties if it is, it returns TRUE
    //  7) If not  it returns FALSE
    //   
    //************************************************************************************************/

    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this); //need to pass in the existing class and use PHP function to grab all variables
        return array_key_exists($the_attribute, $object_properties);
        

    }
}



?>