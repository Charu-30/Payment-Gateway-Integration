<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Charifit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="charityfit/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="charityfit/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="charityfit/css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="charityfit/css/superfish.css">

	<link rel="stylesheet" href="charityfit/css/style.css">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <?php if(isset($_SESSION["TID"]) && $_SESSION["TID"]==$_REQUEST["payment_request_id"]){ ?>
                        <div class="container" style="margin-top: 250px; margin-left: 400px;">
                            <div class="row text-center">
                                <div class="col-md-4 col-sm-4">
                                    <div class="services animate-box" style="background-color: rgb(240, 231, 236);">
                                        <span><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                        <h3 style="color: rgb(72, 155, 72); font-weight: bold;">Payment Successful!!</h3>
                                        <p style="font-weight: bold; color: black;">Message has been sent to your email id.</p>
                                        <a href="charityfit/index.html" class="btn btn-success btn-sm">Go to Home page</a>
                                    </div>
                                </div>
                            </div> 
                         </div>
                    <?php }else{ ?>
                        <div class="container" style="margin-top: 250px; margin-left: 550px;">
                            <div class="row text-center">
                                <div class="col-md-4 col-sm-4">
                                    <div class="services animate-box" style="background-color: rgb(240, 231, 236);">
                                        <span><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                                        <h3 style="color: rgb(72, 155, 72); font-weight: bold;">Payment Failed !</h3>
                                        <p style="font-weight: bold; color: black;">Sorry! Your payment has been failed. Please Try Again.</p>
                                        <a href="charityfit/index.html" class="btn btn-success btn-sm">Go to Home page</a>
                                    </div>
                                </div>
                            </div> 
                         </div>                
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>