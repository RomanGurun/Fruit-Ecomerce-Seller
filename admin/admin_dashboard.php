<?php
include 'navbar.php';
include 'component/dbconnect.php';

 session_start();
 $adminid= isset($_SESSION['adminid'])?$_SESSION['adminid'] :null;
 if(!isset($adminid)){
       
    header("location:admin_login.php");
exit;
}



$admin=$conn->prepare("SELECT * FROM `headadmin` WHERE `id`=? ");
$admin->execute([$adminid]);
if($admin->rowCount()>0){

    echo"The admin id is".$adminid;
    echo "<a href='admin_logout.php'>LOGOUT</a>";

}
if(isset($_POST['delete'])){

    $sellerval=$_POST['seller-id'];
$seller=$conn->prepare("DELETE FROM `seller` WHERE `seller`.`s-id` = ?");
$seller->execute([$sellerval]);




}




?>

<style>

*{
    margin:0;
    padding:0;
}

    :root {
     --selenagreen: #87a243;
    --green: #7cab05;
    --light-green: #e0ffcd;
    --box-shadow: 0 0 10px rgba(0 0 0/15%);
}

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
.id,.sname{
    display:block;
font-size:21px;
margin-left:32px;
text-transform:capitalize;
}


.userinformation{
    display:block;
    text-align:center;
font-size:29px;
color:#555;

margin-bottom:23px;
}
#sellerimg{
    border-radius: 135px;
    height: 4rem;
    object-fit:contain;
}
.farmerpimage{
    display:block;
    margin-left:27px;
}
.sellerinform{
    font-size:29px;
    text-align:center;
    display:block;

}
.admins-box{

    margin-top:29px;

box-shadow:var(--box-shadow);
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


// $seller=$conn->prepare("SELECT * FROM `seller`");
// $seller->execute();

// if($seller->rowCount()>0)
// {



    // while($fetchseller = $seller->fetch(PDO::FETCH_ASSOC))
// {

?>

<!-- 
    <div class="admin-container">
    <div class="admin-seller">
    
<form action="" method="post">   
    <div class="as-box">
    
     </div> -->
    <!-- </form>  -->
    
    
    
    
    <!-- </div> -->
    
    
    
    
    <!-- </div> --> 
<!-- <?php 
// }

// }

// ?>
 ============================ PRODUCT BOX================================ -->

<div class="main">

<section>
<h1 class="productheading">DASHBOARD</h1>
    
    <div id="AllProduct">        
          
          <?php
// ==================SELLER ROWCOUNT PHP CODE ============================================================
$seller=$conn->prepare("SELECT * FROM `seller`");
$seller->execute();

$sellerval=$seller->rowCount();
$fetchseller = $seller->fetch(PDO::FETCH_ASSOC);
// ==================SELLER ROWCOUNT PHP CODE ============================================================




// ==================PRODUCT PENDING ROWCOUNT PHP CODE ============================================================

$pvalue="pending";
$product=$conn->prepare("SELECT * FROM `sellerproducts` WHERE `p-status`= ? ");
$product->execute([$pvalue]);

$fetchpstatus=$product->rowCount();
// ==================PRODUCT PENDING ROWCOUNT PHP CODE ============================================================


// ==================PRODUCT ACTIVE ROWCOUNT PHP CODE ============================================================
// $pvaluetwo="active";
$product2=$conn->prepare("SELECT * FROM `sellerproducts` WHERE `p-status` = ?");
$product2->execute(["active"]);
$result2=$product2->rowCount();
// ==================PRODUCT ACTIVE ROWCOUNT PHP CODE ============================================================



// ==================PRODUCT DEACTIVE ROWCOUNT PHP CODE ============================================================
// $pvaluetwo="active";
$product3=$conn->prepare("SELECT * FROM `sellerproducts` WHERE `p-status` = ?");
$product3->execute(["deactive"]);
$result3=$product2->rowCount();
// ==================PRODUCT DEACTIVE ROWCOUNT PHP CODE ============================================================




?>

    <div class="admins-box">
        <div class="sellerinform"><?=$sellerval ?>  </div>

<div class="userinformation">Registered Seller</div>

<div class="farmerEDRbox">
<a class="viewpath btn" href="admin_sellerread.php" >View</a>
</div>

</div>

<div class="admins-box">
    <div class="sellerinform"><?= $fetchpstatus?></div>
    <div class="userinformation">Number of Pending Products</div>
    <a class="viewpath btn" href="admin_viewproduct.php" >View</a>

</div>

<div class="admins-box">
    <div class="sellerinform"><?= $result2?></div>
    <div class="userinformation">Number of Active Products</div>
    <a class="viewpath btn" href="admin_viewproduct.php" >View</a>

</div>
<div class="admins-box">
    <div class="sellerinform"><?= $result3?></div>
    <div class="userinformation">Number of Deactive Products</div>
    <a class="viewpath btn" href="admin_deactiveproduct.php" >View</a>

</div>





          </div>
        <!-- </div> -->
    
</section>   



<!-- // ======================================== SELLER ============================== -->



</div>


</body>
</html>

