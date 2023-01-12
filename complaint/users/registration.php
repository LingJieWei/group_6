<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contactno=$_POST['contactno'];
	$status=1;
	$query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	$msg="Registration successfull. Now You can login !";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | User Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="../css/index_style.css" rel="stylesheet">
    <script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
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
                    <a class="navbar-brand" href="../">Complaint Management Sysytem</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../users">User Login</a>
                        </li>
                        <li>
                            <a href="#">User Registration</a>
                        </li>
                        <li>
                            <a href="../admin">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    <div id="login-page">
        <div class="container">

            <form class="form-login" method="post">
                <h2 class="form-login-heading" style="background-color: rgb(0, 0, 0);">User Registration</h2>
                <p style="padding-left: 1%; color: green">
                    <?php if($msg){
echo htmlentities($msg);
		        		}?>


                </p>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required"
                        autofocus>
                    <br>
                    <input type="email" class="form-control" placeholder="Email ID" id="email"
                        onBlur="userAvailability()" name="email" required="required">
                    <span id="user-availability-status1" style="font-size:12px;"></span>
                    <br>
                    <input type="password" class="form-control" placeholder="Password" required="required"
                        name="password"><br>
                    <input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no"
                        required="required" autofocus>
                    <br>

                    <button class="btn btn-theme btn-block" style="background-color: rgb(0, 0, 0);" type="submit"
                        name="submit" id="submit"><i class="fa fa-user"></i> Register</button>
                    <hr>

                    <div class="registration">
                        Already Registered<br />
                        <a class="" href="index.php">
                            Sign in
                        </a>
                    </div>

                </div>



            </form>

        </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>

</body>

</html>