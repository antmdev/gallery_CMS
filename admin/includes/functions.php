<?php


//************************************************************************* 
//AUTO LOADER CLASS
//************************************************************************* 
//scans for undeclared objects
// function __autoload($class){ //deprectaed function
// this helps you graba a class name and use it in the URLl    
// OLD VERSION
//     if(file_exists($the_path)) {
//         require_once($the_path);
//     } 
//     else {
//         die(" This file named {$class}.php was not found");
//     }
// }
function classAutoLoader($class){

    $class = strtolower($class);                //make everything lowercase
    $the_path = "includes/{$class}.php";        //provide the path

    if(is_file($the_path) && !class_exists($class)){
        include $the_path;
    }
}
spl_autoload_register('classAutoLoader');


//************************************************************************* 
//AUTO LOADER CLASS
//************************************************************************* 

function redirect($location){
    header("Location:{$location}");
}
?>