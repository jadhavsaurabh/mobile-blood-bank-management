<?php
	require_once "connect_bank.php";
	$action=$_POST["action"];
	$date=$_POST["date"];
	$mail=$_POST["mail"];
	if($action=='accept')
	{
			$query1="call transfer2('$mail','$date')";
			$query_run=mysqli_query($mycon,$query1);		
	}
	$query1="delete from temp_receiver where temp_receiver.Email='$mail' and temp_receiver.Date='$date';";
	$query_run=mysqli_query($mycon,$query1);	
	header('Location:confirm.php');
?>