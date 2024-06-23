<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="one.css">
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
 font-size:20px;
}

:root {
    --selenagreen: #87a243;
   
    --green: #7cab05;
    --light-green: #e0ffcd;
    --box-shadow: 0 0 10px rgba(0 0 0/15%);
}
body{
    /* background:yellow; */
    background-image: url('../img/body-bg.jpg');
    width: 100%;
 
}

/* 
.main::before{
    content:'jkjkj';
  background-image: url("photographer.jpg"); /* The image used */
  /* background-color: #cccccc; */
   /* Used if the image is unavailable */
  /* height: 500px; */
   /* You must set a specified height */
  /* background-position: center;  */
  /* Center the image */
  /* background-repeat: no-repeat; */
   /* Do not repeat the image */
  /* background-size: cover;  */



    /* background-image: url('../img/body-bg.jpg'); */
    /* width: 100%; */
/* } */ 

.main{
     display: flex;
    /* border:solid 2px black; */
    padding:30px 20px;
justify-content:center;
margin: 8rem;
background:#fff;
/* box-shadow: 0 2px 6px 0 rgba(0 0 0/10%); */
box-shadow: 0 10px 18px 0 rgba(0 0 0/10%);

}
section{
    
    
    display:flex;
    /* border:solid 2px black; */
   width:50%;
   /* width:100%; */
flex-wrap:wrap;
margin: 20px 20px;
box-shadow: 0 10px 18px 0 rgba(0 0 0/10%);
    background: #fff;
  
}
form{
    
}

label{
color:var(--green);
    display:block;
    
    text-transform:capitalize;
    /* text-align:center; */
}
.input-field{
    width:100%;

}
h1{
font-size:30px;
    text-align:center;
    margin:12px;
}
.btn:hover{
    background-color:var(--selenagreen);
}
.btn,input{
    transition:1.0s background;
    margin:8px;
display:block;
    margin:20px auto;
    
    box-shadow: 0 5px 20px 0.1px rgba(0,0,0,0.1);
    border:none;
width:25%;
border-radius:12px;
cursor:pointer;
padding: 8px;
}

input{
    width:100%;
    outline:none;
    line-height:20px;
    font-size:20px;
}
form{
/* border:solid 2px green; */
width:100%;
padding:20px;
}
p,a{
text-transform:capitalize;
text-align:center;
}
a{
    list-style:none;
    color:red;
    text-decoration:none;
}

.logo{
border-radius:20px;
width:17%;
display: block;
margin: 21px auto;
}


@media(max-width:991px){
.main{
    margin:2rem;
    /* margin:1rem; */
 }
section{
    margin:none;
    width:100%;
}

form{
    width:100%;
}
.btn{
    width:100%;
    display:block;
     width:40%;
    font-size:18px;
}
.logo{
width:22%; 

}
}
    </style>


</head>
<body>
<div class="main">
    
<section>
<form action="" method="post" enctype="multipart/form-data">

<h1>Login Now</h1>
<div class="input-field">
    <img class="logo" src="../sellerimage/ourlogo.jpg" alt="no image">

</div> 

<div class="input-field">

<label for="">user email</label>
<input type="email" name="email" maxlength="26" placeholder="Enter your email" required>
</div>


<div class="input-field">
<label for="">user password</label>
<input type="password" name="password" maxlength="20"placeholder="Enter your password" required>
</div>

<button type="submit" name="login" class="btn">login now</button>
<p>do not have an account ?<a href="register.php"> register now</a></p>

</form>

</section>

</div> 

</body>
</html>
<?php
include 'component/dbconnect.php';

session_start();

if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];


$checkemail=$conn->prepare("SELECT * FROM `seller` WHERE `s-email` = ?");
$checkemail->execute([$email]);
 
if($checkemail->rowCount()>0){
    // $checkpassword=$conn->prepare("SELECT * FROM `seller` WHERE `s-password` = ?");
    // $checkpassword->execute([$password]);

    $fetchselleremail= $checkemail->fetch(PDO::FETCH_ASSOC);
    $emailresult=$fetchselleremail['s-password'];
   
    if($emailresult==$password){
        $_SESSION['id']=$fetchselleremail['s-id'];

        
    //=================================== header use gare below script not work why =============================================
    echo'<script>alert("signin successfully."); </script>';        
        header("location:dashboard.php");
        

//   $_SESSION['name']=$fetchselleremail['s-name'];
//  $_SESSION['email']=$fetchselleremail['s-email'];


    }else{
        echo'<script>alert("incorrect password!."); </script>';

    }

    // echo'<script>alert("signin successfully outside."); </script>'; just a reminder things for me 
    
}else{

    
    echo'<script>alert("Invalid useremail!,Please register first."); </script>';
    // echo'<script>alert("incorrect username or password."); </script>';just a reminder things for me

}

}

?>
