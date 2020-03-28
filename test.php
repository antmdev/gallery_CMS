<?php include("includes/header.php"); ?>

<?php
//**************************
//WHILE LOOPS
//**************************

// $counter = 0;
// while($counter < 10){
//     echo "hello students";
//     $counter +=1;
//     // $counter++; //other version
// }
// 

//**************************
//FOR LOOPS
//**************************

//index -> test for condition -> increment

// for($counter = 0; $counter < 10; $counter++){
//     echo $counter . "<br>"; 
// }

//**************************
//FOR EACH LOOP - WORKS ONLY WITH ARRAYS 
//**************************

//goes only through arrays, dont need to tell it to stop as it checks the whole array

//array -> takes each value and asigns it a number

// $numbers = array(345,567,564,434,45,55,6666);

// sort($numbers);

// foreach($numbers as $number){
//     echo $number . "<br>"; 
// }

//**************************
//RETURN FUNCTIONS 
//**************************

//echos will only post it, but if you want to use the value somewhere else you need to return it

function addNumbers($number1,$number2){
    $sum = $number1 + $number2;
    return $sum; //if you comment this out you can't use the function
}

$result = addNumbers(34, 64);
$result = addNumbers(100,$result);

echo $result;





//
//
//
?>

<?php include("includes/footer.php"); ?>
