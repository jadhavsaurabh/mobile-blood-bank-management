<?php
	session_start();
	if($_SESSION["mail"]==NULL)
	{
		header('Location:index.html');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Le styles -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/skin-blue.css" rel="stylesheet">
<!-- Le fav -->
<link rel="shortcut icon" href="assets/ico/favicon.png">
<!--[if lt IE 9]>
<style>
nav,.container,header#top-section,.carousel,.demobutton {display:none;}
</style>
<div id='browserWarning'>
You are using an outdated version of Internet Explorer. Please, switch to
<a style="color:red;" href='http://getfirefox.com'>Firefox</a>,
<a style="color:red;" href='http://www.google.de/chrome'>Google Chrome</a>
,
<a style="color:red;" href='http://www.apple.com/safari/'>Safari</a>
or the latest version of
<a style="color:red;" href='http://windows.microsoft.com/en-US/internet-explorer/downloads/ie'>Internet Explorer</a>
for a
<span class='bold'>better</span>
and
<span class='bold'>safer</span>
experience.
</div>
<![endif]-->
</head>
<?php 
	require_once "connect_bank.php";
	$query1="Select Current_Volume from blood_record where Blood_Group='A+'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$aplus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='A-'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$aminus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='B+'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$bplus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='B-'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$bminus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='O+'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$oplus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='O-'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$ominus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='AB+'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$abplus=$row["Current_Volume"];
	
	$query1="Select Current_Volume from blood_record where Blood_Group='AB-'";
	$result1=mysqli_query($mycon,$query1);
	$row=mysqli_fetch_assoc($result1);
	$abminus=$row["Current_Volume"];	
?>
<!-- /head-->
<body data-spy="scroll" data-target=".navbar">
<nav id="topnav" class="navbar navbar-fixed-top navbar-default" role="navigation">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#top-section">Blood Donation</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#top-section">Home</a></li>
			<li><a href="#Section-2">Blood Availability</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="#Section-6">Contact</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
</nav>
<!-- HOMEPAGE -->
<header id="top-section" class="fullbg">
<div class="jumbotron">
	<div id="carousel_intro" class="carousel slide fadeing">
		<div class="carousel-inner">
			<div class="active item" id="slide_1">
				<div class="carousel-content">					
					<div class="animated fadeInDownBig">
						 <h1>Blood Donation Will Cost You Nothing But It Will Save A Life !!</h1>
						 <h3>(Kar ke Dekho Achha Lagata Hain!)</h3>
					</div>
					<br/>
					<a href="dondisabled.php" class="buttonyellow animated fadeInLeftBig">&nbsp; Donor</a>
					<a href="recdisabled.php" class="buttoncolor animated fadeInRightBig">&nbsp; Receiver</a>
					
				</div>
			</div>
			
		</div>
	</div>
	
</div>
<div class="inner-top-bg">
</div>
</header>
<!-- / HOMEPAGE -->
<!--  SECTION-1 -->

<!-- SECTION-2(gallery) -->
<section id="Section-2" class="fullbg color-white">
<div class="section-divider">
</div>
<div class="container demo-3">
<div class="row">
	<div class="page-header text-center col-sm-12 col-lg-12 animated fade">
		<h1>Blood Availability</h1>
	</div>
</div>
<div class="row animated fadeInUpNow">
	<div class="col-sm-12 col-lg-12">
		<ul class="grid cs-style-4">
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">AB-</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $abminus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">AB+</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $abplus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">O+</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $oplus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">A+</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $aplus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">B+</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $bplus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">A-</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $aminus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">B-</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $bminus </span>";
			?>
			</figcaption>
			</figure>
			</li>
			
			<li>
			<figure>
			<div>
				<h1 style="padding:80px;">O-</h1>
			</div>
			<figcaption>
			<h3>Current:</h3>
			<?php 
			echo "<span>  $ominus </span>";
			?>
			</figcaption>
			</figure>
			</li>
		</ul>
	</div>
</div>
</div>
</section>
<!-- SECTION-3(reviews) -->

<!-- SECTION-6 (contact) -->
<section id="Section-6" class="fullbg">
<div class="section-divider">
</div>
<div class="container">
<div class="row">
	<div class="page-header text-center col-sm-12 col-lg-12 color-white animated fade">
		<h2>Contact Us</h2>
		<p class="lead">
			 Fill out the form and we will call you back
		</p>
	</div>
</div>
<div class="row animated fadeInUpNow">
	<div class="col-lg-8 col-md-offset-2">
		<form action="post.php" name="MYFORM" id="MYFORM">
			<input name="name" size="30" type="text" id="name" class="col-lg-6 leftradius" placeholder="Your Name">
			<input name="email" size="30" type="text" id="email" class="col-lg-6 rightradius" placeholder="E-mail Address">
			<br/><br/>
			<textarea id="message" name="message" class="col-lg-12 allradius" placeholder="Message" rows="7"></textarea><br/>
			<img src="contact/refresh.jpg" alt="" id="refresh" style="width:45px;"/><img src="contact/get_captcha.php" alt="" id="captcha" style="height:45px;"/>
			<br/>
			<input name="code" type="text" id="code" placeholder="Enter Captcha" class="top20">
			<br/>
			<input value="Send Message" type="submit" id="Send" class="btn btn-default btn-lg">
			<br/>
		</form>
	</div>
</div>
</div>
</section>
<!-- FOOTER -->
<footer id="foot-sec">
<div class="footerdivide">
</div>
<div class="container ">
<div class="row">
	<div class="text-center color-white col-sm-12 col-lg-12">
		<ul class="social-icons">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		</ul>
		<p style="font-size: 20px;">
			 &copy Group-5,L9-Batch,TE-9,PICT.<br>
			 Guidance: Mr. Kamble Sir,Mr.Murumkar Sir.
		</p>
	</div>
</div>
</div>
</footer>
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
<script src="assets/js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.scrollTo-1.4.6-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.placeholder.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/toucheffects.js"></script>
<script src="assets/js/animations.js"></script>
<script src="assets/js/init.js"></script>
</body>
</html>