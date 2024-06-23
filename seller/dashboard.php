<?php
include 'navbar.php';
include 'component/dbconnect.php';

 session_start();
 $sellerid= isset($_SESSION['id'])?$_SESSION['id'] :null;
 if(!isset($sellerid)){
       
    header("location:login.php");
exit;
}



$seller=$conn->prepare("SELECT * FROM `seller` WHERE `s-id`=? ");
$seller->execute([$sellerid]);
if($seller->rowCount()>0){

    echo"The seller id is".$sellerid;
    echo "<a href='logout.php'>LOGOUT</a>";
// Logical ERROR
}









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/one.css">
    <link rel="stylesheet" href="../style/original.css">
</head>
<body>
    
<div class="carousel">
<div class="fruitspage">
<h1 id="heading">DASHBOARD</h1>
</div>
<div class="box">

<a href="dashboard.php">Home</a><span>Dashboard</span>
</div>
</div>








</body>
</html>

