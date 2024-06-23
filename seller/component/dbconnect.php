<?php

$db_name="mysql:host=localhost;dbname=fruitsellersiteecommerce";
$username="root";
$userpasword="";
$conn= new PDO($db_name,$username,$userpasword);
// $conn object attribute inside objects....




if($conn){
    // echo'database connecetd successfully';

}else{

    echo'database not connected successfully.';

}

?>