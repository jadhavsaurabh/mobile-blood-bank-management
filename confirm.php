<!DOCTYPE html>
<html lang="en">
<head>
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
<style>

table{
	width: 100%;
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
	border: 1px solid #e0e0e0;
}

tr:hover {background-color: #f5f5f5} 

h1{
	text-align:center;
}

input {
	width:100%;
    border: none;
    background: transparent;
}
.button {
    background-color: white;
    border: none;
    color: white;
    padding: 12px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	border-radius: 12px;
	 border: 2px solid #76ff03;
}
.button {
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

.button:hover {
    background-color: #76ff03;
    color: white;
}
</style>
</head>
<body>

<h1>Donation Requests!</h1>
<?php
	require_once "connect_bank.php";
	$query1="select Email,Blood_Group,Amount,Address,Date from temp_donor";
	$result1=mysqli_query($mycon,$query1);
	if($result1)
	{
		echo "<table>";
		echo "<tr>
		<th>Email</th>
		<th>Blood_Group</th>
		<th>Amount</th>
		<th>Address</th>
		<th>Date</th>
		<th>Choose Action</th>
		<th>Click!</th>
		</tr>";
		while($row = mysqli_fetch_assoc($result1))
		{
			$mail=$row["Email"];
			$bldgrp=$row["Blood_Group"];
			$amt=$row["Amount"];
			$date=$row["Date"];
			$adrs=$row["Address"];
			echo "<form action='action_donor.php' method='POST'>
			<tr>
			<td><input type='text' name='mail' value='$mail' readonly='readonly'></td>
			<td><input type='text' name='bldgrp' value='$bldgrp' readonly='readonly'></td>
			<td><input type='text' name='amt' value='$amt' readonly='readonly'></td>
			<td><input type='text' name='adrs' value='$adrs' readonly='readonly'></td>
			<td><input type='text' name='date' value='$date' readonly='readonly'></td>
			<td>
			<select name='action'>
			<option value='accept'>Confirm</option>
			<option value='reject'>Delete</option>
			</select>
			</td>
			<td><input type='submit' value='Submit' class='button' style='color:black;'></td>
			</tr>
			</form>";
		}
		echo "</table>";
	}
	
?>
<h1>Receiving Requests!</h1>
<?php
	require_once "connect_bank.php";
	$query1="select Email,Blood_Group,Amount,Address,Date from temp_receiver";
	$result1=mysqli_query($mycon,$query1);
	if($result1)
	{
		echo "<table>";
		echo "<tr>
		<th>Email</th>
		<th>Blood_Group</th>
		<th>Amount</th>
		<th>Address</th>
		<th>Date</th>
		<th>Choose Action</th>
		<th>Click!</th>
		</tr>";
		while($row = mysqli_fetch_assoc($result1))
		{
			$mail=$row["Email"];
			$bldgrp=$row["Blood_Group"];
			$amt=$row["Amount"];
			$date=$row["Date"];
			$adrs=$row["Address"];
			echo "<form action='action_receiver.php' method='POST'>
			<tr>
			<td><input type='text' name='mail' value='$mail' readonly='readonly'></td>
			<td><input type='text' name='bldgrp' value='$bldgrp' readonly='readonly'></td>
			<td><input type='text' name='amt' value='$amt' readonly='readonly'></td>
			<td><input type='text' name='adrs' value='$adrs' readonly='readonly'></td>
			<td><input type='text' name='date' value='$date' readonly='readonly'></td>
			<td>
			<select name='action'>
			<option value='accept'>Confirm</option>
			<option value='reject'>Delete</option>
			</select>
			</td>
			<td><input type='submit' style='color:black;' value='Submit' class='button'></td>
			</tr>
			</form>";
		}
		echo "</table>";
	}
	
?>
<footer id="foot-sec">
<div class="footerdivide">
</div>
<div class="container ">
<div class="row">
	<div class="text-center color-white col-sm-12 col-lg-12">
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