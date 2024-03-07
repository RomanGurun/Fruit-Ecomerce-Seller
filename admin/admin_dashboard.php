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

<style>
.admin-container{
border:solid 2px red;


}

.admin-seller{
    display:flex;
    flex-wrap:wrap;
margin:20px;
    border:solid 2px black;

}
.as-box
{ display:block;
    width:100%;
    border:solid 2px red;
margin:10px;
}

</style>


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


<!-- // ======================================== SELLER ============================== -->
<?php


$seller=$conn->prepare("SELECT * FROM `seller`");
$seller->execute();

if($seller->rowCount()>0)
{



    while($fetchseller = $seller->fetch(PDO::FETCH_ASSOC))
{

?>


    <div class="admin-container">
    <div class="admin-seller">
    
<form action="" method="post">   
    <div class="as-box">
    <?= $fetchseller['s-name'] ?>
    
    </div>
    </form> 
    
    
    
    
    </div>
    
    
    
    
    </div>
<?php
}

}

?>
<!-- // ======================================== SELLER ============================== -->



</div>








</body>
</html>

