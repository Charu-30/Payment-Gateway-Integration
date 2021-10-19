<?php
session_start();
if(isset($_POST["submit"])){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key:test_eff3a8cae28f17996ce789b8570",
                    "X-Auth-Token:test_95792ef34775513cd14e668d0e0"));
    $payload = Array(
        'purpose' => 'Donate',
        'amount' => $_POST["amount"],
        'phone' => $_POST["phone_no"],
        'buyer_name' => $_POST["name"],
        'redirect_url' => 'http://localhost/payment%20gateway%20integration/redirect.php',
        'send_email' => true,
        'webhook' => 'http://www.example.com/webhook/',
        'send_sms' => true,
        'email' => $_POST["email_id"],
        'allow_repeated_payments' => false
    );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch); 
    $response = json_decode($response);        // convert string into array
    $_SESSION["TID"] = $response->payment_request->id;
    header("location:".$response->payment_request->longurl);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v2 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- Animate.css -->
		<link rel="stylesheet" href="charityfit/css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="charityfit/css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="charityfit/css/bootstrap.css">
		<!-- Superfish -->
		<link rel="stylesheet" href="charityfit/css/superfish.css">

		<link rel="stylesheet" href="charityfit/css/style.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="index.html">Charity</a></h1>
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active">
								<a href="index.html">Home</a>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg');">
			<div class="inner" style="margin-top:20px;">
				<form action="" method="post" style="margin: 0px 170px;">
					<h3>Make a Payment</h3>
					<div class="form-wrapper">
						<label for="">Name</label>
						<input name="name" type="text" class="form-control">
					</div>					
					<div class="form-wrapper">
						<label for="">Mobile No.</label>
						<input name="phone_no" type="number" class="form-control">
					</div>
					<div class="form-wrapper">
						<label for="">Email</label>
						<input name="email_id" type="text" class="form-control">
					</div>
					
					<div class="form-wrapper">
						<label for="">Amount</label>
						<input name="amount" type="number" class="form-control">
					</div>
					<button name="submit" type="submit">Submit Now</button>
				</form>
			</div>
		</div>		
	</body>
</html>