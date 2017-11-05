<?php
require_once "connect_bank.php";

if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["mob"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["confirm"])
	 && isset($_POST["address"]) && isset($_POST["date"]) && isset($_POST["bldgrp"]) && isset($_POST["address1"]))
{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$mob=$_POST["mob"];
	$mail=$_POST["mail"];
	$password=$_POST["password"];
	$confirm=$_POST["confirm"];
	$address=$_POST["address"];
	$address1=$_POST["address1"];
	$date=$_POST["date"];
	$bldgrp=$_POST["bldgrp"];
		
	if ($password==$confirm) 
	{
		$query="insert into users (First_Name,Last_Name,Mobile,Email,Password,Address,Permenant_Address,Date_OF_Birth,Blood_Group) 
				values('$fname','$lname','$mob','$mail','$password','$address','$address1','$date','$bldgrp')";
		$query_run=mysqli_query($mycon,$query);
		if($query_run)
		{
			header('Location:index.html');
		}
	}
	else 
	{
		echo '<a href="http://localhost/Final_with_template/register.html">passwords are not matching click here to register again</a>';
	}
}
?>

