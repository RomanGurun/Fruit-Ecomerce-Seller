<?php
include 'component/dbconnect.php';

include 'navbar.php';
// $getid=$_GET['post_id'];
// $view_sellerid=$_GET['sid'];

//==================== FOREIGN KEY IMPORT CONCEPT HERE SELLER TABLE IS SELECT ====================================
// $select_from_foreign=$conn->prepare("SELECT * FROM `seller` WHERE `s-id` = ?");
// $select_from_foreign->execute([$view_sellerid]);
// $fetch_foreign=$select_from_foreign->fetch(PDO::FETCH_ASSOC);

// if ($select_from_foreign) {
    // $fetch_foreign = $select_from_foreign->fetch(PDO::FETCH_ASSOC);
    // Your code to use $fetch_foreign
// } else {
    // Handle the case when the query fails
    // echo "Error: Unable to fetch seller information.";
// }

//==================== FOREIGN KEY IMPORT CONCEPT HERE SELLER TABLE IS SELECT ====================================



?>
<!--========================================== Delete Operation ========================================== -->

<?php
if(isset($_POST['delete'])){

    $product=$_POST['productId'];
   $delete_product= $conn->prepare("DELETE FROM `products` WHERE `products`.`p-id` = ?");
$delete_product->execute([$product]);

}

?>
<!--========================================== Delete Operation ========================================== -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/one.css">
    <link rel="stylesheet" href="../style/original.css">
    <style>
        .readprice{
            margin-left:21rem !important ;
        }
    </style>
</head>
<body>
    
<div class="carousel">
<div class="fruitspage">
<h1 id="heading">READ PRODUCTS</h1>
</div>
<div class="box">

<a href="dashboard.php">DASHBOARD</a><span>READ PRODUCTS</span>
</div>

<!--============================ PRODUCT BOX================================ -->

<div class="main">

<section>
<h1 class="productheading">READ PRODUCTS</h1>
    
    <div id="AllProduct">        
          
          <?php

$select_product=$conn->prepare("SELECT * FROM `products` WHERE `p-status`=? ");
$select_product->execute(["deactive"]);
if($select_product->rowCount()>0){

while($fetch_product=$select_product->fetch(PDO::FETCH_ASSOC))
{

?>
<form action="" method="post">
    <div class="farmerpbox">
    <!-- <span class="seller-id">Product id is <?= $fetch_product['p-id'] ?> and seller-name is <?= $fetch_foreign['s-name'] ?> </span> -->

        <span class="farmerpstatus" style="<?php if($fetch_product['p-status']=="deactive"){
            echo"color:red "; } ?> " >  <?= $fetch_product['p-status']; ?>  </span>

        <span class="price readprice">$<?= $fetch_product['p-price'] ?>/-</span>
<input type="hidden" name="productId" value="<?= $fetch_product['p-id'];  ?>">  

<div class="farmerpimage">
<img class="Ornamentimage"src="../seller/img/<?= $fetch_product['p-image']; ?>" alt="">
</div>
<div class="farmerproductname">
    <?= $fetch_product['p-name']?>
</div>

<div class="farmermessage">
    <?= $fetch_product['p-detail']?>
</div>

<div class="farmerEDRbox">
<button type="submit" name="delete" class="btn" onclick="confirmMessage() ">Delete</button>
<a class="viewpath btn" href="admin_viewproduct.php " > Go Back</a>

</div>



</div>


   
<script>

function confirmMessage(){

let a =prompt("Do you really want to delete your products?If 'Yes' then TYPE 'CONFIRM'. ");
if(a!=='CONFIRM'){
event.preventDefault();



}
}

</script>






</form>


<?php

}

}else{
    // <div class="boxxxxxxx"></div>
}

?>



          </div>
        <!-- </div> -->
    
</section>   
</div>
</div>




</div>








</body>
</html>

