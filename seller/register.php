<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
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
   width:70%;
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
    
    box-shadow: 0 5px 10px 0.1px rgba(0,0,0,0.1);
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
}



    </style>
</head>
<body>
<div class="main">
    
<section>
<form action="register.php" method="post" enctype="multipart/form-data">

<h1>Register</h1>

<div class="input-field">

<label for="">user name</label>
<input type="text" name="name" maxlength="20" placeholder="Enter your username" required>
</div>


<div class="input-field">
<label for="">user email</label>
<input type="email" name="email" maxlength="20" placeholder="Enter your email" required>
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
<label for="">select profile</label>

<input type="file" name="image" accept="image/*">
</div>


<button type="submit" class="btn">register now</button>
<p>already have an account ?<a href="login.php"> login now</a></p>

</form>

</section>







</div> 







</body>
</html>