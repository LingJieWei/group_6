<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS | Admin login</title>
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <link href="../css/index_style.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">
</head>

<body style="background-color: #222;">

    <div class="container">

        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container_navbar">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../">Complaint Management Sysytem &ensp;| &ensp;Admin</a>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../users">User Login</a>
                        </li>
                        <li>
                            <a href="../users/registration.php">User Registration</a>
                        </li>
                        <li>
                            <a href="#">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    <div id="login-page">
        <div class="container">

            <form class="form-login" name="login" method="post">
                <h2 class="form-login-heading" style="background-color:rgb(0, 0, 0);">sign in now</h2>
                <p style="padding-left:4%; padding-top:2%;  color:red">
                    <span><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                <div class="login-wrap">
                    <input type="text" class="form-control" name="username" placeholder="User ID" required autofocus>
                    <br>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                    <label class="checkbox">
                    </label>
                    <button class="btn btn-theme btn-block" name="submit" type="submit"
                        style="background-color:rgb(0, 0, 0);"><i class="fa fa-lock"></i> SIGN IN</button>

                </div>


                <!--/.wrapper-->

                <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
                <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
                <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>