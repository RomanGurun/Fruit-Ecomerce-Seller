<?php

include 'navbar.php';
include 'component/dbconnect.php';
?>
<?php
if(isset($_POST['delete'])){

    $product=$_POST['productId'];
   $delete_product= $conn->prepare("DELETE FROM `sellerproducts` WHERE `sellerproducts`.`p-id` = ?");
$delete_product->execute([$product]);

}
session_start();
$view_sellerid= isset($_SESSION['id'])?$_SESSION['id'] :null;



?>






<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product Page</title>
<!-- <link rel="stylesheet" href="../style/two.css"> -->
<link rel="stylesheet" href="../style/original.css">
</head>
<body>

<div class="carousel">
<div class="fruitspage">
<h1 id="heading">ALL PRODUCTS</h1>
</div>
<div class="box">

<a href="dashboard.php">DASHBOARD</a><span>/ ALL PRODUCTS</span>
</div>
<!--============================ PRODUCT BOX================================ -->

<div class="main">

<section>
<h1 class="productheading">ALL PRODUCTS</h1>
    
    <div id="AllProduct">        
          
          <?php

$select_product=$conn->prepare("SELECT * FROM `sellerproducts` WHERE `sellerproducts`.`s-id` = ?");
$select_product->execute([$view_sellerid]);
//==================== FOREIGN KEY IMPORT CONCEPT HERE SELLER TABLE IS SELECT ====================================
$select_from_foreign=$conn->prepare("SELECT * FROM `seller` WHERE `s-id` = ?");
$select_from_foreign->execute([$view_sellerid]);
$fetch_foreign=$select_from_foreign->fetch(PDO::FETCH_ASSOC);


//==================== FOREIGN KEY IMPORT CONCEPT HERE SELLER TABLE IS SELECT ====================================

if($select_product->rowCount()>0){

while($fetch_product=$select_product->fetch(PDO::FETCH_ASSOC))
{

?>
<form action="" method="post">
    <div class="farmerpbox">
        <span class="farmerpstatus" style="<?php if($fetch_product['p-status']=="deactive" || $fetch_product['p-status']=="Deactive"){
            echo"color:red "; } ?> " >  <?= $fetch_product['p-status']; ?>  </span>

        <span class="price">Rs. <?= $fetch_product['p-price'] ?>/-</span>
        <span class="seller-id">Person id is <?= $fetch_product['s-id'] ?> and seller-name is <?= $fetch_foreign['s-name'] ?> </span>
<input type="hidden" name="productId" value="<?= $fetch_product['p-id'];  ?>">  

<div class="farmerpimage">
<img class="Ornamentimage"src="img/<?= $fetch_product['p-image']; ?>" alt="">
</div>
<div class="farmerproductname">
    <?= $fetch_product['p-name']?>
</div>

<div class="farmerEDRbox">
<a class="btn" href="edit_product.php?id=<?= $fetch_product['p-id']; ?>">Edit</a>
<button type="submit" name="delete" class="btn" onclick="return confirm('Do you really want to delete your products ?')">Delete</button>
<a class="viewpath btn" href="read_product.php?post_id=<?= $fetch_product['p-id'];  ?>" >View</a>

</div>



</div>








</form>


<?php
//================================================ PHP INDSDE XA HTML ELEMNET ================================================
}

}else{
    echo' <div class="NoProductBox">
    <h1 id="Productheading">NO Product Added Yet !</h1>
    <a class="addpath btn" href="add_product.php" >Add Product</a>
    </div>';
   
}

//================================================ PHP INDSDE XA HTML ELEMNET ================================================


?>



          </div>
        <!-- </div> -->
    
</section>   
</div>

</div>

</body>
</html>