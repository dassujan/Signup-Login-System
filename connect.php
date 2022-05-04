<?php

$con=mysqli_connect('localhost','root','','auth_db');

// if($con){
//     echo "Connection Succesful!";
// }else{
//     die(mysqli_error($con));
// }

if(!$con){
    die(mysqli_error($con));
}

?>