<?php
include 'navbar.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Page</title>
<link rel="stylesheet" href="../style/two.css">

</head>
<body>

<div class="carousel">
<div class="fruitspage">
<h1>ADD PRODUCTS</h1>
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

            <label for="">user name <sup>*</sup></label>
            <input type="text" name="name" maxlength="20" placeholder="Enter your username" required>
        </div>


        <div class="input-field">
            <label for="">user email</label>
            <input type="email" name="email" maxlength="26" placeholder="Enter your email" required>
        </div>

        <div class="input-field">
            <label for="">user password</label>
            <input type="password" name="password" maxlength="20" placeholder="Enter your password" required>
        </div>

        <div class="input-field">
            <label for="">confirm password</label>
            <input type="password" name="cpassword" maxlength="20" placeholder="confirm password" required>
        </div>

        <div class="input-field">
            <label for="">select profile <sup>*</sup></label>
            <input type="file" name="image" accept="image/*" required>
        </div>


        <button type="submit" name="register" class="btn">register now</button>
        <p>already have an account ?<a href="login.php"> login now</a></p>

    </form>

</section>
</div>
<!--============================ FORM ================================ -->

</div>










    
</body>
</html>