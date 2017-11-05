<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet"  href="receipt.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br>

<div class="layoutblock">
<h3 align="center">ORDER RECEIPT</h3>
<hr class="light">
<br>
<button  style="margin-left:600px" onclick="myFunction()"><b>PRINT</b></button>
<a style="color:#424242" href="logout.php"><button ><b>LOGOUT</b></button></a>

<br>
<br>
<script>
function myFunction() {
    window.print();
}
</script>
<br>

<?php
	require_once "connect_bank.php";
	session_start();
	$mail=$_SESSION["mail"];
	$query1="select * from temp_donor where Email='$mail' limit 1;";
	$result1=mysqli_query($mycon,$query1);
	if($result1)
	{
		$row = mysqli_fetch_assoc($result1);
		$fname= $row["First_Name"];
		$lname= $row["Last_Name"];
		$mail= $row["Email"];
		$mobile= $row["Mobile"];
		$date=$row["Date"];
		$grp= $row["Blood_Group"];
		$adrs= $row["Address"];
		$amt=$row["Amount"];
		echo "<table > 
		<tr><th><u>FIELD<th><u>DETAILS</u><br>
		<tr><td><b>Name:</b><td> $fname $lname <br>
		<tr><td><b>Email:</b> <td>$mail<br>
		<tr><td><b>Address:</b> <td> $adrs<br>
		<tr><td><b>Blood Group:</b> <td> $grp<br>
		<tr><td><b>Order Date:</b> <td> $date<br>
		<tr><td><b>Amount:</b><td>  $amt<br>
		<tr><td><b>Mobile Num:</b><td>  $mobile<br>
		</table>";
	}
	echo"<hr>";
	
?>
<a style="color:#424242" href="frontpage.php"><button style="margin-left:350px" ><b>CLICK HERE TO CONTINUE</b></button></a>
<br>
<br>
<br>
<br>
<br>
<h5 align="center">Please Note : Print a receipt for further reference.Thank You!</h5>
<h6 align="center">“The Finest Gesture One Can Make Is To Save Life By Donating Blood.”</h5>
<h6 align="center">"Donate Blood, Save Life!"</h5>

</div>
</body>
</html>
