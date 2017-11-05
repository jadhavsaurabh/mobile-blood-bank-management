<?php
	session_start();
	if($_SESSION["mail"]==NULL)
	{
		header('Location:login.html');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>

table{
	margin-left: 450px;
	width: 600px;
	border-collapse: collapse;
	border:1px solid #e0e0e0;
	vertical-align: centre;
}
th{
	color: white;
	background-color:#2196f3;
	padding: 10px;
	border: 1px solid #e0e0e0;
}
td{
	padding: 10px;
	border: 1px solid #e0e0e0;
}

tr:hover {background-color: #f5f5f5} 

h1{
	text-align:center;
}

p{
	font-size:15px;
	margin-left: 450px;
	border:1px solid #e0e0e0;
    width: 600px;
    padding: 10px;
    text-align: centre;
}	
	
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Quasar - MultiPurpose Template, Landing Page, Single Page Template, One Page Template</title>
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
</head>
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
			<li><a href="frontpage.php">Home</a></li>
			<li class="active"><a href="">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
</nav>
<?php
	require_once "connect_bank.php";
	session_start();
	$mail=$_SESSION["mail"];
	$query1="select First_Name,Last_Name,Email,Mobile,Blood_Group,Address from users where Email='$mail'";
	$result1=mysqli_query($mycon,$query1);
	if($result1)
	{
		$row = mysqli_fetch_assoc($result1);
		$fname= $row["First_Name"];
		$lname= $row["Last_Name"];
		$mail= $row["Email"];
		$mobile= $row["Mobile"];
		$grp= $row["Blood_Group"];
		$adrs= $row["Address"];
		echo "
				<br><br><br>
				<table> 
				<tr><td><b>Name:</b></td><td>$fname $lname</td></tr>
		        <tr><td><b>Email:</b></td><td>$mail</td></tr>
				<tr><td><b>Mobile Number:</b></td><td>$mobile</td></tr>
				<tr><td><b>Blood Group:</b></td><td>$grp</td></tr>
				<tr><td><b>Address:</b></td><td>$adrs</td></tr>
				</table>";
	}
	echo"<hr>";
	echo"<h1>Donation Record</h1>";
	$query2="select Date,Amount from final_donor where Email='$mail'";
	$result2=mysqli_query($mycon,$query2);	
	echo "<table>";
	echo "<tr><th>Date</th><th>Amount</th></tr>";
	while($row = mysqli_fetch_assoc($result2))
	{
		$date=$row["Date"];
		$amount=$row["Amount"];
		echo "<tr> <td>$date</td> <td>$amount</td></tr>";
	}
	echo "</table>";
	echo "<br><br><h1>Receiving Record</h1>";
	$query2="select Date,Amount from final_receiver where Email='$mail'";
	$result2=mysqli_query($mycon,$query2);	
	echo "<table>";
	echo "<tr><th>Date</th><th>Amount</th></tr>";
	while($row = mysqli_fetch_assoc($result2))
	{
		$date=$row["Date"];
		$amount=$row["Amount"];
		echo "<tr> <td>$date</td> <td>$amount</td></tr>";
	}
	echo "</table>";
?>
<footer id="foot-sec" style="margin-top:100px;">
<div class="footerdivide">
</div>
<div class="container ">
<div class="row">
	<div class="text-center color-white col-sm-12 col-lg-12">
		<span style="font-size: 20px;">
			 &copy Group-5,L9-Batch,TE-9,PICT.<br>
			 Guidance: Mr. Kamble Sir,Mr.Murumkar Sir.
		</span>
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