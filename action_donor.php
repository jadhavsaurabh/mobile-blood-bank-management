<?php
	require_once "connect_bank.php";
	$action=$_POST["action"];
	$date=$_POST["date"];
	$mail=$_POST["mail"];
	if($action=='accept')
	{
			$query1="call transfer('$mail','$date')";
			$query_run=mysqli_query($mycon,$query1);		
	}
	else
	{
		echo "reject";
	}
	$query1="delete from temp_donor where temp_donor.Email='$mail' and temp_donor.Date='$date';";
	$query_run=mysqli_query($mycon,$query1);	
	header('Location:confirm.php');
?>