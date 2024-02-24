<?php
include 'navbar.php';
include '../component/dbconnect.php';
?>
<?php
if(isset($_POST['delete'])){

    $product=$_POST['productId'];
   $delete_product= $conn->prepare("DELETE FROM `products` WHERE `products`.`p-id` = ?");
$delete_product->execute([$product]);

}


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
<link rel="stylesheet" href="../style/originals.css">
</head>
<body>

<div class="carousel">
<div class="fruitspage">
<h1 id="heading">ALL PRODUCTS</h1>
</div>
<div class="box">

<a href="dashboard.php">DASHBOARD</a><span>ALL PRODUCTS</span>
</div>
<!--============================ PRODUCT BOX================================ -->

<div class="main">

<section>
<h1 class="productheading">ALL PRODUCTS</h1>
    
    <div id="AllProduct">        
          
          <?php

$select_product=$conn->prepare("SELECT * FROM `products` ");
$select_product->execute();
if($select_product->rowCount()>0){

while($fetch_product=$select_product->fetch(PDO::FETCH_ASSOC))
{

?>
<form action="" method="post">
    <div class="farmerpbox">
        <span class="farmerpstatus" style="<?php if($fetch_product['p-status']=="deactive"){
            echo"color:red "; } ?> " >  <?= $fetch_product['p-status']; ?>  </span>

        <span class="price">$<?= $fetch_product['p-price'] ?>/-</span>
<input type="hidden" name="productId" value="<?= $fetch_product['p-id'];  ?>">  

<div class="farmerpimage">
<img class="Ornamentimage"src="../img/<?= $fetch_product['p-image']; ?>" alt="">
</div>
<div class="farmerproductname">
    <?= $fetch_product['p-name']?>
</div>

<div class="farmerEDRbox">
<a class="btn" href="edit_product.php?id=<?= $fetch_product['p-id']; ?>">Edit</a>
<button type="submit" name="delete" class="btn" onclick="return confirm('Do you really want to delete your products ?')">Delete</button>
<button type="submit" name="" class="btn">View</button>
<a href="read_product.php?id=<?= $fetch_product['p-id'];  ?>"></a>
</div>



</div>








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

</body>
</html>