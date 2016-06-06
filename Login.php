<?php
session_start();//session starts here  

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.3.2\dist\css\bootstrap.css">
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link href="css/simple-line-icons.css" rel="stylesheet" media="screen">
    <link href="css/animate.css" rel="stylesheet">

    <!-- Custom styles CSS -->
    <link href="css/stlyee.css" rel="stylesheet" media="screen">

    <script src="js/modernizr.custom.js"></script>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body>
<div id="preloader">
    <div id="status"></div>
</div>

<!-- Home start -->

<section id="home" class="pfblock-image screen-height">
    <div class="home-overlay"></div>
    <div class="intro">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="Login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>


                            <input class="btn btn-lg btn-primary btn-block" type="submit" value="login" name="login" >

                            <!-- Change this to a button or input when using this as a form -->
                            <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    </section>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.easypiechart.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.cbpQTRotator.js"></script>
<script src="js/custom.js"></script>


</body>

</html>

<?php

$dbcon=mysqli_connect("localhost","root","admin");
mysqli_select_db($dbcon,"users");

if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=md5($_POST['pass']);

    $check_user="select * from users WHERE `Email`='$user_email'  AND `Password`='$user_pass'";

    $run=mysqli_query($dbcon,$check_user) or die(mysqli_error($dbcon));
    $mrow = mysqli_fetch_row($run);


    if($mrow)
    {
        echo "<script>window.open('index.php','_self')</script>";

        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>  
