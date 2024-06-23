<?php
include 'navbar.php';
include 'component/dbconnect.php';
?>
<?php

$getpid=$_GET['id'];
$editproduct =$conn->prepare("SELECT * FROM `sellerproducts` WHERE `p-id`=?");
$editproduct->execute([$getpid]);

// $getsid=$_GET['sid'];

// if($editproduct->rowCount()>0){

$fetch_product=$editproduct->fetch(PDO::FETCH_ASSOC);

// }



//==================== FOREIGN KEY IMPORT CONCEPT HERE SELLER TABLE IS SELECT ====================================
// $select_from_foreign=$conn->prepare("SELECT * FROM `seller` WHERE `s-id` = ?");
// $select_from_foreign->execute([$getsid]);
// if ($select_from_foreign) {
//     $fetch_foreign=$select_from_foreign->fetch(PDO::FETCH_ASSOC);
    // Your code to use $fetch_foreign
// } else {
    // Handle the case when the query fails
    // echo "Error: Unable to fetch seller information.";
// }

//==================== FOREIGN KEY IMPORT CONCEPT HERE SELLER TABLE IS SELECT ====================================



if(isset($_POST['delete'])){

    $product=$_POST['productId'];
// it comes from a post request input tag hidden property 


    $delete_product= $conn->prepare("DELETE FROM `sellerproducts` WHERE `sellerproducts`.`p-id` = ?");
$delete_product->execute([$product]);

}


?>

<?php
if(isset($_POST['update'])){

// $price=$_POST['price'];
// $name=$_POST['name'];
$status=$_POST['status'];
// $detail=$_POST['detail'];

// $image = $_FILES['image']['name'];
// $image_tmp_name = $_FILES['image']['tmp_name'];
// $image_folder = "../img/".$image;
// move_uploaded_file($image_tmp_name, $image_folder);
     

// $updateproduct=$conn->prepare("UPDATE `products` SET `p-name`=? `p-price` = ? `p-image`=? `p-detail` = ? `p-status`=  ? WHERE `products`.`p-id` = ?;");
// $updateproduct = $conn->prepare("UPDATE `products` SET `p-name`=?, `p-price`=?, `p-image`=?, `p-detail`=?, `p-status`=? WHERE `products`.`p-id` = ?");
$updateproduct = $conn->prepare("UPDATE `sellerproducts` SET `p-status`=? WHERE `sellerproducts`.`p-id` = ?");

$updateproduct->execute([$status,$getpid]);

echo"<script> alert('Product Updated Successfully')</script>";

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Page</title>
<!-- <link rel="stylesheet" href="../style/two.css"> -->
<link rel="stylesheet" href="../style/original.css">
<style>
    
    /*================================================ EDIT PRODUCT CSSS START================================================ */

    #ProductStatusUpdate{
        width: 100%;
        outline: none;
        line-height: 20px;
        font-size: 20px;
        transition: 1.0s background;
         display: block;
            box-shadow: 0 5px 10px 0.1px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 12px;
        cursor: pointer;
        padding: 8px;
    margin-bottom:12px;
    
    }

    /*================================================ EDIT PRODUCT CSSS END================================================ */

</style>
</head>
<body>

<div class="carousel">
<div class="fruitspage">
<h1 id="heading">EDIT PRODUCTS</h1>
</div>
<div class="box">

<a href="dashboard.php">DASHBOARD</a><span>/ EDIT PRODUCTS</span>
</div>
<!--============================ FORM ================================ -->

<div class="main">

<section>
    <form action="" method="post" enctype="multipart/form-data">
        <h1 class="h1Addproduct">EDIT PRODUCTS</h1>
        <div class="input-field">
        <input type="hidden" name="productId" value="<?= $fetch_product['p-id'];  ?>">  

        <!-- <span class="seller-id">Person id is <?= $fetch_product['s-id'] ?> and seller-name is <?= $fetch_foreign['s-name'] ?> </span> -->


        <label for="">Product satus <sup>*</sup></label>
 <select name="status" id="ProductStatusUpdate">
 <option value="<?= $fetch_product['p-status']; ?>"><?= $fetch_product['p-status']; ?></option>
 <option value="Active">active</option>
<!-- <option value="Deactive">deactive</option> -->

 </select>

    </div>
        <div class="input-field">
        <label for="">Product Name</label>
      
            <input type="text" name="name" maxlength="20" placeholder="add products name" value="<?= $fetch_product['p-name'] ?>" required disabled>
        </div>


        <div class="input-field">
            <label for="">Product Price</label>
            <input type="text" value="<?= $fetch_product['p-price'] ?>" name="price" maxlength="26" placeholder="add products price" required disabled>
        </div>

        <div class="input-field">
            <label for="">product detail</label>
        <textarea name="detail" value=""id="" cols="30" rows="10" placeholder="write product description" disabled required><?= $fetch_product['p-detail'] ?></textarea>
        </div>

        <div class="input-field">
            <label for="">product image <sup>*</sup></label>
            <input type="file" name="image" accept="image/*" value="<?= $fetch_product['p-image'] ?>" required disabled>
        </div>
<div class="input-field">
<img class="Ornamentimage" src="../seller/img/<?= $fetch_product['p-image'] ?> " alt="" disabled>
</div>


        <div class="farmerEDRbox">
<button type="submit" name="update" class="btn" >Update</button>
<a class="viewpath btn" href="admin_viewproduct.php">Go Back</a>

<button type="submit" name="delete" class="btn" onclick="confirmMessage()">Delete</button>

</div>

        
    </form>

</section>
</div>
<!--============================ FORM ================================ -->
    
    
<script>

function confirmMessage(){

let a =prompt("Do you really want to delete your products?If 'Yes' then TYPE 'CONFIRM'. ");
if(a!=='CONFIRM'){
event.preventDefault();



}
}

</script>

    
</section>   
</div>
</div>

</body>
</html>