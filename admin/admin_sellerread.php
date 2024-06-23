<?php
include 'navbar.php';
include 'component/dbconnect.php';

 session_start();
 $adminid= isset($_SESSION['id'])?$_SESSION['id'] :null;
 if(!isset($adminid)){
       
    header("location:admin_login.php");
exit;
}



$admin=$conn->prepare("SELECT * FROM `headadmin` WHERE `id`=? ");
$admin->execute([$adminid]);
if($admin->rowCount()>0){

    echo"The admin id is".$adminid;
    echo "<a href='logout.php'>LOGOUT</a>";

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
font-size:25px;
color: var(--selenagreen);
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

$seller=$conn->prepare("SELECT * FROM `seller`");
$seller->execute();

if($seller->rowCount()>0)
{



    while($fetchseller = $seller->fetch(PDO::FETCH_ASSOC))
{

?>

<!-- $select_product=$conn->prepare("SELECT * FROM `products`"); -->
<!-- $select_product->execute(); -->
<form action="" method="post">
    <div class="farmerpbox">
<div class="userinformation">Seller Information</div>
<input type="hidden" name="seller-id"value="<?=$fetchseller['s-id']  ?>">      

<div class="farmerpimage">
<img id="sellerimg"src="../seller/img/<?= $fetchseller['s-profile']; ?>" alt="">
</div>


<div class="id">Id = <?= $fetchseller['s-id'] ?>

    </div>

        <span class="sname">Username :<?= $fetchseller['s-name'] ?> </span>
        <span class="sname">Useremail :<?= $fetchseller['s-email'] ?> </span>
 
<div class="farmerEDRbox">
<!-- <button type="submit" name="delete" class="btn" onclick="let a=prompt('Do you really want to delete your products ?');
if(a!=='CONFIRM'){ exit;}
">Delete</button> -->
<button type="submit" name="delete" class="btn" onclick="confirmDelete()">Delete</button>


<a class="viewpath btn" href="admin_readproduct.php?post_id=<?= $fetch_product['p-id'];?> ?sid=<?= $fetch_foreign['s-id']; ?>" >Registered</a>

</div>



</div>
</form>


<?php
//================================================ PHP INDSDE XA HTML ELEMNET ================================================
}

}else{
    echo' <div class="NoProductBox">
    <h1 id="Productheading">NO seller available Yet !</h1>
    // <a class="addpath btn" href="add_product.php" >Add Product</a>
    </div>';
   
}

//================================================ PHP INDSDE XA HTML ELEMNET ================================================


?>



          </div>
        <!-- </div> -->
    
</section>   



<!-- // ======================================== SELLER ============================== -->



</div>

<script>
function confirmDelete() {
    let a = prompt('Do you really want to delete this account ? IF "YES" then type "CONFIRM" ');
    if (a !== 'CONFIRM') {
        event.preventDefault(); // Prevent form submission
    }
}
</script>







</body>
</html>

