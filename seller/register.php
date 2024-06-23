
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
        font-size: 20px;
    }

    :root {
        --selenagreen: #87a243;

        --green: #7cab05;
        --light-green: #e0ffcd;
        --box-shadow: 0 0 10px rgba(0 0 0/15%);
    }

    body {
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

    .main {
        display: flex;
        /* border:solid 2px black; */
        padding: 30px 20px;
        justify-content: center;
        margin: 8rem;
        background: #fff;
        /* box-shadow: 0 2px 6px 0 rgba(0 0 0/10%); */
        box-shadow: 0 10px 18px 0 rgba(0 0 0/10%);

    }

    section {

        display: flex;
        /* border:solid 2px black; */
        width: 70%;
        /* width:100%; */
        flex-wrap: wrap;
        margin: 20px 20px;

        box-shadow: 0 10px 18px 0 rgba(0 0 0/10%);
        background: #fff;

    }

    form {}

    label {
        color: var(--green);
        display: block;

        text-transform: capitalize;
        /* text-align:center; */
    }

    .input-field {
        width: 100%;

    }

    h1 {
        font-size: 30px;
        text-align: center;
        margin: 12px;
    }

    .btn:hover {
        background-color: var(--selenagreen);
    }

    .btn,
    input {
        transition: 1.0s background;
        margin: 8px;
        display: block;
        margin: 20px auto;

        box-shadow: 0 5px 10px 0.1px rgba(0, 0, 0, 0.1);
        border: none;
        width: 25%;
        border-radius: 12px;
        cursor: pointer;
        padding: 8px;
    }

    input {
        width: 100%;
        outline: none;
        line-height: 20px;
        font-size: 20px;
    }

    form {
        /* border:solid 2px green; */
        width: 100%;
        padding: 20px;
    }

    p,
    a {
        text-transform: capitalize;
        text-align: center;
    }

    a {
        list-style: none;
        color: red;
        text-decoration: none;
    }

    sup {
        color: red;
    }

    @media(max-width:991px) {
        .main {
            margin: 2rem;
            /* margin:1rem; */
        }

        section {
            margin: none;
            width: 100%;
        }

        form {
            width: 100%;
        }

        .btn {
            width: 100%;
            display: block;
            width: 40%;
            font-size: 18px;
        }
    }
    </style>
</head>

<body>
    <div class="main">

        <section>
            <form action="" method="post" enctype="multipart/form-data">

                <h1>Register</h1>

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
</body>
</html>


<?php
include 'component/dbconnect.php';


if(isset($_POST['register'])){

$username=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirmpass=$_POST['cpassword'];
// $image=$_POST['image'];
// image ma post doesnot work



//================================================ image start ================================================
// $image =$_FILES['image']['name'];
// $image =filter_var($image,FILTER_SANITIZE_STRING);
// $image_tmp_name =$_FILES['image']['tmp_name'];
// $image_folder='../image/'.$image;

$image=$_FILES['image']['name'];
$image=filter_var($image,FILTER_SANITIZE_STRING);
$image_tmp_name=$_FILES['image']['tmp_name'];
$image_folder="../img/".$image;
move_uploaded_file($image_tmp_name,$image_folder);
// ================================image end ===================================================================

// ================================same email cutout start ===================================================================

$checkemail=$conn->prepare("SELECT * FROM `seller` WHERE `s-email` = ?");
$checkemail->execute([$email]);

if($checkemail->rowCount()>0){
    //==================== if 1 garyo bhane euta bhaye bhaye pni same email janxa but not in second time =================
    // $warning_msg[]='user email already exit';
    echo'<script>alert("user email already exists."); </script>';
    exit;
}

// ================================same email cutout end ===================================================================


if($password!=$confirmpass){
    echo'<script>alert("Password doesnot matched."); </script>';
exit;

} 

$sql=$conn->prepare('INSERT INTO `seller`(`s-id`, `s-name`, `s-email`, `s-password`, `s-profile`) VALUES(?,?,?,?,?)');

$sql->execute(['',$username,$email,$password,$image]);

echo'<script>confirm("Form Submitted on database successfully."); </script>';

}else{

    // echo'<script>alert("Failed to submit on database."); </script>';


}
?>

