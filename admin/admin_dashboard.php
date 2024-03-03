<?php
include 'navbar.php';
include '../component/dbconnect.php';

 session_start();
 $adminid= isset($_SESSION['id'])?$_SESSION['id'] :null;
 if(!isset($adminid)){
       
    header("location:admin_login.php");
exit;
}



$admin=$conn->prepare("SELECT * FROM `admin` WHERE `id`=? ");
$admin->execute([$adminid]);
if($admin->rowCount()>0){

    echo"The admin id is".$adminid;
    echo "<a href='logout.php'>LOGOUT</a>";

}









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

