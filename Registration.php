<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SignUp</title>

    <!-- CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
    <link href="assets/css/animate.css" rel="stylesheet">

    <!-- Custom styles CSS -->
    <link href="assets/css/style.css" rel="stylesheet" media="screen">

    <script src="assets/js/modernizr.custom.js"></script>

</head>
<body>

<!-- Preloader -->

<div id="preloader">
    <div id="status"></div>
</div>

<!-- Home start -->

<section id="home" class="pfblock-image screen-height">
    <div class="home-overlay"></div>
    <div class="intro">
        <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
            <div class="row"><!-- row class is used for grid system in Bootstrap-->
                <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                    <div class="login-panel panel panel-primary">
                        <div class="panel-heading">
                            <h class="panel-title">SignUp</h>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="registration.php">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="ConfirmPassword" name="cpass" type="password" value="">
                                    </div>

                                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Register" name="register" >

                                </fieldset>
                            </form>
                            <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                        </div>
                    </div>
                </div>
            </div>
        </div>



</section>


<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.parallax-1.1.3.js"></script>
<script src="assets/js/imagesloaded.pkgd.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.easypiechart.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.cbpQTRotator.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
<?php

$dbcon=mysqli_connect("localhost","root","");
mysqli_select_db($dbcon,"users");
if(isset($_POST['register'])&& !empty($_POST['register']))
{
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.  
    $user_pass=md5($_POST['pass']);//same
    $user_email=$_POST['email'];//same  
    $user_cpass=md5($_POST['cpass']);

    if($user_name=='')
    {
        //javascript use for input checking  
        echo"<script>alert('Please enter the name')</script>";
        exit();//this use if first is not work then other will not show
    }

    if($user_pass=='')
    {
        echo"<script>alert('Please enter the password')</script>";
        exit();
    }
    if($user_pass!=$user_cpass)
    {
        echo"<script>alert('Please confirm your password correctly')</script>";
        exit();
    }

    if($user_email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
        exit();
    }
//here query check weather if user already registered so can't register again.  
    $check_email_query="select * from users WHERE `Email`='$user_email'";
    $run_query=mysqli_query($dbcon,$check_email_query) or die(mysqli_error($dbcon));
    $myrow = mysqli_fetch_row($run_query);


    if($myrow)
    {
        echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
        exit();
    }
    else{
        $insert_user="insert into users VALUES ('$user_name','$user_email','$user_pass')";
        if(mysqli_query($dbcon,$insert_user))
        {
            echo"<script>window.open('welcome.php','_self')</script>";
        }
    }
//insert the user into the database.  





}

?>  