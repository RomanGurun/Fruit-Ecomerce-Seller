<?php
include 'navbar.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Page</title>
<!-- <link rel="stylesheet" href="../style/two.css"> -->
<link rel="stylesheet" href="../style/original.css">
</head>
<body>

<div class="carousel">
<div class="fruitspage">
<h1 id="heading">ADD PRODUCTS</h1>
</div>
<div class="box">

<a href="dashboard.php">DASHBOARD</a><span>ADD PRODUCTS</span>
</div>
<!--============================ FORM ================================ -->

<div class="main">

<section>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>ADD PRODUCTS</h1>

        <div class="input-field">

            <label for="">Product Name <sup>*</sup></label>
            <input type="text" name="name" maxlength="20" placeholder="add products name" required>
        </div>


        <div class="input-field">
            <label for="">Product Price</label>
            <input type="text" name="price" maxlength="26" placeholder="add products price" required>
        </div>

        <div class="input-field">
            <label for="">product detail</label>
        <textarea name="detail" id="" cols="30" rows="10" placeholder="write product description" required></textarea>
        </div>

        <div class="input-field">
            <label for="">product image <sup>*</sup></label>
            <input type="file" name="image" accept="image/*" required>
        </div>

<footer class="addproduct-footer">
        <button type="submit" name="publish" class="btn add-product-btn">publish products</button>
        <button type="submit" name="draft" class="btn add-product-btn">save as draft</button>
        </footer>
      
    </form>

</section>
</div>
<!--============================ FORM ================================ -->

</div>










    
</body>
</html>